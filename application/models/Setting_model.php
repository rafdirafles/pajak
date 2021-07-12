<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Setting_model extends CI_Model
{

  // ------------------------------------------------------------------------------------------ //
  // Get Sub menu join with menu id
  public function getSubmenu()
  {
    $query = "SELECT mst_submenu.* , mst_menu.menu
              FROM  mst_submenu JOIN mst_menu
              ON  mst_submenu.menu_id = mst_menu.id
              ORDER BY mst_submenu.id ASC
             ";
    return $this->db->query($query)->result_array();
  }


  // ------------------------------------------------------------------------------------------ //
  // Delete menu utama
  public function hapusMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('mst_menu');
  }
  // Delete sub menu
  public function hapusSubmenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('mst_submenu');
  }
  // Delete role
  public function hapusRole($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('mst_role');
  }

  // ------------------------------------------------------------------------------------------ //
  // Edit Menu utama
  public function editMenu($id, $data)
  {
    return $this->db->update('mst_menu', $data, array('id' => $id));
  }
  // Edit Sub menu
  public function editSubmenu($id, $data)
  {
    return $this->db->update('mst_submenu', $data, array('id' => $id));
  }
  // Edit Role
  public function editRole($id, $data)
  {
    return $this->db->update('mst_role', $data, array('id' => $id));
  }




}
