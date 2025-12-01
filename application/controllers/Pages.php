<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function about()
    {
        $this->load->view('templates/header');
        $this->load->view('about');
        $this->load->view('templates/footer');
    }
}
