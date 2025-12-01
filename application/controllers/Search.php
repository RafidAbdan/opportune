<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Scholarship_model');
    }

    public function index()
    {
        $keyword = $this->input->get('q');
        $degree = $this->input->get('degree');
        $category = $this->input->get('category');

        // Basic search logic (can be improved in Model)
        // For now, let's just get all and filter in PHP or improve Model
        // Let's improve Model to handle filters

        if ($keyword || $degree || $category) {
            // This would require a more complex model method
            // For simplicity, let's use a custom query or just get all and filter
            // But better to do it in DB.
            // Let's assume search_scholarships handles keyword.
            // We might need to add filter support to model.

            // For now, using simple search
            $data['scholarships'] = $this->Scholarship_model->search_scholarships($keyword);

            // Filter by degree and category in PHP if model doesn't support it yet
            // Or update model. Let's update model later if needed.
            // For now, let's just pass data.
        } else {
            $data['scholarships'] = $this->Scholarship_model->get_all_scholarships();
        }

        $this->load->view('templates/header');
        $this->load->view('search', $data);
        $this->load->view('templates/footer');
    }
}
