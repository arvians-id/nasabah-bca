<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NasabahModel');
        $this->load->model('TransaksiModel');
        if (!$this->session->userdata('id')) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Untuk mengakses admin, anda perlu login.</div');
            redirect('login');
        }
        if ($this->session->userdata('role') != "admin") {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda tidak memiliki akses ke halaman ini.</div');
            redirect('teller');
        }
    }
    public function index()
    {
        $data['judul'] = 'Halaman Dashboard Admin';
        $data['total_transaksi_nasabah'] = $this->NasabahModel->getTotalTransaksiNasabah();
        $data['total_nasabah'] = $this->NasabahModel->getTotalNasabah();
        $data['transaksi_hariini'] = $this->NasabahModel->getTotalTransaksiHariini();
        $data['nasabah_hariini'] = $this->NasabahModel->getTotalNasabahHariini();
        $this->load->view('admin/template/header.php', $data);
        $this->load->view('admin/template/sidebar.php', $data);
        $this->load->view('admin/index.php', $data);
        $this->load->view('admin/template/footer.php');
    }
    public function lihatnasabahtgl()
    {
        $data['judul'] = 'Halaman Dashboard Admin';
        $data['nasabah_bytgl'] = $this->NasabahModel->getTransaksiByTgl()->result_array();
        $data['nasabah_bytgl_numrows'] = $this->NasabahModel->getNasabahByTgl()->num_rows();
        $data['jumlah_setoran'] = $this->NasabahModel->sumColumnByTgl('setoran')->jumlah_setoran;
        $data['jumlah_tarikan'] = $this->NasabahModel->sumColumnByTgl('tarikan')->jumlah_tarikan;
        $data['jumlah_pemindahan'] = $this->NasabahModel->sumColumnByTgl('pemindahan')->jumlah_pemindahan;
        $this->load->view('admin/template/header.php', $data);
        $this->load->view('admin/template/sidebar.php', $data);
        $this->load->view('admin/lihatnasabahtgl.php', $data);
        $this->load->view('admin/template/footer.php');
    }
    public function nasabah()
    {
        $data['judul'] = 'Data Nasabah';
        $data['nasabah'] = $this->NasabahModel->getNasabah();
        $this->form_validation->set_rules('nik_norek', 'nik/no.rek', 'trim|required|numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header.php', $data);
            $this->load->view('admin/template/sidebar.php', $data);
            $this->load->view('admin/nasabah.php', $data);
            $this->load->view('admin/template/footer.php');
        } else {
            $this->ceknasabah();
        }
    }
    public function ceknasabah()
    {
        $data['nik_norek'] = $_POST['nik_norek'];
        $nasabah = $this->NasabahModel->getNasabahByNIK_Norek($data['nik_norek']);
        if ($nasabah) {
            $this->session->set_userdata('nik_norek', $data['nik_norek']);
            redirect('admin/create_transaksi');
        } else {
            $this->session->set_userdata('nik_norek', $this->input->post('nik_norek'));
            redirect('admin/create_transaksi');
        }
    }
    public function create_transaksi()
    {
        $nik_norek = $this->session->userdata('nik_norek');
        if ($nik_norek == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Mohon ikuti tahapan dari awal!</div>');
            redirect('admin/nasabah');
        }

        $nasabah = $this->db->get_where('nasabah', ['nik_norek' => $nik_norek])->row_array();
        if ($nasabah) {
            $this->form_validation->set_rules('nik_norek', 'NIK/No Rekening', 'trim|required');
            if ($this->form_validation->run() == False) {
                $data = [
                    'nasabah' => $nasabah,
                    'count_transaksi' => $this->NasabahModel->countTransaksi($nasabah['id_nasabah'])
                ];
                $data['judul'] = 'Verifikasi Transaksi Nasabah';
                $data['nasabah'] = $this->NasabahModel->getNasabahByNIK_Norek($nik_norek);
                $this->load->view('admin/template/header.php', $data);
                $this->load->view('admin/template/sidebar.php', $data);
                $this->load->view('admin/detail_transaksi.php', $data);
                $this->load->view('admin/template/footer.php');
            } else {
                $this->session->unset_userdata('nik_norek');
                $this->session->set_userdata('nik_norek', $nik_norek);
                redirect('admin/final_transaksi');
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

            if ($this->form_validation->run() == False) {
                $this->load->view('admin/template/header.php', $data);
                $this->load->view('admin/template/sidebar.php', $data);
                $this->load->view('admin/tambahnasabah.php', $data);
                $this->load->view('admin/template/footer.php');
            } else {
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
                $this->session->unset_userdata('nik_norek');
                $this->NasabahModel->tambahNasabah($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil ditambah!</div>');
                redirect('admin/nasabah');
            }
        }
    }
    public function final_transaksi()
    {
        $nik_norek = $this->session->userdata('nik_norek');
        if ($nik_norek == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Mohon ikuti tahapan dari awal!</div>');
            redirect('');
        }

        $this->form_validation->set_rules('perihal', 'perihal', 'trim|required');
        $this->form_validation->set_rules('no_rekening', 'no rekening', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_pemegang_rekening', 'nama pemegang rekening', 'trim|required');

        $data['nasabah'] = $this->db->get_where('nasabah', ['nik_norek' => $nik_norek])->row_array();
        $data['judul'] = 'Final Transaksi Nasabah';
        if ($this->form_validation->run() == False) {
            $this->load->view('admin/template/header.php', $data);
            $this->load->view('admin/template/sidebar.php', $data);
            $this->load->view('admin/final_transaksi.php', $data);
            $this->load->view('admin/template/footer.php');
        } else {
            $perihal = $this->input->post('perihal');
            $no_rekening = $this->input->post('no_rekening');
            $nama_pemegang_rekening = $this->input->post('nama_pemegang_rekening');
            $perihal_lainnya = $this->input->post('perihal_lainnya');
            $nominal = $this->input->post('nominal');

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
            redirect('admin/nasabah');
        }
    }
    public function detailnasabah($nik_norek)
    {
        $data['judul'] = 'Detail Nasabah';
        $data['nasabah'] = $this->NasabahModel->getNasabahByNIK_Norek($nik_norek);
        $data['transaksi'] = $this->db->get_where('transaksi', ['nasabah_id' => $data['nasabah']['id_nasabah']])->result_array();
        $this->load->view('admin/template/header.php', $data);
        $this->load->view('admin/template/sidebar.php', $data);
        $this->load->view('admin/detailnasabah.php', $data);
        $this->load->view('admin/template/footer.php');
    }
    public function ubahnasabah($id_nasabah)
    {
        $data['judul'] = 'Ubah Nasabah';
        $data['nasabah'] = $this->NasabahModel->getNasabahByIdNasabah($id_nasabah);
        $this->form_validation->set_rules('nik_norek', 'nik/norek', 'trim|required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telepon', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header.php', $data);
            $this->load->view('admin/template/sidebar.php', $data);
            $this->load->view('admin/editnasabah.php', $data);
            $this->load->view('admin/template/footer.php');
        } else {
            $this->db->trans_start();
            // Ubah Nasabah
            $productOffered = null;
            if ($this->input->post('product_offered1') != null) {
                $productOffered = $this->input->post('product_offered1');
            } else {
                $productOffered = $this->input->post('product_offered');
            }

            $nasabah = $this->NasabahModel->getNasabahByIdNasabah($id_nasabah);
            $data = [
                'nik_norek' => $this->input->post('nik_norek'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'no_telp' => $this->input->post('no_telp'),
                'product_offered' => $productOffered
            ];
            $this->NasabahModel->ubahNasabah($data, $nasabah['id_nasabah']);

            // Transaksi
            $data = [
                'nasabah_id' => $id_nasabah,
                'perihal' => "Pengubahan Data Nasabah",
                'no_rekening' => null,
                'nama_pemegang_rekening' => null,
                'nominal' => null,
                'tanggal_transaksi' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('transaksi', $data);

            // Check If Transaction Complete
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data gagal diubah!</div>');
                redirect('admin/nasabah');
            }

            $this->db->trans_commit();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil diubah!</div>');
            redirect('admin/nasabah');
        }
    }
    public function hapusnasabah($id_nasabah)
    {
        $this->NasabahModel->hapusNasabah($id_nasabah);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('admin/nasabah');
    }
    public function transaksi()
    {
        $data = [
            'judul' => 'Data Transaksi',
            'transaksi' => $this->db->order_by('tanggal_transaksi', 'desc')->get('transaksi')->result_array()
        ];
        $this->load->view('admin/template/header.php', $data);
        $this->load->view('admin/template/sidebar.php', $data);
        $this->load->view('admin/transaksi.php', $data);
        $this->load->view('admin/template/footer.php');
    }
    public function hapustransaksi($id_transaksi)
    {
        $this->TransaksiModel->hapusTransaksi($id_transaksi);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus!</div>');
        redirect('admin/transaksi');
    }
    public function ubahtransaksi($id_transaksi)
    {
        $data['judul'] = 'Ubah Transaksi';
        $data['transaksi'] = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row_array();
        $this->form_validation->set_rules('perihal', 'perihal', 'trim|required');
        $this->form_validation->set_rules('no_rekening', 'no rekening', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_pemegang_rekening', 'nama pemegang rekening', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template/header.php', $data);
            $this->load->view('admin/template/sidebar.php', $data);
            $this->load->view('admin/edittransaksi.php', $data);
            $this->load->view('admin/template/footer.php');
        } else {
            $this->db->trans_start();
            // Ubah Nasabah
            $perihal = $this->input->post('perihal');
            $no_rekening = $this->input->post('no_rekening');
            $nama_pemegang_rekening = $this->input->post('nama_pemegang_rekening');
            $perihal_lainnya = $this->input->post('perihal_lainnya');
            $nominal = $this->input->post('nominal');

            $nasabah = $this->db->get_where('nasabah', ['id_nasabah' => $data['transaksi']['nasabah_id']])->row_array();

            $data = [
                'nasabah_id' => $nasabah['id_nasabah'],
                'perihal' => $perihal_lainnya == null ? $perihal : $perihal_lainnya,
                'no_rekening' => $no_rekening,
                'nama_pemegang_rekening' => $nama_pemegang_rekening,
                'nominal' => $nominal,
            ];
            $this->db->where('id_transaksi', $id_transaksi);
            $this->db->update('transaksi', $data);

            // Transaksi
            $data = [
                'nasabah_id' => $nasabah['id_nasabah'],
                'perihal' => "Pengubahan Data Transaksi",
                'no_rekening' => null,
                'nama_pemegang_rekening' => null,
                'nominal' => null,
                'tanggal_transaksi' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('transaksi', $data);

            // Check If Transaction Complete
            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data gagal diubah!</div>');
                redirect('admin/transaksi');
            }

            $this->db->trans_commit();
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil diubah!</div>');
            redirect('admin/transaksi');
        }
    }
}
