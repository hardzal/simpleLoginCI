<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
	public function getUser($key, $value)
	{
		return $this->db->get_where('users', [$key => $value])->row_array();
	}
}
