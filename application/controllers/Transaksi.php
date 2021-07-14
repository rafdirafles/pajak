<?php

class Transaksi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    is_logged_in();
    // Reset flash data
    $this->session->keep_flashdata('message');
    // Load model untuk query menu
    $this->load->model('Setting_model', 'menu');
    $this->load->model('Transaksi_model', 'transaksi');
  }

  // Halaman view scan data 
  public function scan()
  {
    $data['title'] = "Scan Faktur";
    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('scan', 'SCAN BARCODE', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('transaksi/scan', $data);
      $this->load->view('templates/footer');
    }
    // Jika benar maka aksi dijalankan
    else {
      $url  = $this->input->post('scan');
      $supplier  = $this->input->post('supplierRn');
      if ($this->input->post('masaPajak') == 'custom') {
        $masaPajak  = $this->input->post('masaPajakCustom');
      } else {
        $masaPajak  = $this->input->post('masaPajak');
      }

      $data = $this->http_request($url);
      $profile['tabel'] = simplexml_load_string($data);
      $this->tabel($profile, $url, $supplier, $masaPajak);
    }
  }

  // Halaman tabel data after scan proses
  public function tabel($profile, $url, $supplier, $masaPajak)
  {
    $data['title'] = "Scan Faktur";
    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

    $data['xml'] = $profile['tabel'];
    $data['url_link'] = $url;
    $data['supplier'] = $supplier;
    $data['masaPajak'] = $masaPajak;
    // $test = $data['xml'] = $profile['tabel'];

    // var_dump($test);
    // die;
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('transaksi/tabel', $data);
    $this->load->view('templates/footer');
  }

  // Simpan data tabel ke dalam database
  public function simpandata()
  {
    $isi = $this->input->post('isi');
    $url_link = $this->input->post('link');
    $isSupplierReg = $this->input->post('supplier');
    $masaPajak = $this->input->post('masaPajak');
    if ($masaPajak == 'tanggalfaktur') {
      foreach ($isi as $row) {
        $bulanPajak = DateTime::createFromFormat('d/m/Y', $row[3])->format('m');
        $bulanPajak += 0;
        $tahunPajak = DateTime::createFromFormat('d/m/Y', $row[3])->format('Y');
      }
    } else {
      $bulanPajak = substr($masaPajak, -2);
      $bulanPajak += 0;
      $tahunPajak = substr($masaPajak, 0, 4);
    }
    $now = date('Y-m-d H:i:s');
    // trans db start
    $this->db->trans_begin();
    $i = 0;
    foreach ($isi as $row) {
      $i++;
      $dataHeader = [
        'branch_id'            => $this->session->userdata('branch_id'),
        'kdJenisTransaksi'     => $row[0],
        'fgPengganti'          => $row[1],
        'nomorFaktur'          => $row[2],
        'tanggalFaktur'        => DateTime::createFromFormat('d/m/Y', $row[3])->format('Y-m-d'),
        'npwpPenjual'          => $row[4],
        'namaPenjual'          => $row[5],
        'alamatPenjual'        => $row[6],
        'npwpLawanTransaksi'   => $row[7],
        'namaLawanTransaksi'   => $row[8],
        'alamatLawanTransaksi' => $row[9],
        'jumlahDpp'            => $row[10],
        'jumlahPpn'            => $row[11],
        'jumlahPpnBm'          => $row[12],
        'statusApproval'       => $row[13],
        'statusFaktur'         => $row[14],
        'referensi'            => $row[15],
        'create_date'          => $now,
        'user_create'          => $this->session->userdata('username'),
        'masaPajak'            => $bulanPajak,
        'tahunPajak'           => $tahunPajak,
        'url_link'             => $url_link,
        'isSupplierReg'        => $isSupplierReg
      ];

      try {
        if ($i == 1) {
          if (!$this->db->insert('mfaktur', $dataHeader)) {
            $db_error = $this->db->error();
            throw new Exception($db_error['message']);
          } else {
            $hasil = 'true';
            $lastId = $this->db->insert_id();
          }
        }
      } catch (Exception $e) {
        $hasil = $e->getMessage();
        $fail = 'true';
      }
      if ($fail == 'true') {
        break;
      }

      $data = [
        'branch_id'            => $this->session->userdata('branch_id'),
        'idMfaktur'            => $lastId,
        'nomorFaktur'          => $row[2],
        'noUrut'               => $i,
        'nama'                 => $row[16],
        'hargaSatuan'          => $row[17],
        'jumlahBarang'         => $row[18],
        'hargaTotal'           => $row[19],
        'diskon'               => $row[20],
        'dpp'                  => $row[21],
        'ppn'                  => $row[22],
        'tarifPpnbm'           => $row[23],
        'ppnbm'                => $row[24],
        'create_date'          => $now,
        'user_create'          => $this->session->userdata('username')
      ];

      try {
        if (!$this->db->insert('mfaktur_prod', $data)) {
          $db_error = $this->db->error();
          throw new Exception($db_error['message']);
        } else {
          $hasil = 'true';
        }
      } catch (Exception $e) {
        $hasil = $e->getMessage();
      }
    };
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      // Get ERROR from Catch
      echo $hasil;
    } else {
      $this->db->trans_commit();
      // Get hasil dari else (try-catch)
      echo $hasil;
    }
  }





  // Get Data scan from link to proses in php 
  function http_request($url)
  {
    // persiapkan curl
    $ch = curl_init();

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // $output contains the output string 
    $output = curl_exec($ch);

    // tutup curl 
    curl_close($ch);

    // mengembalikan hasil curl
    return $output;
  }
}
