<?php
class Default_model extends CI_Model {

	/**
	 */
	var $db_group_name = "default";

	// --------------------------------------------------------------------

	/**
	 * 	Constructor -- Loads parent class
	 */
	function __construct(){
		parent::__construct();
		$this->{$this->db_group_name} = $this->load->database($this->db_group_name, TRUE);
	}

	// --------------------------------------------------------------------

	/**
	 * 	Required method to get the database group for THIS model
	 */
	function get_database_group() {
		return $this->db_group_name;
	}

	// --------------------------------------------------------------------

}