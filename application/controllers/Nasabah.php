<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NasabahModel');
        if ($this->session->userdata('id') && $this->session->userdata('role') == "admin") {
            redirect('admin');
        }
        if ($this->session->userdata('id') && $this->session->userdata('role') == "teller") {
            redirect('teller');
        }
    }
    public function verifikasi()
    {
        $this->form_validation->set_rules('nik_norek', 'NIK/No Rekening', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('nasabah/cek_norek');
        } else {
            $cekNoRek = $this->db->get_where('nasabah', ['nik_norek' => $this->input->post('nik_norek')])->row_array();
            if ($cekNoRek) {
                $this->session->set_userdata('nik_norek', $cekNoRek['nik_norek']);
                redirect('nasabah/create');
            } else {
                $this->session->set_userdata('nik_norek', $this->input->post('nik_norek'));
                redirect('nasabah/create');
            }
        }
    }
    public function create()
    {
        $nik_norek = $this->session->userdata('nik_norek');
        if ($nik_norek == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Mohon ikuti tahapan dari awal!</div>');
            redirect('');
        }

        $nasabah = $this->db->get_where('nasabah', ['nik_norek' => $nik_norek])->row_array();
        if ($nasabah) {
            $this->form_validation->set_rules('nik_norek', 'NIK/No Rekening', 'trim|required');
            if ($this->form_validation->run() == False) {
                $data = [
                    'nasabah' => $nasabah,
                    'count_transaksi' => $this->NasabahModel->countTransaksi($nasabah['id_nasabah'])
                ];
                $this->load->view('nasabah/detail', $data);
            } else {
                $this->session->unset_userdata('nik_norek');
                $this->session->set_userdata('nik_norek', $nik_norek);
                redirect('nasabah/transaksi');
            }
        } else {
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
            $this->form_validation->set_rules('perihal', 'Keterangan Transaksi', 'trim|required');

            if ($this->form_validation->run() == False) {
                $this->load->view('nasabah/create', $data);
            } else {
                $this->db->trans_start();
                // Nasabah
                $productOffered = null;
                if ($this->input->post('product_offered1') != null) {
                    $productOffered = $this->input->post('product_offered1');
                } else {
                    $productOffered = $this->input->post('product_offered');
                }
                $data = [
                    'id_nasabah' => $this->input->post('id_nasabah'),
                    'nik_norek' => $this->input->post('nik_norek'),
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'),
                    'product_offered' => $productOffered
                ];
                $this->NasabahModel->tambahNasabah($data);

                // Transaksi
                $perihal = $this->input->post('perihal');
                $no_rekening = $this->input->post('no_rekening');
                $nama_pemegang_rekening = $this->input->post('nama_pemegang_rekening');
                $perihal_lainnya = $this->input->post('perihal_lainnya');
                $nominal = str_replace(".", "", $this->input->post('nominal'));

                $data = [
                    'nasabah_id' => $this->input->post('id_nasabah'),
                    'perihal' => $perihal_lainnya == null ? $perihal : $perihal_lainnya,
                    'no_rekening' => $no_rekening,
                    'nama_pemegang_rekening' => $nama_pemegang_rekening,
                    'nominal' => $nominal,
                    'tanggal_transaksi' => date('Y-m-d H:i:s'),
                ];

                $this->db->insert('transaksi', $data);

                // Check If Transaction Complete
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Data gagal ditambah!</div>');
                    redirect('');
                }

                $this->db->trans_commit();
                $this->session->unset_userdata('nik_norek');
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil ditambah!</div>');
                redirect('');
            }
        }
    }
    public function transaksi()
    {
        $nik_norek = $this->session->userdata('nik_norek');
        if ($nik_norek == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Mohon ikuti tahapan dari awal!</div>');
            redirect('');
        }

        $this->form_validation->set_rules('perihal', 'Keterangan Transaksi', 'trim|required');

        $data['nasabah'] = $this->db->get_where('nasabah', ['nik_norek' => $nik_norek])->row_array();
        if ($this->form_validation->run() == False) {
            $this->load->view('nasabah/transaksi', $data);
        } else {
            $perihal = $this->input->post('perihal');
            $no_rekening = $this->input->post('no_rekening');
            $nama_pemegang_rekening = $this->input->post('nama_pemegang_rekening');
            $perihal_lainnya = $this->input->post('perihal_lainnya');
            $nominal = str_replace(".", "", $this->input->post('nominal'));

            $data = [
                'nasabah_id' => $data['nasabah']['id_nasabah'],
                'perihal' => $perihal_lainnya == null ? $perihal : $perihal_lainnya,
                'no_rekening' => $no_rekening,
                'nama_pemegang_rekening' => $nama_pemegang_rekening,
                'nominal' => $nominal,
                'tanggal_transaksi' => date('Y-m-d H:i:s'),
            ];

            $this->session->unset_userdata('nik_norek');
            $this->db->insert('transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Transaksi Berhasil!</div>');
            redirect('');
        }
    }
}
