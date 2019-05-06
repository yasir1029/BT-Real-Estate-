<?php

class Admin_model extends CI_Model
{
    public function login($username,$password)
    {
        $q=$this->db->where(['username'=>$username,'password'=>$password])->get('tbl_admin');
        
        if($q->num_rows())
        {
            return $q->row()->id;
        }
        else
        {
         return FALSE;
        }
        
        


    }

}

?>
    