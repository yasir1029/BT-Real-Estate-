<?php

class alumni_model extends CI_Model
{
    public function alumni_insert($post)
    {
        return $this->db->insert('tbl_alumni',$post);
        


    }

    public function alumni_event_postedby()
    {
       $alumni_id = $this->session->userdata('alumni_id');
       
       $query = $this->db
                          ->select('a_name')
                          ->from('tbl_alumni')
                          ->where('id',$alumni_id)
                          ->get();

           return $query->row();
                         

    }
    
   public function alumni_job_postedby()
    {
       $alumni_id = $this->session->userdata('alumni_id');
       
       $query = $this->db
                          ->select('a_name')
                          ->from('tbl_alumni')
                          ->where('id',$alumni_id)
                          ->get();

           return $query->row();
                         

    } 
    
   
    public function alumni_report_event()
    {
        $query = $this->db->select("t1.a_name,t1.id,t1.registered_on,t1.a_passing_year,count(distinct t2.e_name) AS events_posted,count(distinct t3.j_name) AS jobs_posted")
                          ->from('tbl_alumni as t1')
                          ->join('tbl_event as t2', 't2.alumni_id = t1.id', 'left')
                          ->join('tbl_job as t3', 't3.alumni_id = t1.id', 'left')
                          ->group_by('t1.id')
                          ->get();

       return $query->result();
    }
     //  SELECT t1.a_name,COUNT(DISTINCT t2.e_name) AS events_posted, count(DISTINCT t3.j_name) AS jobs_posted FROM tbl_alumni as t1 LEFT JOIN tbl_event as t2 ON t1.id = t2.alumni_id LEFT JOIN tbl_job as t3 ON t1.id = t3.alumni_id GROUP BY t1.id;
    

    


    public function login($email,$password)
    {
        $q=$this->db->where(['a_email'=>$email,'a_password'=>$password])->get('tbl_alumni');
        
        if($q->num_rows())
        {
            return $q->row()->id;
        }
        else
        {
         return FALSE;
        }

    }

    public function alumni_delete($alumni_id)
    {
        return $this->db->delete('tbl_alumni',['id'=>$alumni_id]);
    }

    public function alumni_list()
    {
        $q = $this->db->select(['id','a_email','a_name','a_department_name','a_passing_year','a_approval','a_image','a_student_id'])->order_by('id','desc')->get('tbl_alumni');

        return $q->result();
    }

    public function email_list()
    {
        $q = $this->db->select(['a_email','id'])->order_by('id','desc')->get('tbl_alumni');

        return $q->result();
    }

    public function alumni_approval($email,$password)
    {
        $q = $this->db->where(['a_email'=>$email,'a_password'=>$password,'a_approval'=>'1'])->get('tbl_alumni');
        
        if($q->num_rows())
        {
            return $q->row()->id;
        }
        else
        {
         return FALSE;
        }
    }
    public function alumni_approve($alumni_id)
    {
      $data = array(
	        'a_approval' => '1',
	    );
        $this->db->set($data)
                            ->where('id',$alumni_id)
                            ->update('tbl_alumni');
    }

    public function alumni_singleprofile($alumni_id)
    {
        $q = $this->db->select(['id','a_email','a_name','a_department_name','a_passing_year','a_approval','a_image','a_student_id'])->where('id',$alumni_id)->get('tbl_alumni');

        return $q->result();
    }
    
    
    public function alumni_profile()
    {
        $alumni_id = $this->session->userdata('alumni_id');
        $q = $this->db->select(['id','a_email','a_name','a_department_name','a_passing_year','a_approval','a_image','a_student_id'])->where('id',$alumni_id)->get('tbl_alumni');

        return $q->result();
    }

    public function user_profile()
    {
        $alumni_id = $this->session->userdata('alumni_id');
        $q = $this->db->select(['id','a_email','a_name'])->where('id',$alumni_id)->get('tbl_alumni');

        return $q->row();
    }

    public function alumni_email($alumni_id)
    {
        $q = $this->db->select(['a_email','a_name','id'])->where('id',$alumni_id)->get('tbl_alumni');

        return $q->row();
    }
}    