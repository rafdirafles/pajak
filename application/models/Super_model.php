<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Super_model extends CI_Model
{
    // Get user profile ( per user )
    public function getProfile($username)
    {
        $query =    "SELECT A.id, A.username, A.password, A.email, C.branch_id, C.branch_name, A.role_id, D.role_name, A.is_active, 
                    A.image, B.name, B.nik, B.phone
                    FROM mst_user A	
                    LEFT JOIN mst_pegawai B ON B.username = A.username 
                    LEFT JOIN mst_branch C ON C.branch_id = A.branch_id
                    LEFT JOIN mst_role D ON D.role_id = A.role_id
                    WHERE A.username = '" . $username . "'
                    ";
        return $this->db->query($query)->row_array();
    }
    // Get All user 
    public function getDataUsers()
    {
        $query =    "SELECT A.id, A.username, A.email, C.branch_id, C.branch_name, A.role_id, D.role_name, A.is_active, B.name, B.nik, B.phone
                    FROM mst_user A	
                    LEFT JOIN mst_pegawai B ON B.username = A.username 
                    LEFT JOIN mst_branch C ON C.branch_id = A.branch_id
                    LEFT JOIN mst_role D ON D.role_id = A.role_id
                    WHERE A.role_id != 1
                    ORDER BY A.id DESC
                    ";
        return $this->db->query($query)->result_array();
    }

    // ------------------------------------------------------------------------------------------ //
    //memilih kode cabang
    function get_branch()
    {
        $query = $this->db->order_by('branch_id', 'ASC')->get('mst_branch')->result_array();
        return $query;
    }
}
