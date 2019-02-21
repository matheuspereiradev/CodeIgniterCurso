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
                    <?php echo 'Criar nova ' . $subtitulo; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/Publicacao/salvarPost'); /* aponta pro outro metodo q faz a interação com o banco */
                            ?>
                            <label id="titulo">Titulo do post:</label>
                            <input type="text" id="titulo" name="titulo" class="form-control"
                                   placeholder="Digite o titulo da publicação" value="<?php echo set_value('titulo'); ?>">
                            <br>
                            <label id="subtitulo">Resumo do post:</label>
                            <textarea id="subtitulo" name="subtitulo" class="form-control"
                                      placeholder="Digite o resumo do seu post" rows="4"><?php echo set_value('subtitulo'); ?></textarea>
                            <br>
                            <label id="conteudo">Conteúdo:</label>
                            <textarea id="conteudo" name="conteudo" class="form-control"
                                      placeholder="Digite aqui o conteudo de sua publicação" rows="10" ><?php echo set_value('conteudo'); ?></textarea>
                            <br>
                            <label id="categoria" >Categoria:</label>
                            <select id="cat" name ="cat" class="form-control">
                                <option disabled selected>Selecione a categoria</option>
                                <?php
                                if (isset($categorias)) {
                                    foreach ($categorias as $cat) {
                                        ?>
                                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->titulo; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                            <?php
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
