<?php
require_once 'class/Db.php';
require_once 'class/Noticias.php';
$res = isset($_POST)?$_POST:0;
$update = new Noticias();
if ($res['tipoform'] == 'cad')
{
    unset($res['tipoform']);
    unset($res['cod_noticias']);
    $res['data_inicio'] = $res['data_inicio']. ' ' . $res['hora_inicio'];
    $res['data_termino'] = $res['data_termino']. ' ' . $res['hora_termino'];
    unset($res['hora_inicio']);
    unset($res['hora_termino']);
    $save = $update->setNoticia($res);
    //echo "Notícia salva com sucesso.<br/> A notícia será publicada a partir do dia " . date('d/m/Y', strtotime($res['data_inicio']));
    header("location:index.php?pag=noticias&action=1&ok=1");
} elseif ($res['tipoform'] == 'edit')
{
    unset($res['tipoform']);
    $res['data_inicio'] = $res['data_inicio']. ' ' . $res['hora_inicio'];
    $res['data_termino'] = $res['data_termino']. ' ' . $res['hora_termino'];
    unset($res['hora_inicio']);
    unset($res['hora_termino']);
    $save = $update->alterNoticia($res,' COD_NOTICIAS ='. $res['cod_noticias']);
    //echo "Notícia salva com sucesso.<br/> A notícia será publicada a partir do dia " . date('d/m/Y', strtotime($res['data_inicio']));
    header("location:index.php?pag=noticias&action=2&ok=1");
} else
{
    echo "Não foi informado o tipo de formulário";
    exit();
}
?>