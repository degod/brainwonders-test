<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SchoolPartners extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('SchoolPartners/Repositories/SchoolPartnerRepository');
        $this->load->library(['form_validation', 'pagination']);
        $this->load->helper(['url', 'form']);
    }

    public function index()
    {
        $search = $this->input->get('search', true);
        $page = $this->input->get('per_page') ?: 0;

        $config = [
            'base_url'            => base_url('partners/index') . '?search=' . urlencode($search),
            'total_rows'          => $this->SchoolPartnerRepository->count_all($search),
            'per_page'            => 2,
            'page_query_string'   => true,
            'reuse_query_string'  => true
        ];
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];


        $this->pagination->initialize($config);

        $data['partners'] = $this->SchoolPartnerRepository->get_all($config['per_page'], $page, $search);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('list', $data);
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->_setValidationRules();

            if ($this->form_validation->run()) {
                $this->SchoolPartnerRepository->insert($this->input->post());
                redirect('partners');
            }
        }

        $this->load->view('form');
    }

    public function edit($id)
    {
        $data['partner'] = $this->SchoolPartnerRepository->find($id);

        if (!$data['partner']) {
            show_404();
        }

        if ($this->input->method() === 'post') {
            $this->_setValidationRules();

            if ($this->form_validation->run()) {
                $this->SchoolPartnerRepository->update($id, $this->input->post());
                redirect('partners');
            }
        }

        $this->load->view('form', $data);
    }

    public function delete($id)
    {
        $this->SchoolPartnerRepository->delete($id);
        redirect('partners');
    }

    private function _setValidationRules()
    {
        $this->form_validation->set_rules('school_name', 'School Name', 'required|trim');
        $this->form_validation->set_rules('contact_person', 'Contact Person', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('num_students', 'Number of Students', 'required|integer');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[active,inactive]');
    }
}
