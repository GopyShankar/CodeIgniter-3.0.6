<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class appCtr extends CI_Controller {
    
    function appCtr()
    {
	parent::__construct();
    error_reporting(E_ALL); ini_set('display_errors', 1); 
	$this->load->model('appMod');
    }
    
    public function index()
    {
        $user_id=$this->session->userdata('userid');
        if($user_id){
            $result['users']=$this->appMod->fetchUsers($user_id);
            $this->load->view('header');
            $this->load->view('chat',$result);
        }
    }
    function fetchConversation(){
        $id=$this->session->userdata('userid');
        $user_id=$_POST['userId'];
        $convId=$_POST['convId'];
        $userDetails=$this->appMod->fetchUser($user_id);
        $user_name=$userDetails[0]['name'];
        $user_status=$userDetails[0]['status'];
        $result =$this->appMod->fetchConversation($user_id,$convId); ?>
        <div class="chat_window user_<?php echo $user_id;?>">
         <div class="top_menu">
         <div class="user_name"><div class="<?php echo $user_status;?>"></div><?php echo $user_name; ?></div>
         <div class="closeChat"> 
            <div class="btn-group">
               <div class="button closeIt glyphicon glyphicon-remove"></div>
            </div>
          </div>
         </div>
         <div class="message-section">
          <ul class="messages conv_<?php echo $convId;?>">
          <?php foreach ($result as $key => $value) {  ?>
                <li class="message <?php if($value['created_by']==$id){echo "right";}else{echo "left";} ?> appeared">
                    <div class="avatar"></div>
                    <div class="text_wrapper">
                       <div class="text"><?php echo $value['msg'];?></div>
                    </div>
                </li>
            <?php } ?>            
         </ul>
         </div>
         <div class="bottom_wrapper clearfix">
            <div class="message_input_wrapper">
              <div class="input-group">
                <input class="form-control message_input" placeholder="Type here..." type="text">
                <span class="input-group-btn">
                  <button class="btn btn-primary send_message glyphicon glyphicon-send" type="button" onclick="updateConv('<?php echo $convId; ?>',$(this))"></button>
                </span>
              </div>
            </div>
         </div>
      </div>
      <?php

    }
    function user($id,$name){
        $this->session->set_userdata('userid',$id);
        $this->session->set_userdata('userName',$name);
        redirect('appCtr');
    }
    function checkForNewMessage(){
        $result = $this->appMod->fetchConsOfCurrentUser();
        echo json_encode($result);
        exit; 
    }
    function updateConvFlag(){        
        $conv_id=$_POST['conv_id'];
        $flag=$_POST['flag'];
        $this->appMod->updateConvFlag($conv_id,$flag);
    }
    function updateConv(){
        $conv_id=$_POST['convId'];
        $created_by=$this->session->userdata('userid');
        $msg=$_POST['msg'];
        $this->appMod->updateConvFlag($conv_id,'Y');
        $seen_by='-'.$created_by.'-';
        $this->appMod->insertMessage($conv_id,$created_by,$msg,$seen_by);
        $this->appMod->updateConvFlag($conv_id,'Y');
    }
    function insertConv(){
        $user_id=$_POST['user_id'];
        $created_by=$this->session->userdata('userid');
        $msg=$_POST['msg'];
        $arrayName = array($user_id , $created_by);
        sort($arrayName);
        $convn_btwn='-'.implode("-",$arrayName).'-';
        $conv_id=$this->appMod->insertConv($convn_btwn,$created_by);
        $seen_by='-'.$created_by.'-';
        if($conv_id){
            $result=$this->appMod->insertMessage($conv_id,$created_by,$msg,$seen_by);
            $this->appMod->updateConvFlag($conv_id,'Y');
        }
        if($result){
            echo $conv_id;
        }
    }
    function updateSeenBy(){
        $ses_id=$this->session->userdata('userid');
        $id=$_POST['id'];
        $seen_by=$_POST['seen_by'];
        $seen_by=explode('-', $seen_by);
        $seen_by=array_values(array_filter($seen_by));
        if(in_array($ses_id, $seen_by)){
            return true;
        }else{
            $seen_by[]=$ses_id;
        }
        sort($seen_by);
        echo $seen_by='-'.implode("-",$seen_by).'-';
        $this->appMod->updateSeenBy($id,$seen_by);
    }

    
}

?>