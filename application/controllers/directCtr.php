<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class directCtr extends CI_Controller {
    
    function directCtr()
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
	$this->session->set_userdata('direct','userName');
	redirect('directCtr/dashboard');
    }
    function dashboard()
    {
	$session=$this->session->userdata('direct');
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
