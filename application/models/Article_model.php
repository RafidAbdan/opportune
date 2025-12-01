<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_articles()
    {
        $query = $this->db->get('articles');
        return $query->result_array();
    }

    public function get_article_by_id($id)
    {
        $query = $this->db->get_where('articles', array('id' => $id));
        return $query->row_array();
    }
}
