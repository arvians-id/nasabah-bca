<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NasabahModel');
        if (!$this->session->userdata('id')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Untuk mengakses teller, anda perlu login.</div');
            redirect('login');
        }
        if ($this->session->userdata('role') != "teller") {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda tidak memiliki akses ke halaman ini.</div');
            redirect('admin');
        }
    }
    public function index()
    {
        $data['judul'] = 'Halaman Dashboard Teller';
        $data['total_transaksi_nasabah'] = $this->NasabahModel->getTotalTransaksiNasabah();
        $data['total_nasabah'] = $this->NasabahModel->getTotalNasabah();
        $data['transaksi_hariini'] = $this->NasabahModel->getTotalTransaksiHariini();
        $data['nasabah_hariini'] = $this->NasabahModel->getTotalNasabahHariini();
        $this->load->view('teller/template/header.php', $data);
        $this->load->view('teller/template/sidebar.php', $data);
        $this->load->view('teller/index.php', $data);
        $this->load->view('teller/template/footer.php');
    }
    public function lihatnasabahtgl()
    {
        $data['judul'] = 'Halaman Dashboard Teller';
        $data['nasabah_bytgl'] = $this->NasabahModel->getNasabahByTgl()->result_array();
        $data['nasabah_bytgl_numrows'] = $this->NasabahModel->getNasabahByTgl()->num_rows();
        $this->load->view('teller/template/header.php', $data);
        $this->load->view('teller/template/sidebar.php', $data);
        $this->load->view('teller/lihatnasabahtgl.php', $data);
        $this->load->view('teller/template/footer.php');
    }
    public function nasabah()
    {
        $data['judul'] = 'Halaman Nasabah';
        $data['nasabah'] = $this->NasabahModel->getNasabah();
        $this->form_validation->set_rules('nik_norek', 'nik/no.rek', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teller/template/header.php', $data);
            $this->load->view('teller/template/sidebar.php', $data);
            $this->load->view('teller/nasabah.php', $data);
            $this->load->view('teller/template/footer.php');
        } else {
            $this->ceknasabah();
        }
    }
    public function ceknasabah()
    {
        $data['nik_norek'] = $_POST['nik_norek'];
        $nasabah = $this->NasabahModel->getNasabahByNIK_Norek($data['nik_norek']);
        if ($nasabah) {
            $this->db->set('ket_transaksi', $nasabah['ket_transaksi'] + 1);
            $this->db->where('nik_norek', $data['nik_norek']);
            $this->db->update('nasabah');
            redirect('admin/detailnasabah/' . $_POST['nik_norek']);
        } else {
            redirect('admin/tambahnasabah/' . $_POST['nik_norek']);
        }
    }
    public function tambahNasabah($nik_norek)
    {
        $data['judul'] = 'Input Nasabah';
        $data['nik_norek'] = $nik_norek;
        $id_nasabah = $this->NasabahModel->getIdNasabahTerbesar();
        $urutan = substr($id_nasabah->id, 4, 4);
        $idbaru = $urutan + 1;
        $huruf = "NSBH";
        $data['idnasabah'] = $huruf . sprintf("%04s", $idbaru);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telepon', 'trim|required|numeric');

        if ($this->form_validation->run() == False) {
            $this->load->view('teller/template/header.php', $data);
            $this->load->view('teller/template/sidebar.php', $data);
            $this->load->view('teller/tambahnasabah.php', $data);
            $this->load->view('teller/template/footer.php');
        } else {
            if ($this->input->post('product_offered1') != null) {
                $data = [
                    'id_nasabah' => $this->input->post('id_nasabah'),
                    'nik_norek' => $this->input->post('nik_norek'),
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'ket_transaksi' => 1,
                    'product_offered' => $this->input->post('product_offered1')
                ];
                $this->NasabahModel->tambahNasabah($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil ditambah!</div>');
                redirect('admin/nasabah');
            } else {
                $data = [
                    'id_nasabah' => $this->input->post('id_nasabah'),
                    'nik_norek' => $this->input->post('nik_norek'),
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'ket_transaksi' => 1,
                    'product_offered' => $this->input->post('product_offered')
                ];
                $this->NasabahModel->tambahNasabah($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil ditambah!</div>');
                redirect('admin/nasabah');
            }
        }
    }
    public function detailnasabah($nik_norek)
    {
        $data['judul'] = 'Detail Nasabah';
        $data['nasabah'] = $this->NasabahModel->getNasabahByNIK_Norek($nik_norek);
        $this->load->view('teller/template/header.php', $data);
        $this->load->view('teller/template/sidebar.php', $data);
        $this->load->view('teller/detailnasabah.php', $data);
        $this->load->view('teller/template/footer.php');
    }
    public function ubahnasabah($id_nasabah)
    {
        $data['judul'] = 'Ubah Nasabah';
        $data['nasabah'] = $this->NasabahModel->getNasabahByIdNasabah($id_nasabah);
        $this->form_validation->set_rules('nik_norek', 'nik/norek', 'trim|required|numeric|is_unique[nasabah.nik_norek]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telepon', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teller/template/header.php', $data);
            $this->load->view('teller/template/sidebar.php', $data);
            $this->load->view('teller/editnasabah.php', $data);
            $this->load->view('teller/template/footer.php');
        } else {
            if ($this->input->post('product_offered1') != null) {
                $nasabah = $this->NasabahModel->getNasabahByIdNasabah($id_nasabah);
                $data = [
                    'nik_norek' => $this->input->post('nik_norek'),
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'ket_transaksi' => $data['nasabah']['ket_transaksi'] + 1,
                    'product_offered' => $this->input->post('product_offered1')
                ];
                $this->NasabahModel->ubahNasabah($data, $nasabah['id_nasabah']);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil diubah!</div>');
                redirect('admin/nasabah');
            } else {
                $nasabah = $this->NasabahModel->getNasabahByIdNasabah($id_nasabah);
                $data = [
                    'nik_norek' => $this->input->post('nik_norek'),
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'ket_transaksi' => $data['nasabah']['ket_transaksi'] + 1,
                    'product_offered' => $this->input->post('product_offered')
                ];
                $this->NasabahModel->ubahNasabah($data, $nasabah['id_nasabah']);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil diubah!</div>');
                redirect('admin/nasabah');
            }
        }
    }
    public function hapusnasabah($id_nasabah)
    {
        $this->NasabahModel->hapusNasabah($id_nasabah);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('admin/nasabah');
    }
}
