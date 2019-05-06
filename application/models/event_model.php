<?php

class event_model extends CI_Model
{

    public function event_list($limit,$offset)
    {
       $user_id = $this->session->userdata('user_id');
       $query = $this->db
                          ->select(['e_name','e_venue','e_date','id','e_image'])
                          ->from('tbl_event')
                          ->where('user_id',$user_id)
                          ->limit($limit,$offset)
                          ->get();

           return $query->result();               

    }
    
    public function admin_event_postedby()
    {
       $user_id = $this->session->userdata('user_id');
       
       $query = $this->db
                          ->select('username')
                          ->from('tbl_admin')
                          ->where('id',$user_id)
                          ->get();

           return $query->row();
                         

    }

    public function event_report()
    {
       $user_id = $this->session->userdata('user_id');
       $query = $this->db
                          ->select(['e_name','e_venue','e_date','id','posted_on','posted_by'])
                          ->from('tbl_event')
                          ->where('user_id',$user_id)
                          ->get();

           return $query->result();               

    }

    public function alumni_event_list($limit,$offset)
    {
       $user_id = $this->session->userdata('alumni_id');
       $query = $this->db
                          ->select(['e_name','e_venue','e_date','id','e_image'])
                          ->from('tbl_event')
                          ->where('alumni_id',$user_id)
                          ->limit($limit,$offset)
                          ->get();

           return $query->result();               

    }
    public function user_event_list($limit,$offset)
    {
       
       $query = $this->db
                          ->select(['e_name','e_venue','e_date','id','e_desc','e_image'])
                          ->from('tbl_event')
                          ->limit($limit,$offset)
                          ->get();

           return $query->result();               

    }
    public function user_pagination_eventspage()
    {
       $query = $this->db
                          ->select(['e_name','e_venue','e_date','id'])
                          ->from('tbl_event')
                          ->get();

           return $query->num_rows();               

    }
    public function find_single_event($event_id)
    {
        $query = $this->db
                           ->from('tbl_event')
                           ->where('id',$event_id)
                           ->get();
            if( $query->num_rows()){
                return $query->row();
            }else{    
            return false ;
            }     
    }
    public function find_home_event()
    {
        $query = $this->db  
                           ->from('tbl_event')
                           ->order_by('id','desc')
                           ->limit(5)
                           ->get();
            
                return $query->result();
             
    }
    public function num_rows()
    {
       $user_id = $this->session->userdata('user_id');
       $query = $this->db
                          ->select(['e_name','e_venue','e_date','id'])
                          ->from('tbl_event')
                          ->where('user_id',$user_id)
                          ->get();

           return $query->num_rows();               

    }
    public function alumni_num_rows()
    {
       $user_id = $this->session->userdata('alumni_id');
       $query = $this->db
                          ->select(['e_name','e_venue','e_date','id'])
                          ->from('tbl_event')
                          ->where('alumni_id',$user_id)
                          ->get();

           return $query->num_rows();               

    }

    public function alumni_event_inc($alumni_id)
    {
      $this->db->set('event_posted', 'event_posted + 1', FALSE);
      $this->db->where('id', $alumni_id);
      $this->db->update('tbl_alumni');
        
    }

    public function alumni_event_dec()
    {
      $alumni_id = $this->session->userdata('alumni_id');    
      $this->db->set('event_posted', 'event_posted - 1', FALSE);
      $this->db->where('id', $alumni_id);
      $this->db->update('tbl_alumni');
        
    }

    public function alumni()
    {
        
    }


    public function event_insert($post)
    {
               
        return $this->db->insert('tbl_event',$post) ;
        
    }
    public function find_event($event_id)
    {
        $q = $this->db->select(['id','e_name','e_venue','e_date','e_desc','e_time','e_image'])->where('id',$event_id)->get('tbl_event');

         return $q->row();
                      
    }

    

    public function event_update($event_id, array $event)
    {
        return $this->db->where('id',$event_id)->update('tbl_event',$event);


    }
    
    public function event_delete($event_id)
    {
        return $this->db->delete('tbl_event',['id'=>$event_id]);
    }
    


}
?>