<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Reviews
 * @property Reviews_model model
 * @property Email_model email_model
 */

class Reviews extends SITE_Controller {
	
	public	$page = 'reviews';
	private	$model = '';
	
	public function __construct ()
	{
		parent::__construct();
		
		$this->load->model('reviews_model');
		$this->model = $this->reviews_model;
	}
	
	public function index()
	{
		$this->init($this->page);
		
		$params = ['visibility' => 1, 'pub_date <=' => date('Y-m-d H:i:s')];
		
		$count = $this->model->getCount($params);
		$pagination = site_pagination($this->page, $count);
		
		$this->data['items'] = $this->model->getItems($params, 'pub_date DESC', $pagination['per_page'], $pagination['offset']);
		
		$this->load->library('pagination');
		$this->pagination->initialize($pagination);
		
		$this->data['canonical'] = $this->page;
		
		$this->breadcrumbs->add($this->data['pageinfo']['name'], $this->page);
		
		$this->output('pages/reviews');
	}


public function ajaxFeedback()
{
    $this->output->set_content_type('application/json');

    $error = 'Ошибка данных POST!';

    if($_POST)
    {
        try
        {
            $this->validate('reviews');

            $this->load->model('reviews_model', 'reviews');
            $insert = $this->input->post(null, true);
            $insert['is_read'] = 0;

            $insert['id'] = $this->reviews->insert($insert);

            $this->load->model('email_model');
            $this->email_model->send($insert, 'newFeedback', 'Отзыв - '.$insert['title']);

            $error = false;
        }
        catch(Exception $e)
        {

            $error = strip_tags($e->getMessage());
        }
    }

    $this->output->set_output(json_encode(['error'=> $error]));
 }

}