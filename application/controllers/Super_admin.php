<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super_admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    // Load model emergency call model
    $this->load->model('Super_model', 'SM');
    $this->load->helper(array('url', 'download'));
  }

  public function index()
  {
    $data['title'] = "Dashboard";
    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('superadmin/index', $data);
    $this->load->view('templates/footer');
  }
  public function edit_profile()
  {
    $data['title'] = "My Profile";
    $username = $this->session->userdata('username');
    $data['user'] = $this->SM->getProfile($username);
    $data['cabang'] = $this->db->get_where('mst_branch', ['branch_id' => $this->session->userdata('branch_id')])->row_array();

    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('superadmin/profile', $data);
      $this->load->view('templates/footer');
    } else {
      $name = $this->input->post('name');
      $username = $this->input->post('user_id');

      // Cek gambar yang di upload
      $upload_img = $_FILES['image']['name'];

      if ($upload_img) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/dist/img/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_img = $data['user']['image'];
          if ($old_img != 'default.jpg') {
            unlink(FCPATH . 'assets/dist/img/profile/' . $old_img);
          }
          $new_img = $this->upload->data('file_name');
          $this->db->set('image', $new_img);
        } else {
          $this->session->set_flashdata('message', 'gagalupload');
          redirect('super_admin/edit_profile');
        }
      }

      $this->db->set('name', $name);
      $this->db->where('username', $username);
      $this->db->update('mst_pegawai');

      $this->session->set_flashdata('message', 'updated!');
      redirect('super_admin/edit_profile');
    }
  }
  public function change_password()
  {
    $data['title'] = "Change Password";
    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();

    $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
    $this->form_validation->set_rules(
      'new_password1',
      'New Password',
      'required|trim|min_length[6]|matches[new_password2]',
      [
        'matches' => 'Password not match!',
        'min_length' => 'Password at least 6 characters!'
      ]
    );
    $this->form_validation->set_rules(
      'new_password2',
      'Confirm New Password',
      'required|trim|min_length[6]|matches[new_password1]',
      [
        'matches' => 'Password not match!',
        'min_length' => 'Password at least 6 characters!'
      ]
    );

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('superadmin/change_password', $data);
      $this->load->view('templates/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', 'is wrong!');
        redirect('super_admin/change_password');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', 'current password!');
          redirect('super_admin/change_password');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->db->set('password', $password_hash);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('mst_user');

          $this->session->set_flashdata('message', 'changed!');
          redirect('super_admin/change_password');
        }
      }
    }
  }

  public function tambah_user()
  {
    $data['title'] = "Tambah User";
    $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
    $data['mst_branch'] = $this->SM->get_branch();

    $data['data_pegawai'] = $this->SM->getDataUsers();

    // cek form validasinya sesuaikan dengan rules
    $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
    $this->form_validation->set_rules('nama', 'Fullname', 'required');
    $this->form_validation->set_rules('branch_id', 'Cabang', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[mst_user.username]', [
      'is_unique' => 'Username telah terdaftar buat username baru!'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[mst_user.email]', [
      'is_unique' => 'E-mail telah terregistrasi!'
    ]);
    $this->form_validation->set_rules(
      'password',
      'Password',
      'trim|required|min_length[6]',
      [
        'min_length' => 'Password minimal 6 characters!'
      ]
    );
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('superadmin/users', $data);
      $this->load->view('templates/footer');
    }
    // Jika inputannya benar maka
    else {
      $now = date('Y-m-d H:i:s');
      $data = [
        'username'      => htmlspecialchars($this->input->post('username', true)),
        'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'email'         => htmlspecialchars($this->input->post('email', true)),
        'role_id'       => $this->input->post('role'),
        'image'         => 'default.jpg',
        'is_active'     => 1,
        'branch_id'     => $this->input->post('branch_id'),
        'date_created'  => $now
      ];
      $data2 = [
        'username'      => htmlspecialchars($this->input->post('username', true)),
        'branch_id'     => $this->input->post('branch_id'),
        'name'          => htmlspecialchars($this->input->post('name', true)),
        'nik'           => $this->input->post('nik')
      ];
      $this->db->insert('mst_user', $data);
      $this->db->insert('mst_pegawai', $data2);

      // Redirect ke halaman login
      $this->session->set_flashdata('message', 'add!');

      redirect('super_admin/tambah_user');
    }
  }
  // Change ACTIVATION With jQuery
  public function changeactive()
  {
    $user = $this->input->post('username');
    $data = [
      'username' => $user,
      'is_active' => 1
    ];

    $result = $this->db->get_where('mst_user', $data)->num_rows();

    if ($result < 1) {
      $data = [
        'is_active' => 1
      ];
      $this->db->update('mst_user', $data, array('username' => $user));
    } else {
      $data = [
        'is_active' => 0
      ];
      $this->db->update('mst_user', $data, array('username' => $user));
    }
    $this->session->set_flashdata('message', 'changed!');
  }
}
