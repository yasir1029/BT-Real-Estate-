<?php

class job_model extends CI_Model
{

    public function job_list($limit,$offset)
    {
       $user_id = $this->session->userdata('user_id');
       $query = $this->db
                          ->select(['j_name','j_status','j_date_posted','id','j_image'])
                          ->from('tbl_job')
                          ->where('user_id',$user_id)
                          ->limit($limit,$offset)
                          ->get();

           return $query->result();               

    }

    public function admin_job_postedby()
    {
       $user_id = $this->session->userdata('user_id');
       
       $query = $this->db
                          ->select('username')
                          ->from('tbl_admin')
                          ->where('id',$user_id)
                          ->get();

           return $query->row();
                         

    }

    public function job_report()
    {
       $user_id = $this->session->userdata('user_id');
       $query = $this->db
                          ->select(['j_name','j_status','j_date_posted','posted_by'])
                          ->from('tbl_job')
                          ->where('user_id',$user_id)
                          ->get();

           return $query->result();               

    }

    public function user_job_list()
    {
       
       $query = $this->db
                          ->select(['j_name','j_status','j_date_posted','id','j_desc','j_image'])
                          ->from('tbl_job')
                          ->get();

           return $query->result();               

    }
    public function user_pagination_jobspage()
    {
       $query = $this->db
                          ->select(['j_name','j_status','j_date_posted','id','j_image'])
                          ->from('tbl_job')
                          ->get();

           return $query->num_rows();               

    }
    public function find_single_job($job_id)
    {
        $query = $this->db
                           ->from('tbl_job')
                           ->where('id',$job_id)
                           ->get();
            if( $query->num_rows()){
                return $query->row();
            }else{    
            return false ;
            }     
    }
    public function find_home_job()
    {
        $query = $this->db  
                           ->from('tbl_job')
                           ->order_by('id','desc')
                           ->limit(6)
                           ->get();
            
                return $query->result();
             
    }
    public function num_rows()
    {
       $user_id = $this->session->userdata('user_id');
       $query = $this->db
                          ->select(['j_name','j_status','j_date_posted','id','j_image'])
                          ->from('tbl_job')
                          ->where('user_id',$user_id)
                          ->get();

           return $query->num_rows();               

    }

    public function alumni_job_inc($alumni_id)
    {
      $this->db->set('jobs_posted', 'jobs_posted + 1', FALSE);
      $this->db->where('id', $alumni_id);
      $this->db->update('tbl_alumni');
        
    }

    public function alumni_job_dec()
    {
      $alumni_id = $this->session->userdata('alumni_id');  
      $this->db->set('jobs_posted', 'jobs_posted - 1', FALSE);
      $this->db->where('id', $alumni_id);
      $this->db->update('tbl_alumni');
        
    }


    public function job_insert($post)
    {
        return $this->db->insert('tbl_job',$post);
        


    }
    public function find_job($job_id)
    {
        $q = $this->db->select(['id','j_name','j_status','j_date_posted','j_desc','j_image'])->where('id',$job_id)->get('tbl_job');

         return $q->row();
                      
    }
    public function job_update($job_id, array $job)
    {
        return $this->db->where('id',$job_id)->update('tbl_job',$job);


    }public function job_delete($job_id)
    {
        return $this->db->delete('tbl_job',['id'=>$job_id]);
    }

    public function alumni_num_rows()
    {
       $user_id = $this->session->userdata('alumni_id');
       $query = $this->db
                          ->select(['j_name','j_status','j_date_posted','id'])
                          ->from('tbl_job')
                          ->where('alumni_id',$user_id)
                          ->get();

           return $query->num_rows();               

    }


    public function alumni_job_list($limit,$offset)
    {
       $user_id = $this->session->userdata('alumni_id');
       $query = $this->db
                          ->select(['j_name','j_status','j_date_posted','id','j_image'])
                          ->from('tbl_job')
                          ->where('alumni_id',$user_id)
                          ->limit($limit,$offset)
                          ->get();

           return $query->result();               

    }


}
?>