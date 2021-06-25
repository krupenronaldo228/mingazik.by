<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Squad_stamps_relations_model extends Base_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->table = 'Squad_stamps_relations';
    }

}