

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Gerenciar ' . $subtitulo; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'alterar ' . $subtitulo; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            foreach ($categorias as $cat) {
                                echo form_open('admin/Categoria/salvar_alteracoes/' . md5($cat->id)); /* aponta pro outro metodo q faz a interação com o banco */
                                ?>
                                <label id="txt-categoria">Nome categoria:</label>
                                <input type="text" id="txt-categoria" name="nomecategoria" class="form-control" placeholder="Digite o nome da categoria" value="<?php echo $cat->titulo; ?>">
                                <br>
                                <input type="hidden" name="idcategoria" id="idcategoria" value="<?php echo $cat->id; ?>">
                                <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                                <?php
                            }
                            echo form_close();
                            ?>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
