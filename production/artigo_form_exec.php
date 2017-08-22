<?php
require_once 'class/Db.php';
require_once 'class/Artigos.php';
$res = isset($_POST)?$_POST:0;
$cod = $res['cod_artigos'];
$tipoform = $res['tipoform'];
unset($res['tipoform']);
unset($res['cod_artigos']);
$insert = new Artigos();
if ($tipoform == 'cad')
{
    $save = $insert->setArtigo($res);
    header("location:index.php?pag=artigos&action=1&ok=1");
} elseif ($tipoform == 'edit')
{
    $save = $insert->alterArtigo($res, 'cod_artigos = '. $cod);
    header("location:index.php?pag=artigos&action=2&ok=1");
} else
{
    echo "Não foi informado o tipo de formulário";
    exit();
}
echo "Artigo salvo com sucesso. ID número:" . ($save);
//<a href="javascript:window.history.go(-1)">Voltar</a> --> Esse comando é usado para voltar pelo histórico do navegador. Usar no caso de alguma falha na validação do formulário.
?>


