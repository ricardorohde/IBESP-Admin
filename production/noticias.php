<?php
require_once 'class/Db.php';
require_once 'class/Noticias.php';
$noticias = new Noticias();
$listanoticias = $noticias->getNoticiasAll();
$action = isset($_GET['action'])?$_GET['action']:0;
$sucesso = isset($_GET['ok'])?$_GET['ok']:0;
if ($action == 0) // Verifica se houve alguma ação do tipo Inclusão, Edição ou Exclusão de notícia, se não houver não fazer nada
{
    $msg = null;
} elseif ($action == 1 && $sucesso == 1) // 1 = Inclusão
{
    $msg = "<code>Noticia Adicionada com Sucesso</code>";
} elseif ($action == 2 && $sucesso == 1) // 2 = Edição
{
    $msg = "<code>Noticia Alterada com Sucesso</code>";
} elseif ($action == 3 && $sucesso == 1) // 3 = Exclusão
{
    $msg = "<code>Noticia Excluida com Sucesso</code>";
} else
{
    $msg = "<code>Não foi possivel salvar sua ação</code>";
}
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Lista de Notícias</h3>
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
            <div class="col-md-5 col-sm-5 col-xs-12 form-group">
                <a href="?pag=noticia_form&tipoform=cad"><button type="button" class="btn btn-round btn-primary">Nova Notícia</button></a>
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
                            </th>
                            <th>Título da Notícia</th>
                            <th>Ministério</th>
                            <th>Data Início de Publicação</th>
                            <th>Data Termino de Publicação</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listanoticias as $listanoticia)
                        {
                            if ($listanoticia["destaque"] == 1)
                            {
                                $destaque = " <span class=\"label label-warning\">Destaque</span>";
                            } else
                            {
                                $destaque = "";
                            }
                            if ($listanoticia["data_termino"] < date('Y-m-d H:i'))
                            {
                                $expirado= " <span class=\"label label-danger\">Expirado</span>";
                                $destaque = "";
                            } else
                            {
                                $expirado = "";
                            }
                            if ($listanoticia["status"] == 1)
                            {
                                $status = "ATIVO";
                            } else
                            {
                                $status = "INATIVO";
                            }
                            echo '<tr>';
                            echo '<td><!--<a href="exclui_noticia.php?noticia='.$listanoticia["cod_noticias"].' "><i class="fa fa-remove"></i></a> | --><a href="?pag=noticia_form&tipoform=edit&cod='.$listanoticia["cod_noticias"].' "><i class="fa fa-edit"></i></a></td>';
                            echo '<td>' .$listanoticia["titulo"], $destaque, $expirado . '</td>';
                            echo '<td>' .$listanoticia["cod_ministerios"]. '</td>';
                            echo '<td>'. date('d/m/Y - H:i', strtotime($listanoticia["data_inicio"])). '</td>';
                            echo '<td>'. date('d/m/Y - H:i', strtotime($listanoticia["data_termino"])). '</td>';
                            echo '<td align="center">'.$status. '</td>';
                            echo '</tr>';
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