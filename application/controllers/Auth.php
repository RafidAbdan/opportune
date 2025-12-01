<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->session->userdata('user_id')) {
            redirect('home');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->get_user_by_email($email);

            if ($user && $user['password'] == $password) { // Simple password check, should use hash in production
                $session_data = array(
                    'user_id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role' => $user['role']
                );
                $this->session->set_userdata($session_data);

                if ($user['role'] == 'admin' || $user['role'] == 'executive') {
                    redirect('admin');
                } else {
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah.');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function register()
    {
        if ($this->session->userdata('user_id')) {
            redirect('home');
        }
        $this->load->view('templates/header');
        $this->load->view('register');
        $this->load->view('templates/footer');
    }

    public function process_register()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('register');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'id' => uniqid('user_'), // Generate ID manually since it's VARCHAR
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'), // Should hash in production
                'role' => 'user'
            );

            if ($this->User_model->create_user($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat registrasi.');
                redirect('register');
            }
        }
    }
}
