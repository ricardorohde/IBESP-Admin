<?php
require_once 'class/Db.php';
require_once 'class/Artigos.php';
$tipoform = isset($_GET['tipoform'])?$_GET['tipoform']:"";
$cod_artigos = isset($_GET['cod'])?$_GET['cod']:"";
if ($tipoform == 'edit' && $cod_artigos > 0)
{
    $artigos = new Artigos();
    $artigo = $artigos->getArtigo($cod_artigos);
    foreach ($artigo as $editar)
    {
        if ($editar['status'] == 1) {
            $status = "checked";
        } else {
            $status = "";
        }
        $autor = $editar['autor'];
        $titulo = $editar['titulo'];
        $cod_tipo_artigo = $editar['cod_tipo_artigos'];
        $data = date("Y-m-d", strtotime($editar['data']));
        $conteudo = $editar['conteudo'];
        $submit = "Editar";
    }
} elseif ($tipoform == 'cad')
{
    // Cadastro de Artigo
    $status ="checked";
    $autor = "";
    $titulo = "";
    $cod_tipo_artigo = "";
    $data = date('Y-m-d');
    $conteudo = "";
    $submit = "Cadastrar";
} else
{
    echo '<h2 style="text-align: center; color: red" > NÃO FOI PASSADO O PARÂMETRO CORRETO, RETORNE A LISTA DE ARTIGOS.</h2>';
    exit();
}
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cadastro de Artigos</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
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
                    <!-- <h2>Registration Form <small>Click to validate</small></h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <!-- start form for validation -->
                    <form id="artigo_form" data-parsley-validate action="artigo_form_exec.php" method="post">
                        <input type="hidden" name="tipoform" id="tipoform" value="<?php echo $tipoform;?>"/>
                        <input type="hidden" name="cod_artigos" id="cod_noticias" value="<?php echo $cod_artigos;?>"/>
                        <label>Tipo de Artigo *:</label>
                        <p>
                            &nbsp;&nbsp; Pastoral:
                            <input type="radio" class="flat" name="cod_tipo_artigos" id="pastoral" value="1" checked  /> <br>
                            &nbsp;&nbsp; Artigo:
                            <input type="radio" class="flat" name="cod_tipo_artigos" id="artigo" value="2" <?php if ($cod_tipo_artigo == 2){ echo 'checked';}?> required />
                        </p>
                        <label for="autor">Nome do Autor * :</label>
                        <input type="text" id="autor" class="form-control" name="autor" value="<?php echo $autor; ?>" required />
                        <br/>
                        <label for="titulo">Título do Artigo *:</label>
                        <input type="text" id="titulo" class="form-control" name="titulo" data-parsley-minlength-message="O título deve ter ao menos 5 caracteres" value="<?php echo $titulo; ?>" required> </input>
                        <br/>
                        <label for="datainicio">Data de Publicação</label>
                        <div class="control-group">
                            <div class="controls">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                    <input type="date" style="width: 180px" name="data" id="data" class="form-control" value="<?php echo $data; ?>"/>
                                </div>
                            </div>
                        </div>
                        <p>
                            <label>Ativo: </label>
                            <input type="hidden" name="status" id="stats" value="0" />
                            <input type="checkbox" class="flat" name="status" id="status" value="1" <?php echo $status; ?>/>
                            <br />
                        </p>
                        <textarea class="editor-wrapper ckeditor" name="conteudo" id="conteudo"><?php echo $conteudo; ?></textarea>

                        <br />
                        <!-- TERMINO DA DIV DE EDIÇÃO DO TEXTO -->
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button class="btn btn-primary" type="button">Cancelar</button>
                                <button class="btn btn-primary" type="reset">Limpar</button>
                                <button type="submit" class="btn btn-success"><?php echo $submit; ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>