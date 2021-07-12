<div class="main-panel">
  <!-- BEGIN : Main Content-->
  <div class="main-content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12">
          <div class="content-header"><?= $title ?></div>
        </div>
      </div>
      <section id="file-export">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Table Scan Pajak</h4>
              </div>
              <div class="row">
                <div class="flash-datausers" data-flashdatausers="<?= $this->session->flashdata('message'); ?>"></div>
                <?php
                $message = $this->session->flashdata('message');
                if (isset($message)) {
                  $this->session->unset_userdata('message');
                }
                ?>
              </div>
              <div class="card-content ">
                <div class="card-body">
                  <div class="row">
                    <div class="col-10">
                      <!-- <p>Anda dapat menambahkan data user di halaman ini.</p> -->
                    </div>
                    <!-- <div class="col-2">
                      <button href="" class="btn btn-secondary mb-1" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ModalNewUser">Tambah User</button>
                    </div> -->
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped tabel_export_users" id="tabelScan">
                      <thead>
                        <tr>
                          <th>kdJenisTransaksi</th>
                          <th>fgPengganti</th>
                          <th>nomorFaktur</th>
                          <th>tanggalFaktur</th>
                          <th>npwpPenjual</th>
                          <th>namaPenjual</th>
                          <th>alamatPenjual</th>
                          <th>npwpLawanTransaksi</th>
                          <th>namaLawanTransaksi</th>
                          <th>alamatLawanTransaksi</th>
                          <th>jumlahDpp</th>
                          <th>jumlahPpn</th>
                          <th>jumlahPpnBm</th>
                          <th>statusApproval</th>
                          <th>statusFaktur</th>
                          <th>referensi</th>
                          <th>nama</th>
                          <th>hargaSatuan</th>
                          <th>jumlahBarang</th>
                          <th>hargaTotal</th>
                          <th>diskon</th>
                          <th>dpp</th>
                          <th>ppn</th>
                          <th>tarifPpnbm</th>
                          <th>ppnbm</th>
                        </tr>
                      </thead>
                      <tbody>
                        <input type="text" style="visibility:hidden" id="linkAddress" value="<?= $url_link ?>;">
                        <?php foreach ($xml->detailTransaksi as $row) : ?>
                          <tr>
                            <td><?= $xml->kdJenisTransaksi ?></td>
                            <td><?= $xml->fgPengganti ?></td>
                            <td><?= $xml->nomorFaktur ?></td>
                            <td><?= $xml->tanggalFaktur ?></td>
                            <td><?= $xml->npwpPenjual ?></td>
                            <td><?= $xml->namaPenjual ?></td>
                            <td><?= $xml->alamatPenjual ?></td>
                            <td><?= $xml->npwpLawanTransaksi ?></td>
                            <td><?= $xml->namaLawanTransaksi ?></td>
                            <td><?= $xml->alamatLawanTransaksi ?></td>
                            <td><?= $xml->jumlahDpp ?></td>
                            <td><?= $xml->jumlahPpn ?></td>
                            <td><?= $xml->jumlahPpnBm ?></td>
                            <td><?= $xml->statusApproval ?></td>
                            <td><?= $xml->statusFaktur ?></td>
                            <td><?= $xml->referensi ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->hargaSatuan ?></td>
                            <td><?= $row->jumlahBarang ?></td>
                            <td><?= $row->hargaTotal ?></td>
                            <td><?= $row->diskon ?></td>
                            <td><?= $row->dpp ?></td>
                            <td><?= $row->ppn ?></td>
                            <td><?= $row->tarifPpnbm ?></td>
                            <td><?= $row->ppnbm ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                    <center>
                      <button class="btn btn-primary" id="save" onclick="save('tabelScan')"> Simpan Data </button>
                    </center>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- File export table -->