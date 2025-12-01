<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function profile()
    {
        $user_id = $this->session->userdata('user_id');

        // Fetch fresh user data from DB
        $user = $this->User_model->get_user_by_email($this->session->userdata('email'));

        $data['user'] = $user;

        // Get favorites
        $this->load->model('Scholarship_model');
        $data['favorites'] = $this->Scholarship_model->get_favorites_by_user($user_id);

        $this->load->view('templates/header');
        $this->load->view('user_profile', $data);
        $this->load->view('templates/footer');
    }

    public function updateProfile()
    {
        $id = $this->session->userdata('user_id');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('degree', 'Degree', 'trim');

        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('user/profile');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'degree' => $this->input->post('degree')
            );

            if ($this->input->post('password')) {
                $data['password'] = $this->input->post('password'); // Should hash
            }

            // Handle File Upload
            if (!empty($_FILES['photo']['name'])) {
                $config['upload_path'] = './uploads/profile_pics/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = 'user_' . $id . '_' . time();
                $config['overwrite'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $upload_data = $this->upload->data();
                    $data['photo'] = $upload_data['file_name'];

                    // Update session photo if needed
                    $this->session->set_userdata('photo', $data['photo']);
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('user/profile');
                    return;
                }
            }

            if ($this->User_model->update_user($id, $data)) {
                $this->session->set_userdata('name', $data['name']);
                $this->session->set_userdata('email', $data['email']);
                if (isset($data['degree'])) {
                    $this->session->set_userdata('degree', $data['degree']);
                }

                $this->session->set_flashdata('success', 'Profile updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update profile.');
            }
            redirect('user/profile');
        }
    }
}
