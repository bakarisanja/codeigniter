<?php if ( ! defined('BASEPATH')) exit ('NO direct script access allowed');

/**
 * class MY_Controller
 */
class MY_Controller extends CI_Controller
{	
	//set class variables
    public $template = array();
    public $data = array();

    //load layout
    public function layout()
    {
        //making template and send data to view
        $this->template['header'] = $this->load->view('layout/header', $this->data, true);
        $this->template['left'] = $this->load->view('layout/left', $this->data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
        $this->load->view('layout/index', $this->template);
    }
}