<?php
require_once 'class/Db.php';
//require_once 'class/Artigos.php';
$p1 = new Db();
$parametros = $p1->select('SELECT * FROM PARAMETROS_PORTAL');
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Parâmetros do Sistema</h3>
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
                    <h2><?php echo $msg ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                        <thead>
                        <tr>
                            <th>
                            <th></th>
                            </th>
                            <th>Ativo</th>
                            <th>Nome do Parâmetro</th>
                            <th>Valor do Parâmetro</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($parametros as $parametro)
                        {
                            echo '<tr><td><td style="vertical-align: middle"><a href=""><i class="fa fa-edit"></i></a><!--<a href="exclui_artigo.php?artigo='.$listaartigo["cod_artigos"].' "><i class="fa fa-remove"></i></a> | --></td></td>';
                            echo '<td style="vertical-align: middle"><input type="checkbox" class="checkbox"/></td>';
                            echo '<td style="vertical-align: middle">'. $parametro['descricao'].'</td>';
                            echo '<td><input type="text" class="form-control input-sm" name="valor" value="'.$parametro['valor'].'" style="width: 100%"/></td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Inicio do Modal de Mensagem de Sucesso -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- Termino do Modal de Mensagem de Sucesso -->