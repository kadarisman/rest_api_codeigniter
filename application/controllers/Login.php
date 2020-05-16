<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		if($this->session->userdata('') && $this->session->userdata('logined') == true)
		{
			redirect('home');
		}
		
		if(!$this->input->post())
		{
			$this->load->view('login');
		}
		else
		{
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			$this->db->where('email_user',$username);
			$this->db->where('password_user',$password);
			$cek= $this->db->get('user')->row();
			if(!empty($cek))
			{
				$this->session->set_userdata('logined', true);
				$this->session->set_userdata('nama_user', $cek->nama_user);
				
				redirect("home");
			}
			else 
			{
				redirect("/");
			}
		}
        
    } 
	
	public function logout()
    {
		$this->session->unset_userdata('logined');
		redirect("/");
    } 
}
