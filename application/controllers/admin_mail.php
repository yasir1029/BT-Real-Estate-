<?php

class admin_mail extends CI_Controller

{
  public function __Construct()
  {
    parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('event_model');
        $this->load->model('job_model');
        $this->load->model('alumni_model');
        $this->load->library('email');
        if (! $this->session->userdata('user_id'))
           return  redirect('login');

  }

  public function index()
  {

  }

  public function event_invitation($event_id)
  {
      $event = $this->event_model->find_event($event_id);
      $alumni_email_list = $this->alumni_model->email_list();
      $this->load->view('admin_event_mail',['alumni_email'=>$alumni_email_list,'event'=>$event]);
  }

  public function job_invitation($job_id)
  {
      $job = $this->job_model->find_job($job_id);
      $alumni_email_list = $this->alumni_model->email_list();
      $this->load->view('admin_job_mail',['alumni_email'=>$alumni_email_list,'job'=>$job]);
  }

  public function event_compose()
  {
     $this->load->library('pagination');
        $config = [
               'base_url'        => base_url('admin_panel/event_view'),
               'per_page'        => 5,
               'total_rows'      => $this->event_model->num_rows(),
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

        $event_view = $this->event_model->event_list($config['per_page'],$this->uri->segment(3));
        $this->load->view('admin_compose_event',['event_model'=>$event_view]);
  }

  public function send()
  {
      $subject =  $this->input->post("e_name");
   
   
    $message = '
       <h3 align="center"></h3><br>'
       .$this->input->post('e_desc').'
       <br><br><br>From Admin
        
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
          $this->email->to($this->input->post("public-methods[]"));
          $this->email->subject($subject);
             $this->email->message($message);
             
             if($this->email->send())
             {
              
              
               $this->session->set_flashdata('message', 'Invitation Mail delivered Successfully.');
               return redirect('admin_panel/event_view');
              
             }
             else
             {
              
              
               $this->session->set_flashdata('message', 'There was an error sending the mail. ');
               return redirect('admin_panel/event_view');
              
             }
      

  }

  public function job_send()
  {
      $subject =  $this->input->post("j_name");
   
   
    $message = '
       <h3 align="center"></h3><br>'
       .$this->input->post('j_desc').'
       <br><br><br>From Admin
        
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
          $this->email->to($this->input->post("public-methods[]"));
          $this->email->subject($subject);
             $this->email->message($message);
             
             if($this->email->send())
             {
              
              
               $this->session->set_flashdata('message', 'Job Application Mail delivered Successfully.');
               return redirect('admin_job/job_view');
              
             }
             else
             {
              
              
               $this->session->set_flashdata('message', 'There was an error sending the mail. ');
               return redirect('admin_job/job_view');
              
             }
      

  }

  public function inbox()
  {
      $this->load->view('admin_inbox');
  }

  public function compose()
  {
   $subject =  $this->input->post("subject");
   
   
    $message = '
       <h3 align="center">UniAlumni System</h3>
        <table border="1" width="100%" cellpadding="5">
         <tr>
          <td width="30%">Name</td>
          <td width="70%">'.$this->input->post("email").'</td>
         </tr>
         <tr>
         <td width="30%">Message Body</td>
         <td width="70%">'.$this->input->post("body").'</td>
         </tr>
         <tr>
          <td width="30%">Email Address</td>
          <td width="70%">UniAlumni.com</td>
         </tr>

        </table>
       ';
    
       $config = Array(
             'protocol'  => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
             'smtp_port' => 465,
             'smtp_user' => 'yasir102900@gmail.com', 
             'smtp_pass' => 'Syanma10290000', 
             'mailtype'  => 'html',
             'charset'  => 'iso-8859-1',
             'wordwrap'  => TRUE
          );
       //$file_path = 'uploads/' . $file_name;
          $this->load->library('email');
          $this->email->initialize($config);
          $this->email->set_newline("\r\n");
          $this->email->from('yasir102900@gmail.com');
          $this->email->to($this->input->post("email"));
          $this->email->subject($subject);
             $this->email->message($message);
             
             if($this->email->send())
             {
              
              
               $this->session->set_flashdata('message', 'Application Sended');
               redirect('admin_mail/inbox');
              
             }
             else
             {
              
              
               $this->session->set_flashdata('message', $this->email->print_debugger());
               redirect('admin_mail/inbox');
              
             }
    }
     
    
    
    
     


}




?>