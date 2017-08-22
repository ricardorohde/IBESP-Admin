<?php
require_once 'class/Db.php';
require_once 'class/Noticias.php';
$res = isset($_GET['noticia'])?$_GET['noticia']:"A exclusão precisa de um parâmetro. Por favor retorne a lista de notícias.";
$exclui = new Noticias();
$exclui->removeNoticia(' COD_NOTICIAS ='. $res);
//echo "Notícia excluida com sucesso.<br/>";
header("location:index.php?pag=noticias&action=3&ok=1");
?>