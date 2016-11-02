<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class appMod extends CI_Model {
    
    function fetchUsers($id)
    {
        $sql="SELECT id, name, status FROM users WHERE id<>'$id'";
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
    function insertMessage($conv_id,$created_by,$msg,$seen_by){
        $data=array(
            'conv_id' => $conv_id, 
            'created_by' => $created_by,
            'msg' => $msg,
            'seen_by' => $seen_by
            );
        print_r($data);
        $this->db->insert('conversations', $data);
    } 
    function insertConv($convn_btwn,$created_by){
        $data=array('convn_btwn' => $convn_btwn, 'new_msg' => 'Y');
        $this->db->insert('newconversation', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
    function fetchConversation($id,$convId){
        $sql="SELECT * FROM conversations WHERE conv_id='$convId'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
        // print_r($result);
    } 
    function fetchUser($id)
    {
        $sql="SELECT name, status FROM users WHERE id='$id'";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    function fetchConsOfCurrentUser(){
        $user_id=$this->session->userdata('userid');
        $sql="SELECT * FROM newconversation INNER JOIN conversations ON newconversation.id = conversations.conv_id AND  newconversation.convn_btwn like '%-$user_id-%' AND conversations.seen_by NOT like '%-$user_id-%'";
        // AND newconversation.status!='D'
        return $this->db->query($sql, $return_object = TRUE)->result_array();        
    }
    function updateConvFlag($conv_id,$flag){        
        $sql="UPDATE newconversation SET status='$flag' WHERE id='$conv_id'";
        $this->db->query($sql);
        $sql="UPDATE conversations SET status='$flag' WHERE conv_id='$conv_id'";
        $this->db->query($sql);
    }
    function updateSeenBy($id,$seen_by){
        $sql="UPDATE conversations SET seen_by='$seen_by' WHERE id='$id'";
        return $result = $this->db->query($sql);

    }
}