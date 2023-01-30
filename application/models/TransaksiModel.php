<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiModel extends CI_Model
{
    public function hapusTransaksi($id_transaksi)
    {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi');
    }
}
