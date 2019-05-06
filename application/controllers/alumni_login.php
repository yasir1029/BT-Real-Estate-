<?php

class Alumni_login extends CI_Controller
{
  public function __construct()
    {
        parent::__construct();
        $this->load->model('alumni_model');
        $this->load->library('form_validation');
        
    }

  public function index()
  {
    if ( $this->session->userdata('alumni_id'))
           return  redirect('home');
         
    $this->load->view('login_view');
  }
    

  public function register()
    {
        
        $config  = [
            'upload_path' => './images/alumni/',
            'allowed_types' => 'jpg|jpeg|png|gif|svg|JPG|JPEG',
        ];
        $this->load->library('upload',$config);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if ($this->form_validation->run('alumni_register_rules') && $this->upload->do_upload('a_image'))
        {
            $post = $this->input->post();
            unset($post['submit']);
            $data = $this->upload->data();
            $a_image = base_url("images/alumni/".$data['raw_name'].$data['file_ext']);
            $post['a_image'] = $a_image;

                
            if( $this->alumni_model->alumni_insert($post) )
            {
           $this->session->set_flashdata('message','Alumni Registered Successfully , Please wait for Admins Approval , You will be Notified via Email');
           $this->session->set_flashdata('feedback_class','alert-success');
            }
            else
            {
               $this->session->set_flashdata('message','Registration failed, Please try again.');
               $this->session->set_flashdata('feedback_class','alert-danger');
            }
           return redirect('alumni_login'); 
        }
        else{
            $upload_error = $this->upload->display_errors();
            $this->load->view('login_view',['upload_error'=>$upload_error]);
        }
    }

    public function alumnilogin()
    {
       // $this->form_validation->set_rules('username','Username','required|alpha|trim');
        //$this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if( $this->form_validation->run('alumni_login_rules') )
        {
              $email = $this->input->post('email');
              $password = $this->input->post('password');
             
              $login_id = $this->alumni_model->login($email,$password);
              if($login_id)
              {
                $approval = $this->alumni_model->alumni_approval($email,$password);
                if($approval)
                {  
                 $this->session->set_userdata('alumni_id',$login_id);
                 return redirect ('home');

                }
                else {
                $this->session->set_flashdata('failed','Sorry, Your ID is not Approved Yet, Wait for Admins Approval');
                $this->load->view('login_view');
                }
               } 
               else
               {
                $this->session->set_flashdata('failed','Invalid Username or password.');
                $this->load->view('login_view');
               }
           
            
        }
        else
        {
            $this->load->view('login_view');
        }
    }
    public function alumni_logout()
    {
        $this->session->unset_userdata('alumni_id');
        return redirect('alumni_login');
    }


}
?>    