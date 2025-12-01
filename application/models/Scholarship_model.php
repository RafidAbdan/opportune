<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scholarship_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_scholarships()
    {
        $query = $this->db->get('scholarships');
        return $query->result_array();
    }

    public function get_scholarship_by_id($id)
    {
        $query = $this->db->get_where('scholarships', array('id' => $id));
        return $query->row_array();
    }

    public function search_scholarships($keyword)
    {
        $this->db->like('title', $keyword);
        $this->db->or_like('description', $keyword);
        $this->db->or_like('provider', $keyword);
        $query = $this->db->get('scholarships');
        return $query->result_array();
    }

    // Application Methods
    public function check_application($user_id, $scholarship_id)
    {
        $query = $this->db->get_where('applications', array('user_id' => $user_id, 'scholarship_id' => $scholarship_id));
        return $query->row_array();
    }

    public function add_application($data)
    {
        return $this->db->insert('applications', $data);
    }

    // Favorite Methods
    public function check_favorite($user_id, $scholarship_id)
    {
        $query = $this->db->get_where('favorites', array('user_id' => $user_id, 'scholarship_id' => $scholarship_id));
        return $query->row_array();
    }

    public function add_favorite($data)
    {
        return $this->db->insert('favorites', $data);
    }

    public function remove_favorite($user_id, $scholarship_id)
    {
        return $this->db->delete('favorites', array('user_id' => $user_id, 'scholarship_id' => $scholarship_id));
    }

    public function get_favorites_by_user($user_id)
    {
        $this->db->select('scholarships.*');
        $this->db->from('favorites');
        $this->db->join('scholarships', 'favorites.scholarship_id = scholarships.id');
        $this->db->where('favorites.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Admin CRUD Methods
    public function insert_scholarship($data)
    {
        return $this->db->insert('scholarships', $data);
    }

    public function update_scholarship($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('scholarships', $data);
    }

    public function delete_scholarship($id)
    {
        return $this->db->delete('scholarships', array('id' => $id));
    }
}
