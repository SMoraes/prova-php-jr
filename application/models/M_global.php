<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_global extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // MÉTODO PARA BUSCAR AS INFORMAÇÕES NA TABELA ROLE
    public function getRolesPermissao($idRole, $where)
    {
        $this->db->select('*');
        $this->db->from($where);

        if ($idRole > 1) {
            $this->db->where_in('id_roles');
        }

        $client = $this->db->get();
        if ($client->num_rows() == 0) {
            return [];
        } else {
            return $client->result();
        }
    }

    // MÉTODO PARA BUSCAR UM CANDIDATO
    public function getQueryAll($table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $client = $this->db->get();
        if ($client->num_rows() == 0) {
            return [];
        } else {
            return $client->result();
        }
    }

    // MÉTODO PARA ALTERAR UM USUÁRIO
    public function updateTableMysql($colunaBancoDadosWhere, $valorWhere, $tabela, $arrayData)
    {
        $this->db->where($colunaBancoDadosWhere, $valorWhere);
        $this->db->update($tabela, $arrayData);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    // MÉTODO PARA DELETAR UM USUÁRIO
    public function deleteTableMysql($table, $whereColum, $whereData)
    {
        $this->db->delete($table, array($whereColum => $whereData));
        return ($this->db->affected_rows() == 1) ? true : false;
    }

    // MÉTODO PARA INSERIR UM USUÁRIO
    public function insertTableMysql($table, $arrayData)
    {
        $this->db->insert($table, $arrayData);
        return ($this->db->affected_rows() == 1) ? true : false;
    }
}
