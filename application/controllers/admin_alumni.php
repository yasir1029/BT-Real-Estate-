<?php 

class Admin_alumni extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('alumni_model');
        if (! $this->session->userdata('user_id'))
           return  redirect('login');

    }

    public function alumni_report()
    {
        
        $report = $this->alumni_model->alumni_report_event();
        $this->load->view('admin_alumni_report',['alumni'=>$report]);
    }



    public function index()
    {
       $this->load->view('admin_view');
    }

    public function alumni_view()
    {
        $alumni_list = $this->alumni_model->alumni_list();
        $this->load->view('admin_alumniview',['alumni_list'=>$alumni_list]);
    }
    
    public function view_alumniprofile()
    {
       $this->load->view('admin_view');
    }

    public function delete_alumni()
    {
       $alumni_id = $this->input->post('alumni_id'); 
       
       if( $this->alumni_model->alumni_delete($alumni_id)  )
        {
           $this->session->set_flashdata('feedback','Alumni deleted Successfully');
           $this->session->set_flashdata('feedback_class','alert-success');
        }
        else
        {
            $this->session->set_flashdata('feedback','Alumni Failed to Delete');
           $this->session->set_flashdata('feedback_class','alert-danger');
        }
        return redirect('admin_alumni/alumni_view');
    }
    public function approve_alumni($alumni_id)
    {
        $data =  $this->alumni_model->alumni_email($alumni_id);
        $subject =  'UniAlumni System - Alumni ID Approval';
   
   
    $message = '
       <h3 align="center"></h3><br>
       Your ID '.$data->a_email.' has Been Approved
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
          $this->email->to($data->a_email);
          $this->email->subject($subject);
            $this->email->message($message);
            $this->email->send();
                
        $this->alumni_model->alumni_approve($alumni_id);    
        $this->session->set_flashdata('Approval','Alumni Registration Approved');
        $this->session->set_flashdata('feedback_class','alert-success');
        return redirect('admin_alumni/alumni_view');
    }
    Public function alumni_profile($alumni_id)
    {
      $data = $this->alumni_model->alumni_singleprofile($alumni_id);
      $this->load->view('admin_alumnisingleprofile',['data'=>$data]);
    }
    
    Public function alumni_delete($alumni_id)
    {
        $data = $this->alumni_model->alumni_delete($alumni_id);
        return redirect('admin_alumni/admin_alumnisingleprofile');
    }

}









?>