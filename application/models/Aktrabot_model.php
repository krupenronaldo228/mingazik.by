<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aktrabot_model extends Base_Model {

    public function __construct()
    {
        parent::__construct();

        $this->table 		= 'aktrabot';
        $this->folder		= 'aktrabot';
        $this->page			= 'aktrabot';
    }


    # FILTER

    public function filter_admin()
    {
        $search = $this->input->get('search');
        if(!empty($search))
        {
            $this->db
                ->group_start()
                ->like('status', $search)
                ->or_like('add_date', $search)
                ->group_end();
        }

        $visibility = $this->input->get('visibility');
        if(!empty($visibility) && $visibility != 'all')
        {
            switch ($visibility)
            {
                case 'yes':
                    $this->db->where('visibility', 1);
                    break;
                case 'no':
                    $this->db->where('visibility', 0);
                    break;
            }
        }

        return $this;
    }


    # HELPER

    public function post()
    {
        $return = $this->input->post();

        $date = $return['date'] ?? date('d.m.Y');
        $time = $return['time'] ?? date('H:i');
        $return['pub_date'] = date('Y-m-d H:i:s', strtotime($date.' '.$time));

        $return['visibility'] = !empty($return['visibility'])
            ? $return['visibility'] ? 1 : 0
            : 0;

        $return['mod_date'] = date('Y-m-d H:i:s');

        unset($return['date'], $return['time']);

        return $return;
    }
}
