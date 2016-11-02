<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vendorCtr extends CI_Controller {
    
    function vendorCtr()
    {
	parent::__construct();
    }
    
    function index()
    {
	if(isset($_POST['auth'])){
	    $this->setsession();
	}else{
	    redirect('appCtr/login');
	}
    }
    function setsession(){
	$this->session->set_userdata('vendor','userName');
	redirect('vendorCtr/dashboard');
    }
    function dashboard()
    {
	$session=$this->session->userdata('vendor');
	if(!$session){
	   redirect('appCtr/login'); 
	}
	$this->load->view('header');	
	$this->load->view('printTemplate');
    }
    function logout(){
	$this->session->sess_destroy();
	redirect('appCtr/login');
    }
    
}
