<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidato extends CI_Controller
{
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_global');
        $this->data['header'] = $this->load->view('header', $this->data, true);
        $this->data['menu'] = $this->load->view('menu', $this->data, true);
        $this->data['footer'] = $this->load->view('footer', $this->data, true);
    }


    public function index()
    {
        $this->load->view('usuario/index', $this->data);
    }


    // CADASTRAR UM USUÁRIO NO BANCO DE DADOS / 
    public function cadastrar_usuario()
    {

        $this->load->library("form_validation");
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');
        $this->form_validation->set_rules('dataNascimento', 'dataNascimento', 'required');
        $this->form_validation->set_rules('telefone', 'telefone', 'required');
        $this->form_validation->set_rules('cep', 'cep', 'required');
        $this->form_validation->set_rules('endereco', 'endereco', 'required');
        $this->form_validation->set_rules('numero_logradouro', 'numero_logradouro', 'required');
        $this->form_validation->set_rules('logradouro', 'logradouro', 'required');
        $this->form_validation->set_rules('bairro', 'bairro', 'required');
        $this->form_validation->set_rules('estado', 'estado', 'required');
        $this->form_validation->set_rules('cidade', 'cidade', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');


        // VALIDAÇÃO DO CADASTRO DE USUÁRIO
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nome' => $this->input->post('nome'),
                'cpf' => $this->input->post('cpf'),
                'dataNascimento' => $this->converter_lib->dataBrasileiraParaDataMysql($this->input->post('dataNascimento')),
                'telefone' => $this->input->post('telefone'),
                'cep' => $this->input->post('cep'),
                'endereco' => $this->input->post('endereco'),
                'numero_logradouro' => $this->input->post('numero_logradouro'),
                'logradouro' => $this->input->post('logradouro'),
                'bairro' => $this->input->post('bairro'),
                'estado' => $this->input->post('estado'),
                'cidade' => $this->input->post('cidade'),
                'role' => $this->input->post('role'),
            );


            // print_r($data);die;

            if ($this->m_global->insertTableMysql('candidato', $data)) {
                redirect(base_url('candidato/listar_usuario?candidato_cadastrar=true'), 'refresh');
            }
        }

        $this->load->view('usuario/cadastrar_usuario.php', $this->data);
    }

    // Metodo para listar candidado na tela listar usuário. 
    public function listar_usuario()
    {
        $this->data['usuarios'] = $this->m_global->getQueryAll('candidato');
        $this->load->view('usuario/listar_usuario.php', $this->data);
    }

    // METODO PARA EDITAR USUÁRIO NO FORMULARIO MODAL
    public function editar_usuario()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'nome', 'required');

        $arrayData = array(
            'nome' => $this->input->post('nome'),
            'cpf' => $this->input->post('cpf'),
            'dataNascimento' => $this->converter_lib->dataBrasileiraParaDataMysql($this->input->post('dataNascimento')),
            'telefone' => $this->input->post('telefone'),
            'cep' => $this->input->post('cep'),
            'endereco' => $this->input->post('endereco'),
            'numero_logradouro' => $this->input->post('numero_logradouro'),
            'logradouro' => $this->input->post('logradouro'),
            'bairro' => $this->input->post('bairro'),
            'estado' => $this->input->post('estado'),
            'cidade' => $this->input->post('cidade'),
            'role' => $this->input->post('role'),
        );


        $id_candidado =  $this->input->post('id_candidato');
        if ($this->m_global->updateTableMysql('id_candidato', $id_candidado, 'candidato', $arrayData) == TRUE) {

            redirect(base_url('index.php/candidato/listar_usuario?candidato_editar=true'), 'refresh');
        } else {
            redirect(base_url('index.php/candidato/listar_usuario'), 'refresh');
        }
    }

    // FUNCIONANDO
    public function exluir_usuario($id_candidado)
    {
        if ($this->data['usuarios'] = $this->m_global->deleteTableMysql('candidato', 'id_candidato', $id_candidado)) {
            redirect(base_url('candidato/listar_usuario?candidato_deletar=true'), 'refresh');
        } else {
            redirect(base_url('candidato/listar_usuario'), 'refresh');
        }
    }
}
