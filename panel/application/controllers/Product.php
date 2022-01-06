<?php

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = 'product_v';
        $this->load->model('product_model');
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = 'list';
        $viewData->items = $this->product_model->get_all();

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function isActiveSetter($id)
    {
        $status = $this->input->post('status') == 'true' ? 1 : 0;
        $this->product_model->update(['id' => $id], ['isActive' => $status]);
    }
}
