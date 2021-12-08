<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $this->load->view('home');
    }

    public function stok_warung(){
        $this->load->view('stok_warung');
    }

    public function sign_up(){
        $this->load->view('sign_up');
    }

    public function login(){
        $this->load->view('login');
    }
}