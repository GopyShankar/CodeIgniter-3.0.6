<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class appCtr extends CI_Controller {
    
    function appCtr()
    {
	parent::__construct();
	$this->load->model('appMod');
    }
    
    public function index()
    {
	$result['user']=$this->appMod->fetch();
	$this->load->view('header');
	$this->load->view('welcome_message',$result);
    }
    
    public function printTemplate()
    {
	$this->load->view('printTemplate');
    }
    
    public function checkthelink(){
	$this->load->view('header');
    }
    
}
