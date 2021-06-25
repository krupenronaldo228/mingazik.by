<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Register
 * @property Request_model model
 * @property Users_site_model users
 */

class Request extends SITE_Controller {

    public $page = 'request';
    private $model = '';

    public function __construct ()
    {
        parent::__construct();

        $this->load->model('request_model');
        $this->model = $this->request_model;
    }

    public function index()
    {
        $this->init('cabinet');

        if($_POST)
        {
            try
            {
                $insert = $this->model->post_insert();
                $id = $this->model->insert($insert);

                set_flash('site', action_result('success', fa5s('check mr5') . ' Заявка успешно отправлена и будет рассмотрена в ближайшее время!'));

                $redirect = $this->input->post('redirect') ?? 'cabinet';
                redirect($redirect);
            }
            catch(Exception $e)
            {
                $this->data['error'] = action_result('error', $e->getMessage());
            }
        }
        $this->add_script('assets/plugins/jquery.inputmask/jquery.inputmask.min.js');

        $this->breadcrumbs->add($this->data['pageinfo']['name'], $this->page);

        $this->output('cabinet');
    }

    public function ajaxFeedback()
    {
        $this->output->set_content_type('application/json');

        $error = 'Ошибка данных POST!';

        if($_POST)
        {
            try
            {
                $this->validate('request');

                $this->load->model('request_model', 'request');
                $insert = $this->input->post(null, true);
               # $insert['is_read'] = 0;

                $insert['id'] = $this->request->insert($insert);

               # $this->load->model('email_model');
              #  $this->email_model->send($insert, 'newFeedback', 'Отзыв - '.$insert['title']);

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
