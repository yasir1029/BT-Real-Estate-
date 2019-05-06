<?php

class admin_job extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('job_model');
        if (! $this->session->userdata('user_id'))
           return  redirect('login');

        
         
    }
    public function index()
    {
       $this->load->view('admin_view');
    }
    
    public function job_view()
    {
        $this->load->library('pagination');
        $config = [
               'base_url'        => base_url('admin_job/job_view'),
               'per_page'        => 5,
               'total_rows'      => $this->job_model->num_rows(),
               'full_tag_open'  =>"<ul class='pagination pagination-lg'>",
               'full_tag_close'  =>'</ul>',
               'first_tag_open'  =>"<li class='page-item disabled'>",
               'first_tag_close'  =>'</li>',
               'last_tag_open'  =>"<li class='page-item disabled'>",
               'last_tag_close'  =>'</li>',
               'next_tag_open'  =>"<li class='page-item disabled'>",
               'next_tag_close'  =>'</li>',
               'prev_tag_open'  =>"<li class='page-item disabled'>",
               'prev_tag_close'  =>'</li>',
               'num_tag_open'  =>"<li class='page-item disabled'>",
               'num_tag_close'  =>'</li>',
               'cur_tag_open'  =>"<li class='page-item active'><a>",
               'cur_tag_close'  =>'</a><li>',

        ];
         
        $this->pagination->initialize($config);

        $job_view = $this->job_model->job_list($config['per_page'],$this->uri->segment(3));
        $this->load->view('view_job_view',['job_model'=>$job_view]);
    }
    
    public function job_add()
    {
        $this->load->view('Addjob_view');
    }

    public function job_report()
    {
        $report = $this->job_model->job_report();
        $this->load->view('admin_job_report',['jobs'=>$report]);
    }


    public function job_store()
    {
        $config  = [
            'upload_path' => './images/jobs/',
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
            $posted_by = $this->job_model->admin_job_postedby();
            $post['posted_by'] = $posted_by->username ;

            return $this->flashandRedirect(
                $this->job_model->job_insert($post),
                'job Added Successfully.',
                'job failed to add, Please try again.'
            );
        }
        else{
            $upload_error = $this->upload->display_errors();
            $this->load->view('Addjob_view',['upload_error'=>$upload_error]);
        }
    }
    public function job_edit($job_id)
    {
      $job = $this->job_model->find_job($job_id);
      $this->load->view('job_edit',['job'=>$job]);

    }
    public function job_update($job_id)
    {
        $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");
        if ($this->form_validation->run('add_job_rules'))
        {
            $post = $this->input->post();
            unset($post['submit']);
            return $this->flashandRedirect(
                $this->job_model->job_update($job_id,$post),
                'job Updated Successfully.',
                'job failed to Update, Please try again.'
            );
        }
        else{
            $this->load->view('Addjob_view');
        }
    }
    public function job_delete()
    {
        $job_id = $this->input->post('job_id');

        return $this->flashandRedirect(
            $this->job_model->job_delete($job_id),
            'job Deleted Successfully.',
            'job failed to Delete, Please try again.'
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
        return redirect('admin_job/job_view');
    }   
}   
?>    