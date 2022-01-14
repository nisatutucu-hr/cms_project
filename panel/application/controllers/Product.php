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
        $viewData->items = $this->product_model->get_all([], 'rank ASC');

        $this->load->view(
            "{$viewData->viewFolder}/{$viewData->subViewFolder}/index",
            $viewData
        );
    }

    public function create()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = 'add';

        $this->load->view(
            "{$viewData->viewFolder}/{$viewData->subViewFolder}/index",
            $viewData
        );
    }

    public function store()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Baslik', 'required|trim');
        $this->form_validation->set_rules(
            'description',
            'Aciklama',
            'required|trim'
        );

        $this->form_validation->set_message([
            'required' => '{field} gir dostum',
        ]);
        $validate = $this->form_validation->run();

        if ($validate) {
            $insert = $this->product_model->add([
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'url' => permaLink($this->input->post('title')),
                'isActive' => 1,
                'rank' => 0,
                'createdAt' => date('Y-m-d h:i:s'),
            ]);

            // TODO natification entegre et
            if ($insert) {
                redirect(base_url('product'));
            } else {
                redirect(base_url('product'));
            }
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = 'add';
            $viewData->form_error = true;

            $this->load->view(
                "{$viewData->viewFolder}/{$viewData->subViewFolder}/index",
                $viewData
            );
        }
    }

    public function edit($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = 'edit';
        $viewData->item = $this->product_model->get([
            'id' => $id,
        ]);
        $this->load->view(
            "{$viewData->viewFolder}/{$viewData->subViewFolder}/index",
            $viewData
        );
    }

    public function update()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Baslik', 'required|trim');
        $this->form_validation->set_rules(
            'description',
            'Aciklama',
            'required|trim'
        );

        $this->form_validation->set_message([
            'required' => '{field} gir dostum',
        ]);
        $validate = $this->form_validation->run();

        if ($validate) {
            $update = $this->product_model->update(
                [
                    'id' => $this->input->post('id'),
                ],
                [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'url' => permaLink($this->input->post('title')),
                ]
            );

            // TODO natification entegre et
            if ($update) {
                redirect(base_url('product'));
            } else {
                redirect(base_url('product'));
            }
        } else {
            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = 'edit';
            $viewData->form_error = true;
            $viewData->item = $this->product_model->get([
                'id' => $this->input->post('id'),
            ]);
            $this->load->view(
                "{$viewData->viewFolder}/{$viewData->subViewFolder}/index",
                $viewData
            );
        }
    }

    public function delete($id)
    {
        $delete = $this->product_model->delete([
            'id' => $id,
        ]);

        // TODO natification entegre et
        if ($delete) {
            redirect(base_url('product'));
        } else {
            redirect(base_url('product'));
        }
    }

    public function isActiveSetter($id)
    {
        $status = $this->input->post('status') == 'true' ? 1 : 0;
        $this->product_model->update(['id' => $id], ['isActive' => $status]);
    }

    public function rankSetter()
    {
        $data = $this->input->post('data');
        parse_str($data, $order);
        $items = $order['order'];

        foreach ($items as $rank => $id) {
            $this->product_model->update(
                [
                    'id' => $id,
                    'rank !=' => $rank,
                ],
                [
                    'rank' => $rank,
                ]
            );
        }
    }
}
