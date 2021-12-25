<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Auth extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function daftar(){
        $this->form_validation->set_rules('nama_warung', 'Nama Warung', 'required');
        $this->form_validation->set_rules('alamat_warung', 'Alamat Warung', 'required');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passkonfirm', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_signup', 'Data Registrasi Tidak Valid! Mohon di Cek Kembali.');
            $this->load->view('sign_up');
        } else {
            $userdata = array(
                'telepon' => $this->input->post('telepon'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            );
            if($this->usermodels->insert($userdata)) {
                $data = array(
                    'nama' => $this->input->post('nama_warung'),
                    'id_user' => $this->db->insert_id(),
                    'alamat' => $this->input->post('alamat_warung'),
                    'penanggung_jawab' => $this->input->post('penanggung_jawab'),
                    'telepon' => $this->input->post('telepon'),
                    'email' => $this->input->post('email'),
                    'status' => 0
                );
    
                if($this->warungmodels->insert($data)) {
                    $user_data = array(
                        "user_id" => $data["id_user"]
                    );
                    $this->session->set_userdata($user_data);
                    redirect(site_url('dashboard'), 'refresh');
                } else {
                    $this->session->set_flashdata('error_signup', 'Terjadi Kesalahan Pada Server Mohon Ulangi Beberapa Saat Lagi');
                    redirect(site_url('register'));
                }
            } else {
                $this->session->set_flashdata('error_signup', 'Terjadi Kesalahan Pada Server Mohon Ulangi Beberapa Saat Lagi');
                redirect(site_url('register'));
            }
        }
    }

    public function login(){
        $this->form_validation->set_rules('email/telepon', 'Email / Telepon', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_signup', 'Data Tidak Valid! Mohon di Cek Kembali.');
            redirect(site_url('login'));
        } else {
            $filter = array (
                'telepon' => $this->input->post('email/telepon'),
                'email' => $this->input->post('email/telepon'),
            );
            $user = $this->usermodels->getWhere($filter)->row();
            if(!$user){
                $this->session->set_flashdata('error_login', "Email/Telepon atau Password Salah");
                redirect(site_url('login'));
            } else {
                if (password_verify($this->input->post('password'), $user->password)) {
                    $user_data = array(
                        "user_id" => $user->id
                    );
                    $this->session->set_userdata($user_data);
                    redirect(site_url('dashboard'), 'refresh');
                } else {
                    $this->session->set_flashdata('error_login', "Email/Telepon atau Password Salah");
                    redirect(site_url('login'));
                }
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

    public function updatepassword(){
        $userid = $this->session->userdata('user_id');
        if ($userid == NULL) {
            redirect(site_url('login'));
        }

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required');
        $this->form_validation->set_rules('password_baru_konfirm', 'Konfirmasi Password Baru', 'required|matches[password_baru]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error_update_pass', 'Data Tidak Valid! Mohon di Cek Kembali.');
            redirect(site_url('detail'));
        } else {
            $userdata = array(
                'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT),
                'updated_at' => date("Y-m-d H:i:s")
            );
            $userfilter = array(
                'id' => $userid
            );

            if($this->usermodels->update($userdata,$userfilter)){
                $this->session->set_flashdata('success_update_pass', 'Berhasil Mengganti Password');
                redirect(site_url('detail'));
            } else {
                $this->session->set_flashdata('error_update_pass', 'Terjadi Kesalahan Server. Mohon Diulangi Beberapa Saat Lagi');
                redirect(site_url('detail'));
            }
        }
    }
}