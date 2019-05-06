<?php

class Alumni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('alumni_model');
        $this->load->model('event_model');  
        $this->load->model('job_model');  
        $this->load->library('form_validation');
        if (!$this->session->userdata('alumni_id'))
          $this->load->view('login_view');
    }
    public function index()
    { 
      
    }
    

    

    public function view_profile()
    {
      $user = $this->alumni_model->user_profile();        
      $data = $this->alumni_model->alumni_profile();
      $this->load->view('alumni_profile',['data'=>$data,'user'=>$user]);
    }

    public function view_event()
    {
        $user = $this->alumni_model->user_profile();      
        $this->load->library('pagination');
        $config = [
              'base_url'        => base_url('admin_panel/event_view'),
               'per_page'        => 5,
               'total_rows'      => $this->event_model->alumni_num_rows(),
               'full_tag_open'  =>"<ul class='pagination'>",
               'full_tag_close'  =>'</ul>',
               'first_tag_open'  =>'<li>',
               'first_tag_close'  =>'</li>',
               'last_tag_open'  =>'<li>',
               'last_tag_close'  =>'</li>',
               'next_tag_open'  =>'<li>',
               'next_tag_close'  =>'</li>',
               'prev_tag_open'  =>'<li>',
               'prev_tag_close'  =>'</li>',
               'num_tag_open'  =>'<li>',
               'num_tag_close'  =>'</li>',
               'cur_tag_open'  =>"<li class='active'><a>",
               'cur_tag_close'  =>'</a><li>',


        ];
         
        $this->pagination->initialize($config);
        $all_events = $this->event_model->user_pagination_eventspage();
        $event_view = $this->event_model->alumni_event_list($config['per_page'],$this->uri->segment(3));
        $this->load->view('alumni_viewevent',['event_model'=>$event_view,'all_events'=>$all_events,'user'=>$user]);
    }
    public function add_event()
    {
    $user = $this->alumni_model->user_profile();         
     $this->load->view('alumni_addevent',['user'=>$user]);
    }
    public function edit_event($event_id)
    {
        $user = $this->alumni_model->user_profile();      
        $event = $this->event_model->find_event($event_id);
        $this->load->view('alumni_editevent',['event'=>$event,'user'=>$user]);
    }
    
    public function update_event($event_id)
    {
        $user = $this->alumni_model->user_profile();      
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if ($this->form_validation->run('add_event_rules'))
        {
            $post = $this->input->post();
            unset($post['submit']);
            return $this->flashandRedirect(
                $this->event_model->event_update($event_id,$post),
                'Event Updated Successfully.',
                'Event failed to Update, Please try again.'
            );
        }
        else{
            $this->load->view('alumni_editevent',['user'=>$user]);
        }
    }

    public function store_event()
    {
        $user = $this->alumni_model->user_profile();
        $config  = [
                    'upload_path' => './images/events',
                    'allowed_types' => 'jpg|jpeg|png|gif|svg',
        ];
        $this->load->library('upload',$config);
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if ($this->form_validation->run('add_event_rules') && $this->upload->do_upload('e_image'))
        {
            $post = $this->input->post();
            unset($post['submit']);
            $data = $this->upload->data();
            $e_image = base_url("images/events/".$data['raw_name'].$data['file_ext']);
            $post['e_image'] = $e_image;
            $posted_by = $this->alumni_model->alumni_event_postedby();
            $post['posted_by'] = $posted_by->a_name ;
            
            return $this->flashandRedirect(
                $this->event_model->event_insert($post),
                'Event Added Successfully.',
                'Event failed to add, Please try again.'
            );
        }
        else{
            $upload_error = $this->upload->display_errors();
            $this->load->view('alumni_addevent',['upload_error'=>$upload_error,'user'=>$user]);
        }
      }
    public function delete_event()
    {
        $event_id = $this->input->post('event_id');
        return $this->flashandRedirect(
            $this->event_model->event_delete($event_id),
            'Event Deleted Successfully.',
            'Event failed to Delete, Please try again.'
        );  
    }

    public function view_jobs()
    {
        $user = $this->alumni_model->user_profile();
        $this->load->library('pagination');
        $config = [
              'base_url'        => base_url('admin_job/job_view'),
               'per_page'        => 5,
               'total_rows'      => $this->job_model->alumni_num_rows(),
               'full_tag_open'  =>"<ul class='pagination'>",
               'full_tag_close'  =>'</ul>',
               'first_tag_open'  =>'<li>',
               'first_tag_close'  =>'</li>',
               'last_tag_open'  =>'<li>',
               'last_tag_close'  =>'</li>',
               'next_tag_open'  =>'<li>',
               'next_tag_close'  =>'</li>',
               'prev_tag_open'  =>'<li>',
               'prev_tag_close'  =>'</li>',
               'num_tag_open'  =>'<li>',
               'num_tag_close'  =>'</li>',
               'cur_tag_open'  =>"<li class='active'><a>",
               'cur_tag_close'  =>'</a><li>',


        ];
         
        $this->pagination->initialize($config);
        $all_jobs = $this->job_model->user_pagination_jobspage();
        $job_view = $this->job_model->alumni_job_list($config['per_page'],$this->uri->segment(3));
        $this->load->view('alumni_viewjob',['job_model'=>$job_view,'all_jobs'=>$all_jobs,'user'=>$user]);
    }

    public function add_job()
    {
     $user = $this->alumni_model->user_profile();   
     $this->load->view('alumni_addjob',['user'=>$user]);
    }

    private function flashandRedirect($condition,$successMsg,$failiureMsg)
    {
        if( $condition )
        {
           $this->session->set_flashdata('feedback',$successMsg);
           $this->session->set_flashdata('feedback_class','alert-success');
        }
        else
        {
            $this->session->set_flashdata('feedback',$failiureMsg);
           $this->session->set_flashdata('feedback_class','alert-danger');
        }
        return redirect('alumni/view_event');
    }

    private function flashandRedirect2($condition,$successMsg,$failiureMsg)
    {
        if( $condition )
        {
           $this->session->set_flashdata('feedback',$successMsg);
           $this->session->set_flashdata('feedback_class','alert-success');
        }
        else
        {
            $this->session->set_flashdata('feedback',$failiureMsg);
           $this->session->set_flashdata('feedback_class','alert-danger');
        }
        return redirect('alumni/view_jobs');
    }

    public function store_job()
    {
        $user = $this->alumni_model->user_profile();
        $config  = [
                    'upload_path' => './images/jobs',
                    'allowed_types' => 'jpg|jpeg|png|gif|svg',
        ];
        $this->load->library('upload',$config);
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if ($this->form_validation->run('add_job_rules') && $this->upload->do_upload('j_image'))
        {
            $post = $this->input->post();
            unset($post['submit']);
            $data = $this->upload->data();
            $j_image = base_url("images/jobs/".$data['raw_name'].$data['file_ext']);
            $post['j_image'] = $j_image;
            $posted_by = $this->alumni_model->alumni_job_postedby();
            $post['posted_by'] = $posted_by->a_name ;
            
            return $this->flashandRedirect2(
                $this->job_model->job_insert($post),
                'Job Added Successfully.',
                'Job failed to add, Please try again.'
            );
        }
        else{
            $upload_error = $this->upload->display_errors();
            $this->load->view('alumni_addjob',['upload_error'=>$upload_error,'user'=>$user]);
        }
      }

    public function edit_job($job_id)
    {
        $user = $this->alumni_model->user_profile();
        $job = $this->job_model->find_job($job_id);
        $this->load->view('alumni_editjob',['job'=>$job,'user'=>$user]);
    }  

    public function update_job($job_id)
    {
        $user = $this->alumni_model->user_profile();
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if ($this->form_validation->run('add_job_rules'))
        {
            $post = $this->input->post();
            unset($post['submit']);
            return $this->flashandRedirect2(
                $this->job_model->job_update($job_id,$post),
                'Job Updated Successfully.',
                'Job failed to Update, Please try again.'
            );
        }
        else{
            $this->load->view('alumni_editjob',['user'=>$user]);
        }
    }

    public function delete_job()
    {
        $job_id = $this->input->post('job_id');
        return $this->flashandRedirect2(
            $this->job_model->job_delete($job_id),
            'job Deleted Successfully.',
            'job failed to Delete, Please try again.'
        );  
    }
    
    public function mail_event($event_id)
    {
        $user = $this->alumni_model->user_profile();
        $event = $this->event_model->find_event($event_id);
        $this->load->view('alumni_mail_event',['event'=>$event,'user'=>$user]);
    }

    public function mail_job($job_id)
    {
        $user = $this->alumni_model->user_profile();
        $job = $this->job_model->find_job($job_id);
        $this->load->view('alumni_mail_job',['job'=>$job,'user'=>$user]);
    }

    public function send()
    {
    $subject =  $this->input->post("e_name");
   
   
    $message = '
       <h3 align="center"></h3><br>'
       .$this->input->post('e_desc').'
       <br><br><br>From Alumni
        
       ';
    
       $config = Array(
             'protocol'  => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
             'smtp_port' => 465,
             'smtp_user' => 'alumniuni115@gmail.com', 
             'smtp_pass' => 'Qwerty102900', 
             'mailtype'  => 'html',
             'charset'  => 'iso-8859-1',
             'wordwrap'  => TRUE
          );
       //$file_path = 'uploads/' . $file_name;
          $this->load->library('email');
          $this->email->initialize($config);
          $this->email->set_newline("\r\n");
          $this->email->from('alumniuni115@gmail.com','UniAlumni System');
          $this->email->to($this->input->post('e_mail'));
          $this->email->subject($subject);
             $this->email->message($message);
             
             if($this->email->send())
             {
              
              
               $this->session->set_flashdata('message', 'Invitation Mail delivered Successfully.');
               return redirect('alumni/view_event');
              
             }
             else
             {
              
              
               $this->session->set_flashdata('message', 'There was an error sending the mail. ');
               return redirect('alumni/view_event');
              
             }
    }

    public function send_job()
    {
    $subject =  $this->input->post("j_name");
   
   
    $message = '
       <h3 align="center"></h3><br>'
       .$this->input->post('j_desc').'
       <br><br><br>From Alumni
        
       ';
    
       $config = Array(
             'protocol'  => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
             'smtp_port' => 465,
             'smtp_user' => 'alumniuni115@gmail.com', 
             'smtp_pass' => 'Qwerty102900', 
             'mailtype'  => 'html',
             'charset'  => 'iso-8859-1',
             'wordwrap'  => TRUE
          );
       //$file_path = 'uploads/' . $file_name;
          $this->load->library('email');
          $this->email->initialize($config);
          $this->email->set_newline("\r\n");
          $this->email->from('alumniuni115@gmail.com','UniAlumni System');
          $this->email->to($this->input->post('j_mail'));
          $this->email->subject($subject);
             $this->email->message($message);
             
             if($this->email->send())
             {
              
              
               $this->session->set_flashdata('message', 'Invitation Mail delivered Successfully.');
               return redirect('alumni/view_jobs');
              
             }
             else
             {
              
              
               $this->session->set_flashdata('message', 'There was an error sending the mail. ');
               return redirect('alumni/view_jobs');
              
             }
    }
}
?>    