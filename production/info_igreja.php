<?php
require_once 'class/Db.php';
$get_info_igreja = new Db();
$info_igreja = $get_info_igreja->select('SELECT * FROM INFO_IGREJA');
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Configurações de Informações</h3>
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
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php
            $x=1;
             foreach ($info_igreja as $info_titulo)
             {
                 if ($x == 1)
                 {
                     echo '<div class="col-xs-3">';
                        echo '<ul class="nav nav-tabs tabs-left">';
                            echo '<li class="active"><a href="#'.$info_titulo["cod_info_igreja"].'" data-toggle="tab">'.$info_titulo["titulo"].'</a></li>';
                 } else 
                 {
                     echo '<li><a href="#'.$info_titulo["cod_info_igreja"].'" data-toggle="tab">'.$info_titulo["titulo"].'</a></li>';
                 }
                 $x++;
             }
            ?>
            </ul>
            </div>
        <!-- Exibição do conteúdo -->
        <div class="col-xs-9">
            <!-- Tab panes -->
            <div class="tab-content">
        <?php
        $x=1;
        foreach ($info_igreja as $info_conteudo)
        {
            if ($x == 1)
            {
                echo '<div class="tab-pane active" id="'.$info_conteudo["cod_info_igreja"].'">';
            } else
            {
                echo '<div class="tab-pane" id="'.$info_conteudo["cod_info_igreja"].'">';
            }
                echo '<div><a href="#" data-toggle="modal" data-target="#modal_'.$info_conteudo["cod_info_igreja"].'" <i class="fa fa-edit alignright"></i></a></div>';
                echo '<p class="lead">'.$info_conteudo["titulo"].'</p>';
                echo '<p>'.$info_conteudo["conteudo"].'</p>';
           echo '</div>';
           $x++;
        }

        ?>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
</div>
</div>
</div>

<?php
foreach ($info_igreja as $edit_info_igreja)
{ ?>
    <!-- Inicio Modal -->
    <?php echo '<div id="modal_'.$edit_info_igreja['cod_info_igreja'].'" class="modal fade" role="dialog">'; ?>
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"></button>
                    <?php echo '<h4 class="modal-title">'.$edit_info_igreja["titulo"].'</h4>'; ?>
                </div>
                <div class="modal-body">
                    <?php echo '<form id="form'.$edit_info_igreja["cod_info_igreja"].'" data-parsley-validate action="info_igreja_form_exec.php" method="post">'; ?>
                    <?php// echo '<textarea class="editor-wrapper ckeditor" name="conteudo'.$edit_info_igreja['cod_info_igreja'].'" id="conteudo'.$edit_info_igreja['cod_info_igreja'].'">'.$edit_info_igreja["conteudo"].'</textarea>'; ?>
                    <?php echo '<textarea class="editor-wrapper ckeditor" name="conteudo" id="conteudo'.$edit_info_igreja['cod_info_igreja'].'">'.$edit_info_igreja["conteudo"].'</textarea>'; ?>
                    <?php echo '<input type="hidden" name="cod_info_igreja" id="cod_info_igreja" value="'.$edit_info_igreja["cod_info_igreja"].'"/>'; ?>
                    <button type="submit" class="btn btn-success">Editar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>
<?php } ?>