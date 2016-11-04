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
        $user_image=$userDetails[0]['image'];
        $result =$this->appMod->fetchConversation($convId); ?>
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
                <div class="avatar u_avatar<?php echo $value['created_by']; ?>"></div>
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
        $sql="SELECT * FROM users WHERE id='$id'";
        $result=$this->db->query($sql, $return_object = TRUE)->result_array();
        $name=$result[0]['name'];
        $image=$result[0]['image'];
        $this->session->set_userdata('userName',$name);
        $this->session->set_userdata('userimage',$image);
        redirect('appCtr');
    }
    function checkForNewMessage(){
        $result = $this->appMod->fetchConsOfCurrentUser();
        echo json_encode($result);
        exit; 
    }
    function updateConv(){
        $conv_id=$_POST['convId'];
        $created_by=$this->session->userdata('userid');
        $msg=$_POST['msg'];
        $delivered_to='-'.$created_by.'-';
        $this->appMod->insertMessage($conv_id,$created_by,$msg,$delivered_to);
    }
    function insertConv(){
        $user_id=$_POST['user_id'];
        $created_by=$this->session->userdata('userid');
        $msg=$_POST['msg'];
        $arrayName = array($user_id , $created_by);
        sort($arrayName);
        $convn_btwn='-'.implode("-",$arrayName).'-';
        $conv_id=$this->appMod->insertConv($convn_btwn,$created_by,'P');
        $delivered_to='-'.$created_by.'-';
        if($conv_id){
            $result=$this->appMod->insertMessage($conv_id,$created_by,$msg,$delivered_to);
        }
        if($result){
            echo $conv_id;
        }
    }
    function updateDeliverdTo(){
        $ses_id=$this->session->userdata('userid');
        $id=$_POST['id'];
        $delivered_to=$_POST['delivered_to'];
        $delivered_to=explode('-', $delivered_to);
        $delivered_to=array_values(array_filter($delivered_to));
        if(in_array($ses_id, $delivered_to)){
            return true;
        }else{
            $delivered_to[]=$ses_id;
        }
        sort($delivered_to);
        echo $delivered_to='-'.implode("-",$delivered_to).'-';
        $this->appMod->updateDeliverdTo($id,$delivered_to);
    }
    function createGroup(){
        $ses_id=$this->session->userdata('userid');
        $group=$_POST['group'];
        $group[]=$ses_id;
        sort($group);
        $ids='-'.implode("-",$group).'-';
        $conv_id=$this->appMod->insertConv($ids,$ses_id,'G'); ?>
        <div class="chat_window">
         <div class="top_menu">
         <div class="user_name"><div class="online"></div>New group</div>
         <div class="closeChat"> 
            <div class="btn-group">
               <div class="button closeIt glyphicon glyphicon-remove"></div>
            </div>
          </div>
         </div>
         <div class="message-section">
          <ul class="messages conv_<?php echo $conv_id; ?>"></ul>
         </div>
         <div class="bottom_wrapper clearfix">
            <div class="message_input_wrapper">
              <div class="input-group">
                <input class="form-control message_input" placeholder="Type here..." type="text">
                <span class="input-group-btn">
                  <button class="btn btn-primary send_message glyphicon glyphicon-send" type="button" onclick="updateConv('<?php echo $conv_id; ?>',$(this))"></button>
                </span>
              </div>
            </div>
         </div>
      </div>
        <?php

    }
    
}

?>