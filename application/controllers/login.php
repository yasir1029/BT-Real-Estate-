<?php

class login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        
        
         
    }
    public function index()
    {
        if ( $this->session->userdata('user_id'))
           return  redirect('admin_panel');
         
          $this->load->view('admin_login');
        
    }
    
    public function admin_login()
    {
        $this->load->library('form_validation');
       // $this->form_validation->set_rules('username','Username','required|alpha|trim');
        //$this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if( $this->form_validation->run('admin_login_rules') )
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('admin_model');
            $login_id = $this->admin_model->login($username,$password);
            if($login_id)
            {
              $this->session->set_userdata('user_id',$login_id);
               $this->load->view('admin_view');

            }
            else
            {
                $this->session->set_flashdata('Login failed','Invalid Username or password.');
                return redirect('login');
            }
            
        }
        else
        {
            $this->load->view('admin_login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        return redirect('login');
    }
   
}
?>    