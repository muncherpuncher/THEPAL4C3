<?php

class Mdl_download_app extends CI_Model {

function __construct() {
parent::__construct();
}

function get_table() {
$table = 'download_app';
return $table;
}

function get($order_by){
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id,$field_id){
$table = $this->get_table();
$this->db->where($field_id, $id);
$query=$this->db->get($table);
return $query;
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}



function _insert($data){
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->update($table, $data);
}


function _update_password($username, $data){
$table = $this->get_table();
$this->db->where('username', $username);
$this->db->update($table, $data);
}

function _delete($id){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

// fetch per user data

    /*
     * Insert Email Verification
     * @param string $email (required)
     * @param string $verification_code (required)
     * @return boolean
     */
    function insert_email_verification($email = NULL, $verification_code = NULL)
    {
        if(empty($email) || empty($verification_code)) return FALSE;
        
        $data['email'] = $email;
        $data['verification_code'] = $verification_code;                
        $data['date_created'] = date('Y-m-d h:i:s');
        
        $this->db->delete('email_verification', array('email' => $email));
        return $this->db->insert('email_verification', $data);
    }

    /*
     * Get Verification Code
     * @param string $verification_code (required)
     * @param string $email (required)
     * @param string $what (optional)
     * @return array
     */
    function get_activation_code($verification_code = NULL, $email = NULL, $what = '*')
    {
        if(empty($email) || empty($verification_code)) return FALSE;

        $query = $this->db->select($what)
                          ->from('email_verification')
                          ->where('verification_code', $verification_code)
                          ->where('email', $email)
                          ->get();
        return $query->row_array();
    }
    
    /*
     * Delete Email Verification
     * @param string $email (required)
     * @param string $verification_code (required)
     * @return boolean
     */
    function delete_email_verification($email = NULL, $verification_code = NULL)
    {
        $this->db->delete('email_verification', array('email' => $email, 'verification_code' => $verification_code));
    }
}
?>