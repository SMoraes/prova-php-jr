<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Converter_lib
{

    // METODO PARA CONVERÇÃO DE DATAS MYSQL

    public static function dataMysqlParaDataBrasileira($data)
    {
        $tmp = explode("-", $data);
        $data = $tmp[2] . "/" . $tmp[1] . "/" . $tmp[0];
        return $data;
    }

    public static function dataBrasileiraParaDataMysql($data)
    {
        //converte a data para padrão mysql
        $tmp = explode("/", $data);
        $data = $tmp[2] . "-" . $tmp[1] . "-" . $tmp[0];
        return $data;
    }
}
