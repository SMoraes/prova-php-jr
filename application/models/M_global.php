<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_global extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

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

    public function getQuery($table, $whereFlag, $valueFlag)
    {
        $where = array($whereFlag => $valueFlag);
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $client = $this->db->get();
        if ($client->num_rows() == 0) {
            return [];
        } else {
            $result = $client->result();
            return $result[0];
        }
    }

    public function getQueryAllOrderBy($table, $colunOrder, $type = "ASC")
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by("$colunOrder $type");
        $client = $this->db->get();
        if ($client->num_rows() == 0) {
            return [];
        } else {
            return $client->result();
        }
    }
    public function updateTableMysql($colunaBancoDadosWhere, $valorWhere, $tabela, $arrayData)
    {
        $this->db->where($colunaBancoDadosWhere, $valorWhere);
        $this->db->update($tabela, $arrayData);
        return ($this->db->affected_rows() >= 1) ? true : false;
    }

    // METODO PARA DELETAR NO BANCO DE DADOS
    public function deleteTableMysql($table, $whereColum, $whereData)
    {
        $this->db->delete($table, array($whereColum => $whereData));
        return ($this->db->affected_rows() == 1) ? true : false;
    }

    // METODO PARA INSERIR NO BANCO DE DADOS
    public function insertTableMysql($table, $arrayData)
    {
        $this->db->insert($table, $arrayData);
        return ($this->db->affected_rows() == 1) ? true : false;
    }
}
