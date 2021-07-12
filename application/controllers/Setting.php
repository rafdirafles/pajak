<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    is_logged_in();

    // Reset flash data
    $this->session->keep_flashdata('message');
    // Load model untuk query menu
    $this->load->model('Setting_model','menu');
  }

  public function menu()
  {
    $data['title'] = "Menu Management";
    $data['user'] = $this->db->get_where('mst_user',['username' => $this->session->userdata('username')])->row_array();

    // Get Data list menu from mst_menu
    $data['menu'] = $this->db->order_by('id', 'ASC')->get('mst_menu')->result_array();

    // Cek Form Validation
    $this->form_validation->set_rules('menu', 'Menu', 'trim|required');
    $this->form_validation->set_rules('icon', 'Icon', 'trim|required');

    // Jalankan form Jika salah maka
    if ($this->form_validation->run() == false)
    {
      $this->load->view('templates/header', $data );
      $this->load->view('templates/navbar', $data );
      $this->load->view('templates/sidebar', $data );
      $this->load->view('setting/menu', $data );
      $this->load->view('templates/footer');
    }
    // Jika benar maka aksi dijalankan
    else
    {
      $icons = 'ft-'.$this->input->post('icon');
      $menu = str_replace(' ', '_', $this->input->post('menu'));
      $data = [
        'menu' => strtolower($menu),
        'icons' => str_replace(' ', '',trim($icons))
      ];
      $this->db->insert('mst_menu', $data);

      $this->session->set_flashdata('message', 'add!');
      redirect('setting/menu');
    }

  }

  // Halaman sub menu untuk Menambahkan sub menu dari tiap menu utama
  public function submenu()
  {
    $data['title'] = "Submenu Management";
    $data['user'] = $this->db->get_where('mst_user',['username' => $this->session->userdata('username')])->row_array();

    // Sub menu query
    $data['submenu'] = $this->menu->getSubmenu();

    // Query menu
    $data['menu'] = $this->db->order_by('id', 'ASC')->get('mst_menu')->result_array();

    // Cek Form Validation
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('link', 'Link', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'trim|required');

    // Jalankan form Jika salah maka
    if ($this->form_validation->run() == false)
    {
      $this->load->view('templates/header', $data );
      $this->load->view('templates/navbar', $data );
      $this->load->view('templates/sidebar', $data );
      $this->load->view('setting/submenu', $data );
      $this->load->view('templates/footer');
    }
    // Jika benar maka masukkan Data
    else
    {
      $icon = 'fas fa-fw fa fa-'.$this->input->post('icon');
      $link =  $this->input->post('link');
      $data = [
        'title'     =>  $this->input->post('title'),
        'menu_id'   =>  $this->input->post('menu_id'),
        'link'      =>  strtolower($link),
        'icon'      =>  $icon,
        'is_active' =>  $this->input->post('is_active')
      ];
      $this->db->insert('mst_submenu', $data);

      $this->session->set_flashdata('message', 'add!');
      redirect('setting/submenu');

    }
  }

  // Halaman Role untuk melihat list role siapa aja
  public function role()
  {
    $data['title'] = "Role";
    $data['user'] = $this->db->get_where('mst_user',['username' => $this->session->userdata('username')])->row_array();

    // Get Data Role from mst_access_menu
    $data['role'] = $this->db->order_by('id', 'ASC')->get('mst_role')->result_array();


    // Cek Form Validation
    $this->form_validation->set_rules('role_id', 'Role Id', 'required');
    $this->form_validation->set_rules('role_name', 'Role Name', 'required');

    // Jalankan form Jika salah maka
    if ($this->form_validation->run() == false)
    {
      $this->load->view('templates/header', $data );
      $this->load->view('templates/navbar', $data );
      $this->load->view('templates/sidebar', $data );
      $this->load->view('setting/role', $data );
      $this->load->view('templates/footer');
    }
    // Jika benar maka aksi dijalankan
    else
    {
      $data = [
        'role_id' => $this->input->post('role_id'),
        'role_name' => $this->input->post('role_name'),
      ];
      $this->db->insert('mst_role', $data);

      $this->session->set_flashdata('message', 'add!');
      redirect('setting/role');
    }
  }

  // method role access
  public function roleaccess($role_id)
  {
    $data['title'] = "Role";
    $data['title2'] = "Role Access";
    $data['user'] = $this->db->get_where('mst_user',['username' => $this->session->userdata('username')])->row_array();

    // Get Data Role from mst_access_menu
    $data['role'] = $this->db->get_where('mst_role', ['role_id' => $role_id])->row_array();

    // Tidak memunculkan akses admin
    $this->db->where('id !=', 1);

    // Query data menu
    $data['menu'] = $this->db->order_by('id', 'ASC')->get('mst_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('setting/role-access', $data);
    $this->load->view('templates/footer');
  }

  // Change ACCESS With jQuery
  public function changeaccess()
  {
    $role_id = $this->input->post('roleId');
    $menu_id = $this->input->post('menuId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('mst_access_menu', $data)->num_rows();

    if($result < 1)
    {
      $this->db->insert('mst_access_menu', $data);
    }
    else
    {
      $this->db->delete('mst_access_menu', $data);
    }
    $this->session->set_flashdata('message','changed!');
  }

  // -------------------------------------------------------------------------------------- //
  // Edit menu
  public function editMenu()
  {
    // Cek Form Validation
    $this->form_validation->set_rules('menu', 'Menu', 'trim|required');
    $this->form_validation->set_rules('icon', 'Icon', 'trim|required');

    // Jalankan form Jika salah maka
    if ($this->form_validation->run() == false)
    {
      $this->load->view('templates/header', $data );
      $this->load->view('templates/navbar', $data );
      $this->load->view('templates/sidebar', $data );
      $this->load->view('setting/index', $data );
      $this->load->view('templates/footer');
    }
    else
    {
      $id =  $this->input->post('id');
      $icons = 'ft-'.$this->input->post('icon');
      $data = [
        'menu' => str_replace(' ', '_', $this->input->post('menu')),
        'icons' => str_replace(' ', '',trim($icons))
      ];
      $this->menu->editMenu($id,$data);
      $this->session->set_flashdata('message', 'updated!');
      redirect('setting/menu');
    }
  }
  // Edit sub menu
  public function editSubmenu()
  {
    $id =  $this->input->post('id');
    $icon = 'fas fa-fw fa fa-'.$this->input->post('icon');
    $link =  $this->input->post('link');
    $data = [
      'title'     =>  $this->input->post('title'),
      'menu_id'   =>  $this->input->post('menu_id'),
      'link'      =>  strtolower($link),
      'icon'      =>  $icon,
      'is_active' =>  $this->input->post('is_active')
    ];
    $this->menu->editSubmenu($id,$data);

    $this->session->set_flashdata('message', 'updated!');
    redirect('setting/submenu');
  }
  // Edit role
  public function editRole()
  {
    $id =  $this->input->post('id');
    $data = [
      'role_id'   =>  $this->input->post('role_id'),
      'role_name' =>  $this->input->post('role_name')
    ];
    $this->menu->editRole($id,$data);

    $this->session->set_flashdata('message', 'updated!');
    redirect('setting/role');
  }

  // -------------------------------------------------------------------------------------- //
  // delete menu
  public function hapusMenu($id)
  {
    $this->menu->hapusMenu($id);
    $this->session->set_flashdata('message', 'deleted!');
    redirect('setting/menu');
  }
  // delete sub menu
  public function hapusSubmenu($id)
  {
    $this->menu->hapusSubmenu($id);
    $this->session->set_flashdata('message', 'deleted!');
    redirect('setting/submenu');
  }
  // delete role
  public function hapusRole($id)
  {
    $this->menu->hapusRole($id);
    $this->session->set_flashdata('message', 'deleted!');
    redirect('setting/role');
  }
}
