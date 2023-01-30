<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NasabahModel extends CI_Model
{
    public function countTransaksi($id_nasabah)
    {
        $this->db->select('count(*) as total');
        $this->db->from('transaksi');
        $this->db->where('nasabah_id', $id_nasabah);
        $query = $this->db->get();
        return $query->row()->total;
    }
    public function getNasabah()
    {
        // return $this->db->get('nasabah')->result_array();
        $this->db->select('nasabah.*, COUNT(transaksi.id_transaksi) as jumlah_transaksi');
        $this->db->from('nasabah');
        $this->db->join('transaksi', 'nasabah.id_nasabah = transaksi.nasabah_id', 'left');
        $this->db->group_by('nasabah.id_nasabah');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getNasabahByNIK_Norek($nik_norek)
    {
        // return $this->db->get_where('nasabah', ['nik_norek' => $nik_norek])->row_array();
        $this->db->select('nasabah.*, COUNT(transaksi.id_transaksi) as jumlah_transaksi');
        $this->db->from('nasabah');
        $this->db->join('transaksi', 'nasabah.id_nasabah = transaksi.nasabah_id', 'left');
        $this->db->group_by('nasabah.id_nasabah');
        $this->db->where('nik_norek', $nik_norek);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function getNasabahByIdNasabah($idnasabah)
    {
        return $this->db->get_where('nasabah', ['id_nasabah' => $idnasabah])->row_array();
    }
    public function tambahNasabah($data)
    {
        $this->db->insert('nasabah', $data);
    }
    public function getIdNasabahTerbesar()
    {
        // $query = $this->db->query("SELECT MAX(id_nasabah) as id from nasabah");
        // $hasil = $query->row();
        // return $hasil->id;
        $this->db->select_max('id_nasabah', 'id');
        return $this->db->get('nasabah')->row();
    }
    public function getTransaksiByTgl()
    {
        // $this->db->like('tgl_masuk', $this->input->post('daritgl'));
        // return $this->db->get('nasabah');
        $this->db->select('*');
        $this->db->from('transaksi t');
        $this->db->join('nasabah n', 't.nasabah_id = n.id_nasabah');
        $this->db->where('DATE(t.tanggal_transaksi) >=', $this->input->post('daritgl'));
        $this->db->order_by('t.tanggal_transaksi', 'DESC');
        return $this->db->get();
    }
    public function getNasabahByTgl()
    {
        $this->db->select('nasabah_id, COUNT(nasabah_id) as jumlah');
        $this->db->from('transaksi');
        $this->db->where('DATE(tanggal_transaksi) >=', $this->input->post('daritgl'));
        $this->db->group_by('nasabah_id');
        return $this->db->get();
    }
    public function getTotalTransaksiNasabah()
    {
        $this->db->select('COUNT(*) as jumlah');
        $this->db->from('transaksi');
        $query = $this->db->get();
        return $query->row()->jumlah;
    }
    public function getTotalNasabah()
    {
        return $this->db->get('nasabah')->num_rows();
    }
    public function getTotalTransaksiHariini()
    {
        // $this->db->select_sum('ket_transaksi', 'total');
        // $this->db->like('tgl_masuk', date('Y-m-d'));
        // return $this->db->get('nasabah')->row_array();
        $today = date("Y-m-d");
        $this->db->select('COUNT(*) as jumlah');
        $this->db->from('transaksi');
        $this->db->where('DATE(tanggal_transaksi)', $today);
        $query = $this->db->get();
        return $query->row()->jumlah;
    }
    public function getTotalNasabahHariini()
    {
        $this->db->like('tgl_masuk', date('Y-m-d'));
        return $this->db->get('nasabah')->num_rows();
    }
    public function ubahnasabah($data, $idnasabah)
    {
        $this->db->where('id_nasabah', $idnasabah);
        $this->db->update('nasabah', $data);
    }
    public function hapusNasabah($id_nasabah)
    {
        $this->db->where('id_nasabah', $id_nasabah);
        $this->db->delete('nasabah');
    }
}

/* End of file NasabahModel.php */
