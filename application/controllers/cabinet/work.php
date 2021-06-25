<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Register
 * @property Request_model model
 * @property Users_admin_model users
 */

class Work extends SITE_Controller
{

    public $page = 'work';
    private $model = '';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('request_model');
        $this->model = $this->request_model;

        $this->init($this->page);
    }

    public function index()
    {
        $this->data['count'] = $count = $this->model->filter_admin()->getCount();
        $pagination = admin_pagination($this->page . '/index', $count);

        $sort = $this->input->get('sort');
        if(empty($sort)) $sort = 'pub_date DESC';
        $this->data['sort'] = $sort;

        $this->data['items'] = $this->model->filter_admin()->getItems(['pub_date =' => date('Y-m-d')], $sort, $pagination['per_page'], $pagination['offset']);

        $this->load->library('pagination', $pagination);
        $this->load->helper('text');

        $this->output($this->page . '/index');
    }

    public function edit()
    {
        $id = uri(4);

        $item = $this->model->getItem('id', $id);
        if (empty($item)) {
            set_flash('result', action_result('error', fa5s('exclamation-triangle mr5') . ' Заявка не найдена!', true));
            redirect('admin/' . $this->page);
        }

        $this->load->library('upload', $this->model->file_config());

        if ($_POST) {
            try {
                $this->validate($this->page);

                $insert = $this->model->post();

                $this->model->update($insert, $id);

                set_flash('result', action_result('success', fa5s('check mr5') . ' Заявка на <strong>"' . $insert['adres'] . '"</strong> успешно обновлена!', true));
                redirect(uri(5) == 'close' ? '/admin/' . $this->page : current_url());
            } catch (Exception $e) {
                if (!empty($file)) $this->model->file_delete($file);
                $this->data['error'] = $e->getMessage();
            }
        }

        $this->data['item'] = $item;

        $this->data['size'] = $this->model->thumb_size();

        $this->add_script([
            PATH_PLUGINS . '/ckeditor/ckeditor.js',
            PATH_PLUGINS . '/bootstrap/plugins/datepicker.js',
            PATH_PLUGINS . '/jquery.inputmask/jquery.inputmask.min.js',
        ]);

        $this->breadcrumbs->add('Редактирование', '');

        $this->output($this->page . '/edit');
    }

    public function view()
    {
        $this->data['item'] = $this->model->getItem('id', uri(4));
        if (empty($this->data['item'])) {
            set_flash('result', action_result('error', fa5s('exclamation-triangle mr5') . ' Заявка не найдена!', true));
            redirect('admin/' . $this->page);
        }

        $this->breadcrumbs->add('Просмотр', '');

        $this->output($this->page . '/view');
    }

}