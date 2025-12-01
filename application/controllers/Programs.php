<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Scholarship_model');
    }

    public function index()
    {
        $data['scholarships'] = $this->Scholarship_model->get_all_scholarships();
        $this->load->view('templates/header');
        $this->load->view('programs', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['scholarship'] = $this->Scholarship_model->get_scholarship_by_id($id);
        if (empty($data['scholarship'])) {
            show_404();
        }

        // Check if user is logged in
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $data['has_applied'] = $this->Scholarship_model->check_application($user_id, $id);
            $data['is_favorite'] = $this->Scholarship_model->check_favorite($user_id, $id);
        } else {
            $data['has_applied'] = false;
            $data['is_favorite'] = false;
        }

        $this->load->view('templates/header');
        $this->load->view('scholarship_detail', $data);
        $this->load->view('templates/footer');
    }

    public function apply($id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');

        if ($this->Scholarship_model->check_application($user_id, $id)) {
            $this->session->set_flashdata('error', 'Anda sudah mendaftar beasiswa ini.');
        } else {
            $data = array(
                'user_id' => $user_id,
                'scholarship_id' => $id,
                'status' => 'pending'
            );
            if ($this->Scholarship_model->add_application($data)) {
                $this->session->set_flashdata('success', 'Berhasil mendaftar beasiswa!');
            } else {
                $error = $this->db->error();
                $this->session->set_flashdata('error', 'Gagal mendaftar: ' . $error['message']);
                log_message('error', 'Application failed: ' . print_r($error, true));
            }
        }
        redirect('programs/' . $id);
    }

    public function toggle_favorite($id)
    {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        $user_id = $this->session->userdata('user_id');

        if ($this->Scholarship_model->check_favorite($user_id, $id)) {
            $this->Scholarship_model->remove_favorite($user_id, $id);
            $this->session->set_flashdata('success', 'Dihapus dari favorit.');
        } else {
            $data = array(
                'user_id' => $user_id,
                'scholarship_id' => $id
            );
            $this->Scholarship_model->add_favorite($data);
            $this->session->set_flashdata('success', 'Ditambahkan ke favorit!');
        }
        redirect('programs/' . $id);
    }
}
