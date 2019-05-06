<?php

class Admin_panel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('event_model');
        if (! $this->session->userdata('user_id'))
           return  redirect('login');

        
         
    }
    public function index()
    {
       
       $this->load->view('admin_view');
    }
    
    public function event_report()
    {
      $report = $this->event_model->event_report();
      $this->load->view('admin_event_report',['events'=>$report]);
    }


    public function event_view()
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
        $this->load->view('view_event_view',['event_model'=>$event_view]);
    }
    
    public function event_add()
    {
        $this->load->view('Addevent_view');
    }

    public function event_store()
    {
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
            $posted_by = $this->event_model->admin_event_postedby();
            $post['posted_by'] = $posted_by->username ;
           

            
            return $this->flashandRedirect(
                $this->event_model->event_insert($post),
                'Event Added Successfully.',
                'Event failed to add, Please try again.'
            );
        }
        else{
            $upload_error = $this->upload->display_errors();
            $this->load->view('Addevent_view',['upload_error'=>$upload_error]);
        }
    }
    public function event_edit($event_id)
    {
      $event = $this->event_model->find_event($event_id);
      $this->load->view('event_edit',['event'=>$event]);

    }
    public function event_update($event_id)
    {
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
            $this->load->view('Addevent_view');
        }
    }
    public function event_delete()
    {
        $event_id = $this->input->post('event_id');

        return $this->flashandRedirect(
            $this->event_model->event_delete($event_id),
            'Event Deleted Successfully.',
            'Event failed to Delete, Please try again.'
        );  
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
        return redirect('admin_panel/event_view');
    }   
}   
?>    