<?php

class Artigos extends Db
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getArtigo($cod_artigo = null)
    {
        if ($cod_artigo == null)
        {
            return $this->select('SELECT * FROM ARTIGOS');
        } else
        {
            return $this->select('SELECT * FROM ARTIGOS WHERE cod_artigos =:id', ['id' => $cod_artigo]);
        }
    }

    public function getArtigosRecentes() //Retorna vários artigos com ordem de data. Mais recentes primeiros
    {
        return $this->select('SELECT * FROM ARTIGOS WHERE status = 1 order by data desc');
    }
    public function getArtigosDestaques() //Retorna vários artigos priorizando os de maiores destaques.
    {
        return $this->select('SELECT * FROM ARTIGOS WHERE status = 1 order by visualizacao,data desc limit 5');
    }
    public function setArtigo($data)
    {
        return $this->insert("ARTIGOS", $data);
    }
    public function alterArtigo($data, $where)
    {
        return $this->update("ARTIGOS", $data, $where);
    }
}
?>