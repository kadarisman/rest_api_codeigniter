<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ApiUser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->library('form_validation');

        // if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true)
        // {
        //     redirect('/');
        // }        
	    $this->load->library('datatables');
    }

    public function index()
    {
        // $data['user']=$this->User_model->get_all();
        // $this->load->view('user/user_list',$data);
        header("Access-Control-Allow-Origin: *");
        $users=$this->User_model->get_all();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($users));
    } 
    
   

    public function find_by_id($id) 
    {
        // $row = $this->User_model->get_by_id($id);
        // if ($row) {
        //     $data = array(
		// 'id_user' => $row->id_user,
		// 'nama_user' => $row->nama_user,
		// 'email_user' => $row->email_user,
		// 'password_user' => $row->password_user,
	    // );
        //     $this->load->view('user/user_read', $data);
        // } else {
        //     $this->session->set_flashdata('message', 'Record Not Found');
        //     redirect(site_url('user'));
        // }
        header("Access-Control-Allow-Origin: *");
        $user = $this->User_model->get_by_id($id);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($user));
    }
    
    public function create_action() 
    {
       
        //     $data = array(
		// 'nama_user' => $this->input->post('nama_user',TRUE),
		// 'email_user' => $this->input->post('email_user',TRUE),
		// 'password_user' => $this->input->post('password_user',TRUE),
	    // );

        //     $this->User_model->insert($data);
        //     $this->session->set_flashdata('message', 'Create Record Success');
        //     redirect(site_url('user'));
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
    
        $formdata = json_decode(file_get_contents('php://input'), true);
    
        if( ! empty($formdata)) {
    
          $nama_user = $formdata['nama_user'];
          $email_user = $formdata['email_user'];
          $password_user = $formdata['password_user'];
          
          $userData = array(
            'nama_user' => $nama_user,
            'password_user' => $password_user,
            'email_user' => $email_user,
          );
    
          $id = $this->User_model->insert($userData);
    
          $response = array(
            'status' => 'success',
            'message' => 'User Berhasil Di tambahkan'
          );
        }
        else {
          $response = array(
            'status' => 'error'
          );
        }
    
        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($response));
    }
    
   
    
    public function update_action() 
    {
       
        //     $data = array(
		// 'nama_user' => $this->input->post('nama_user',TRUE),
		// 'email_user' => $this->input->post('email_user',TRUE),
		// 'password_user' => $this->input->post('password_user',TRUE),
	    // );

        //     $this->User_model->update($this->input->post('id_user', TRUE), $data);
        //     $this->session->set_flashdata('message', 'Update Record Success');
        //     redirect(site_url('user'));

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
    
        $formdata = json_decode(file_get_contents('php://input'), true);
    
        if( ! empty($formdata)) {
            $id_user = $formdata['id_user'];  
            $nama_user = $formdata['nama_user'];
            $email_user = $formdata['email_user'];
            $password_user = $formdata['password_user'];
            
            $userData = array(
              'nama_user' => $nama_user,
              'password_user' => $password_user,
              'email_user' => $email_user,
            );
      
          $this->User_model->update($id_user, $userData);
    
          $response = array(
            'status' => 'success',
            'message' => 'User Berhasil Di Update'
          );
        }
        else {
          $response = array(
            'status' => 'error'
          );
        }
    
        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($response));
        
    }
    
    public function delete($id) 
    {
        header("Access-Control-Allow-Origin: *");


        $product = $this->User_model->delete($id);

        $response = array(
        'message' => 'Product deleted successfully.'
        );

        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
        // $row = $this->User_model->get_by_id($id);

        // if ($row) {
        //     $this->User_model->delete($id);
        //     $this->session->set_flashdata('message', 'Delete Record Success');
        //     redirect(site_url('user'));
        // } else {
        //     $this->session->set_flashdata('message', 'Record Not Found');
        //     redirect(site_url('user'));
        // }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_user', 'nama user', 'trim|required');
	$this->form_validation->set_rules('email_user', 'email user', 'trim|required');
	$this->form_validation->set_rules('password_user', 'password user', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
