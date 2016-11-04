<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class appMod extends CI_Model {
    
    function fetchUsers($id)
    {
        $sql="SELECT * FROM users WHERE id<>'$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function checkConvExists($id){
        $user_id=$this->session->userdata('userid');
        $arrayName = array($user_id , $id);
        // print_r($arrayName);
        sort($arrayName);
        // print_r($arrayName);
        $ids='-'.implode("-",$arrayName).'-';
        $sql="SELECT * FROM newconversation WHERE convn_btwn='$ids'";
        $result = $this->db->query($sql, $return_object = TRUE)->result_array();
        if($result){
            return $result[0]['id'];
        }else{
            return  "newconversation";
        }

    }
    function insertMessage($conv_id,$created_by,$msg,$delivered_to){
        $data=array(
            'conv_id' => $conv_id, 
            'created_by' => $created_by,
            'msg' => $msg,
            'delivered_to' => $delivered_to
            );
        // print_r($data);
        $this->db->insert('conversations', $data);
    } 
    function insertConv($convn_btwn,$created_by,$type){
        $data=array('convn_btwn' => $convn_btwn, 'created_by' => $created_by, 'type'=>$type);
        $this->db->insert('newconversation', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function fetchConversation($convId){
         $sql="SELECT * FROM conversations INNER JOIN users ON conv_id='$convId' AND users.id=conversations.created_by ORDER BY conversations.id ASC";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
        // print_r($result);
    } 
    function fetchUser($id)
    {
        $sql="SELECT * FROM users WHERE id='$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function fetchConsOfCurrentUser(){
        $user_id=$this->session->userdata('userid');
        $sql="SELECT * FROM newconversation INNER JOIN conversations ON newconversation.id = conversations.conv_id AND  newconversation.convn_btwn like '%-$user_id-%' AND conversations.delivered_to NOT like '%-$user_id-%'";
        // AND newconversation.status!='D'
        return $this->db->query($sql, $return_object = TRUE)->result_array();        
    }
    function updateDeliverdTo($id,$delivered_to){
        $sql="UPDATE conversations SET delivered_to='$delivered_to' WHERE id='$id'";
        return $result = $this->db->query($sql);

    }
}