<?php
require_once 'class/Db.php';
$res = isset($_POST)?$_POST:0;
//var_dump($res);
//exit();
$edit = new Db();
$edit->update("INFO_IGREJA", $res,'cod_info_igreja = '. $res["cod_info_igreja"] );
header("location:index.php?pag=info_igreja");