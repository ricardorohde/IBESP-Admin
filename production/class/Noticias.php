<?php

class Noticias extends Db
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getNoticia($cod_noticias)
    {
        return $this->select('select * from NOTICIAS where status = 1 and cod_noticias =:id limit 1', ['id' => $cod_noticias]);
    }
    public function getNoticiasAll($cod_noticias = null)
    {
        if ($cod_noticias == null)
        {
            return $this->select('select * from NOTICIAS');
        } else
        {
            return $this->select('select * from NOTICIAS where cod_noticias =:id limit 1', ['id' => $cod_noticias]);
        }
    }
    public function getNoticiasRecentes()
    {
        return $this->select('select * from NOTICIAS where status = 1 and data_inicio <= now() and data_termino >= now()');
        //return $this->select('select * from NOTICIAS ');
    }
    public function getNoticiasDestaques()
    {
        return $this->select('select * from NOTICIAS where status = 1 and destaque = 1 and data_inicio <= now() and data_termino >= now()');
    }
    public function setNoticia($data)
    {
        return $this->insert("NOTICIAS", $data);
    }
    public function alterNoticia($data, $where)
    {
        return $this->update("NOTICIAS", $data, $where);
    }
    public function removeNoticia($where)
    {
        return $this->delete("NOTICIAS", $where);
    }
}