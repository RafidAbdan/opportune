<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Article_model');
    }

    public function index()
    {
        $data['articles'] = $this->Article_model->get_all_articles();
        $this->load->view('templates/header');
        $this->load->view('articles', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['article'] = $this->Article_model->get_article_by_id($id);
        if (empty($data['article'])) {
            show_404();
        }
        $this->load->view('templates/header');
        $this->load->view('article_detail', $data);
        $this->load->view('templates/footer');
    }
}
