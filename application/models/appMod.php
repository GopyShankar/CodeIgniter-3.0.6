<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class appMod extends CI_Model {
    
    public function fetch()
    {
        $sql="select * from oc_user";
        return $this->db->query($sql, $return_object = TRUE)->result_array();
    }
    
}