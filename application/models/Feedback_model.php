<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends Base_Model {

	public function __construct()
	{
		parent::__construct();
		
		$this->table 		= 'feedback';
	}
}