<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Warung extends CI_Controller{

    function __construct(){
        parent::__construct();

        $config['upload_path']      = FCPATH . 'assets/img/warung/';
        $config['allowed_types']    = '*';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = TRUE;
        $config['overwrite']        = TRUE;
        $config['max_width']        = 0;
        $config['max_height']       = 0;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if( ! is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }
    }

    public function statuswarung(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $warungfilter = array(
            'id_user' => $userid  
        );

        $data = array(
            'status' => $this->input->post('status')
        );

        if($this->warungmodels->update($data, $warungfilter)){
            $return = array(
                'message' => 'success',
                'status' => $data["status"]==1 ? 'Buka' : 'Tutup'
            );
        } else {
            $return = array(
                'message' => 'error'
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function update(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $this->form_validation->set_rules('nama_warung', 'Nama Warung', 'required');
        $this->form_validation->set_rules('alamat_warung', 'Alamat Warung', 'required');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_update_warung', 'Data Tidak Valid! Mohon di Cek Kembali.');
            redirect(site_url('detail'));
        } else {
            $data = array(
                'nama' => $this->input->post('nama_warung'),
                'alamat' => $this->input->post('alamat_warung'),
                'penanggung_jawab' => $this->input->post('penanggung_jawab'),
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'updated_at' => date("Y-m-d H:i:s")
            );
            
            $warungfilter = array(
                'id_user' => $userid  
            );
            
            if (!empty($_FILES['foto_warung']['name'])) {
                if(!$this->upload->do_upload('foto_warung')) {
                    $this->session->set_flashdata('error_update_warung', 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi');
                    redirect(site_url('detail'));
                } else {
                    $upload_data = $this->upload->data();
                    $data["foto"] = $upload_data['file_name'];
                }
            }

            if($this->warungmodels->update($data,$warungfilter)){
                $this->session->set_flashdata('success_update_warung', 'Berhasil Mengupdate Info Warung');
                redirect(site_url('detail'));
            } else {
                $this->session->set_flashdata('error_update_warung', 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi');
                redirect(site_url('detail'));
            }
        }
    }

    public function hapusfotodetail(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $data = array(
            'foto' => '',
            'updated_at' => date("Y-m-d H:i:s")
        );
        
        $warungfilter = array(
            'id_user' => $userid  
        );

        $datawarung = $this->warungmodels->getWhere($warungfilter)->row();

        if($this->warungmodels->update($data,$warungfilter)){
            $fotowarung = FCPATH . 'assets/img/warung/'.$datawarung->foto;
            unlink($fotowarung);
            $return = array(
                'status' => 'success',
                'message' => 'foto berhasil dihapus'
            );
        } else {
            $return = array(
                'status' => 'error',
                'message' => 'foto gagal dihapus'
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }

    public function getFiltered($nama){
        $filtered = $this->warungmodels->getFilteredNama($nama);
        if(!$filtered){
            $return = array(
                'status' => 'error',
                'message' => 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi'
            );
        } else {
            $return = array(
                'status' => 'success',
                'warung' => $filtered
            );
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }
}