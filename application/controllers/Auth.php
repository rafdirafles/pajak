<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  // Parent construct
  public function __construct()
  {
    parent::__construct();
    // load model
    // $this->load->model('Auth_model', 'am');
  }

  // Halaman Index / login
  public function index()
  {
    // jika sudah login dan ingin masuk ke laman login maka akan diarahkan ke default page
    // $this->goToDefaultPage();

    // cek Form validation dengan set rules
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');

    // Jika Inputan salah
    if ($this->form_validation->run() == false) {
      $data['title'] = "E-TAX NUSINDO";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    }
    // Jika benar maka berhasil masuk ke proses Login
    else {
      $this->_login();
    }
  }

  // Fungsi login yang akan dijalankan di method index
  private function _login()
  {
    // Get user id atau email bebas
    $username = $this->input->post('username');
    $email = $this->input->post('username');
    // var_dump($username);die;
    // Get password
    $password = $this->input->post('password');

    // Get id or email from db
    $this->db->where('username', $username);
    $this->db->or_where('email', $email);
    $user = $this->db->get('mst_user')->row_array();

    // Jika username ada
    if ($user) {
      // Jika user ada dan user active maka
      if ($user['is_active'] == 1) {
        // Cek passwordnya apakah sesuai
        if (password_verify($password, $user['password'])) {
          $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id'],
            'branch_id' => $user['branch_id'],
          ];
          $this->session->set_userdata($data);
          // Jika Password sesuai maka cek role id nya jika dia super admin:
          if ($user['role_id'] == "1") {
            redirect('super_admin');
          }
          // Jika Bukan Super Admin maka dia admin, pusat, cabang
          else if ($user['role_id'] == "2") {
            redirect('admin');
          }
          // Jika Bukan Super Admin maka dia admin, pusat, cabang
          else if ($user['role_id'] == "3") {
            redirect('pusat');
          }
          // Jika Bukan Super Admin maka dia admin, pusat, cabang
          else if ($user['role_id'] == "4") {
            redirect('cabang');
          }
        }
        // Jika password nya salah maka
        else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                    <i class="fa fa-times-circle mr-2"></i>
                                                    Password is wrong!</div>');
          redirect('auth');
        }
      }
      // Namun user tidak aktif maka
      else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                  <i class="fa fa-user-clock mr-2"></i>
                                                  The User has not been activated, Please activated from your email or contact administrator </div>');
        redirect('auth');
      }
    }
    // Jika user tidak ada
    else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                <i class="fa fa-times-circle mr-2"></i>
                                                User is not registered</div>');
      // Redirect ke halaman login
      redirect('auth');
    }
  }

  // Fungsi logout yang dipanggil di navbar
  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fa fa-user-clock mr-2"></i>
                                              You have been logout</div>');
    // Redirect ke halaman login
    redirect('auth');
  }

  // DefaultPage after login
  // public function goToDefaultPage()
  // {
  //   // Jika Sudah login maka tidak bisa ke menu login sebelum logout
  //   if ($this->session->userdata('role_id') == "1") {
  //     redirect('super');
  //   }
  //   // Jika Bukan Admin maka dia teknisi marketing atau customer
  //   else if ($this->session->userdata('role_id') == "2") {
  //     redirect('admin');
  //   }
  //   // Jika Bukan Admin maka dia teknisi marketing atau customer
  //   else if ($this->session->userdata('role_id') == "3") {
  //     redirect('pusat');
  //   }
  //   else if ($this->session->userdata('role_id') == "4") {
  //     redirect('cabang');
  //   }
  //   // End
  // }

  // Blocked because required user access
  public function blocked()
  {
    $data['title'] = "403 Forbidden";
    $this->load->view('templates/auth_header', $data);
    $this->load->view('auth/blocked');
  }

  // method forget pasword
  public function forgotPassword()
  {
    // Tidak bisa diakses jika sudah login akan diarahkan ke default page masing2
    $this->goToDefaultPage();

    // cek Form validation dengan set rules
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    // Jika Inputan salah
    if ($this->form_validation->run() == false) {
      $data['title'] = "FORGOT PASSWORD";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/forgotpassword');
      $this->load->view('templates/auth_footer');
    }
    // Jika inputan benar maka:
    else {
      //post email dari inputan
      $email = $this->input->post('email');
      // cocokan email dengan query db dan pastikan user yang lupa password adalah user active :
      $user = $this->db->get_where('mst_user', ['email' => $email, 'is_active' => 1])->row_array();

      // Jika user ada dan aktif maka
      if ($user) {
        // Token untuk reset password
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];
        // Insert ke dalam db mst token
        $this->db->insert('mst_token', $user_token);

        // Kirim email reset password
        $this->_sendEmail($token, 'forgot');

        // redirect halaman login
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                  Please check your email to reset your password.</div>');
        redirect('auth');
      }
      // Jika user belum aktif
      else {
        // redirect halaman forgot password
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                                  Email is not registered or activated!</div>');
        redirect('auth/forgotpassword');
      }
    }
  }

  // method reset password setelah berhasil kirim email reset password
  public function resetpassword()
  {
    // get email dari url
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    // query user by email
    $user = $this->db->get_where('mst_user', ['email' => $email])->row_array();

    // jika user ada maka
    if ($user) {
      // query mst token cocokan dengan urlnya
      $user_token = $this->db->get_where('mst_token', ['token' => $token])->row_array();

      // Jika token cocok maka :
      if ($user_token) {
        // cocokan jam aktivasi token jika kurang dari 24 jam maka :
        if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
          // set email agar akses dibatasi :
          $this->session->set_userdata('reset_email', $email);
          // Masuk ke laman change password dengan session diatas :
          $this->changePassword();
        }
        // Jika jam lebih dari 24 jam maka
        else {
          // delete token
          $this->db->delete('mst_token', ['token' => $token]);
          // redirect ke halaman login
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                              Reset password failed. Token Expired!</div>');
          redirect('auth');
        }
      }
      // jika user ada tetapi token salah maka :
      else {
        // redirect ke halaman login
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                              Reset password failed. Your token has been used or Wrong Token!</div>');
        redirect('auth');
      }
    }
    // jika user tidak ada maka :
    else {
      // redirect ke halaman login
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                                            Reset password failed. Wrong Email!</div>');
      redirect('auth');
    }
  }

  // method reset password setelah berhasil kirim email reset password
  public function changePassword()
  {
    // Jika tidak ada session maka tidak dapat diakses dan diarahkan ke halaman login
    if (!$this->session->userdata('reset_email')) {
      redirect('auth');
    }

    // cek Form validation dengan set rules
    $this->form_validation->set_rules(
      'password1',
      'Password',
      'trim|required|min_length[6]|matches[password2]',
      [
        'matches' => 'Password not match!',
        'min_length' => 'Password at least 6 characters!'
      ]
    );
    $this->form_validation->set_rules('password2', 'Password', 'trim|required|matches[password1]');
    // Jika Inputan salah
    if ($this->form_validation->run() == false) {
      $data['title'] = "CHANGE PASSWORD";
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/changepassword');
      $this->load->view('templates/auth_footer');
    }
    // jika inputan benar maka proses ganti password :
    else {
      // inputan password
      $new_password = $this->input->post('password1');
      $password = password_hash($new_password, PASSWORD_DEFAULT);
      // set session untuk update password user
      $email = $this->session->userdata('reset_email');

      // Proses update password
      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('mst_user');

      // delete token yang sudah digenerate
      $this->db->delete('mst_token', ['email' => $email]);

      $this->session->unset_userdata('reset_email');

      // redirect ke halaman login
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                  Your Password has been changed! Please Login.</div>');
      redirect('auth');
    }
  }
}
