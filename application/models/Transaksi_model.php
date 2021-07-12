<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Transaksi_model extends CI_Model
{
    function insert_table_data($table_data)
    {
        $this->db->insert_batch('tax_faktur', $table_data);
    }
}
