<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	/*method for getinng all data*/
	public function getAll()
	{
		$query = $this->db->get('registrants');
		$result = $query->result();
		return $result;
	}
}