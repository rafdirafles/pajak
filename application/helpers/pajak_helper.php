<?php

function is_logged_in()
{
  // Get mvc dari ci karena helper tidak mengenal this
  $ci = get_instance();
  // Jika sessionnya tidak ada maka tidak bisa masuk , redirect ke auth
  if(!$ci->session->userdata('username'))
  {
    redirect('auth');
  }
  // jika ada maka cek role id nya berapa
  else
  {
    // get role id yang login
    $role_id = $ci->session->userdata('role_id');

    // get menu id dari segment
    $menu = $ci->uri->segment(1);

    $queryMenu = $ci->db->get_where('mst_menu', ['menu' => $menu])->row_array();
    $menu_id = $queryMenu['id'];

    // user acces where role id = menu id
    $userAccess = $ci->db->get_where('mst_access_menu', [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ])->row_array();

    // cek apakah user access nya ada
    if($userAccess < 1)
    {
      redirect('auth/blocked');
    }
  }
}

function check_access($role_id, $menu_id)
{
  $ci = get_instance();

  $ci->db->where('role_id', $role_id);
  $ci->db->where('menu_id', $menu_id);
  $result = $ci->db->get('mst_access_menu');

  if($result->num_rows() > 0)
  {
    return "checked='checked'";
  }
}

function check_active($username)
{
  $ci = get_instance();

  $ci->db->where('username', $username);
  $ci->db->where('is_active', 1);
  $result = $ci->db->get('mst_user')->num_rows();

  if($result > 0)
  {
    return "checked='checked'";
  }
}
