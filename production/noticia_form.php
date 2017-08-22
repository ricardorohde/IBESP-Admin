<?php
require_once 'class/Db.php';
require_once 'class/Noticias.php';
$tipoform = isset($_GET['tipoform'])?$_GET['tipoform']:"";
$cod_noticias = isset($_GET['cod'])?$_GET['cod']:"";
if ($tipoform == 'edit' && $cod_noticias > 0)
{
    $noticias = new Noticias();
    $noticia = $noticias->getNoticiasAll($cod_noticias);
    foreach ($noticia as $editar)
    {
        if ($editar['status'] == 1) {
            $status = "checked";
        } else {
            $status = "";
        }
        if ($editar['destaque'] == 1) {
            $destaque = "checked";
        } else {
            $destaque = "";
        }
        $titulo = $editar['titulo'];
        $data_inicio = $editar['data_inicio'];
        $data_termino = $editar['data_termino'];
        $conteudo = $editar['conteudo'];
        $submit = "Editar";
    }
} elseif ($tipoform == 'cad')
{
    // Cadastro de Notícia
    $status ="checked";
    $destaque = "";
    $titulo = "";
    $data_inicio = date('Y-m-d');
    $data_termino = date('Y-m-d 23:59', strtotime("+30 days",strtotime($data_inicio)));
    $conteudo = "";
    $submit = "Cadastrar";
} else
{
    echo '<h2 style="text-align: center; color: red" > NÃO FOI PASSADO O PARÂMETRO CORRETO, RETORNE A LISTA DE NOTÍCIAS.</h2>';
    exit();
}
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cadastro de Noticias</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar por...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <form id="noticia_form" data-parsley-validate action="noticia_form_exec.php" method="post">
                            <input type="hidden" name="tipoform" id="tipoform" value="<?php echo $tipoform;?>"/>
                            <input type="hidden" name="cod_noticias" id="cod_noticias" value="<?php echo $cod_noticias;?>"/>
                            <label for="titulo">Título da Notícia * :</label>
                            <input type="text" id="titulo" class="form-control" name="titulo" value="<?php echo $titulo; ?>" data-parsley-minlength-message="O título deve ter ao menos 5 caracteres" required </input>
                            <br/>
                            <p>
                                <label>&nbsp;Ativo: </label>
                                <input type="hidden" name="status" id="stats" value="0"/>
                                <input type="checkbox" class="flat" name="status" id="status" value="1" <?php echo $status; ?>/>
                                <br/>
                                <label>&nbsp;Destaque: </label>
                                <input type="hidden" name="destaque" id="destaque" value="0"/>
                                <input type="checkbox" class="flat" name="destaque" id="destaque" value="1" <?php echo $destaque; ?>/>
                                <br/>
                            </p>
                            <label for="datainicio">Data de Inicio da Publicação</label>

                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                        <input type="date" style="width: 180px" name="data_inicio" id="data_inicio" class="form-control" value="<?php echo date("Y-m-d", strtotime($data_inicio)); ?>" required/>
                                        <input type="time" style="width: 180px" name="hora_inicio" id="hora_inicio" class="form-control" value="<?php echo date("H:i", strtotime($data_inicio)); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <label for="datainicio">Data de Termino da Publicação</label>

                            <div class="control-group">
                                <div class="controls">
                                    <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                        <input type="date" style="width: 180px" name="data_termino" id="data_termino" class="form-control" value="<?php echo date("Y-m-d", strtotime($data_termino)); ?>" required/>
                                        <input type="time" style="width: 180px" name="hora_termino" id="hora_termino" class="form-control" value="<?php echo date("H:i", strtotime($data_termino)); ?>"/>
                                    </div>
                                </div>
                            </div>
                            <textarea class="editor-wrapper ckeditor" name="conteudo" id="conteudo"><?php echo $conteudo; ?></textarea>
                            <br/>
                            <!-- TERMINO DA DIV DE EDIÇÃO DO TEXTO -->
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button class="btn btn-primary" type="button">Cancelar</button>
                                    <button class="btn btn-primary" type="reset">Limpar</button>
                                    <button type="submit" class="btn btn-success"><?php echo $submit ?></button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>