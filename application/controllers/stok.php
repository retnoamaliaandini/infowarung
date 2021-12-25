<?php
defined('BASEPATH') or exit ('no direct script access allowed');

class Stok extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    public function getstokfilter($month){
        $yearonly = strtok($month, '-');
        $monthonly = substr($month, strpos($month, "-") + 1);

        $stok = $this->stokhistorymodels->getFiltered($yearonly, $monthonly)->result();
        $return = array(
            'status' => 'success',
            'stok' => $stok
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($return));
    }
}