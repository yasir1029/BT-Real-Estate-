<?php

class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('event_model'); 
        $this->load->model('job_model');
        $this->load->model('alumni_model');    
        $user = $this->alumni_model->user_profile();      
          
    }
    public function index()
    {
         $user = $this->alumni_model->user_profile();
        $event_home = $this->event_model->find_home_event();
        $job_home = $this->job_model->find_home_job();
        $this->load->view('index',['events'=>$event_home,'jobs'=>$job_home,'user'=>$user]);
    }
    public function open_aboutus()
    {
         $user = $this->alumni_model->user_profile();
        $this->load->view('header',['user'=>$user]);
        $this->load->view('aboutus_view');
        $this->load->view('footer');

    }
    public function open_home()
    {
      redirect ('home');
    }
    public function open_events()
    {
         $user = $this->alumni_model->user_profile();
        $this->load->helper('date');
        $this->load->library('pagination');
        $config = [
               'base_url'        => base_url('home/open_events'),
               'per_page'        => 5,
               'total_rows'      => $this->event_model->user_pagination_eventspage(),
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
        $event_list = $this->event_model->user_event_list($config['per_page'],$this->uri->segment(3));
        $this->load->view('user_eventspage',['events'=>$event_list,'user'=>$user]);

    }
    public function open_gallery()
    {
         $user = $this->alumni_model->user_profile();
        $this->load->view('header',['user'=>$user]);
        $this->load->view('gallery_view');
        $this->load->view('footer');

    }
    public function open_jobs()
    {
         $user = $this->alumni_model->user_profile();
        $job_list = $this->job_model->user_job_list();
        $this->load->view('user_jobspage',['jobs'=>$job_list,'user'=>$user]);

    }
    public function user_single_event($event_id)
    {
         $user = $this->alumni_model->user_profile();
        $this->load->model('event_model');
        $event_details = $this->event_model->find_single_event($event_id);
        $this->load->view('single_eventpage',['event'=>$event_details,'user'=>$user]);
    }
    
}


?>