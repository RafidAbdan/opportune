<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $this->load->model('Scholarship_model');
        $this->load->model('Article_model');

        $data['scholarships'] = $this->Scholarship_model->get_all_scholarships();
        $data['articles'] = $this->Article_model->get_all_articles();

        // Limit for home page if needed, or just show all/some
        $data['scholarships'] = array_slice($data['scholarships'], 0, 3); // Show top 3
        $data['articles'] = array_slice($data['articles'], 0, 3); // Show top 3

        $this->load->view('templates/header');
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
}
