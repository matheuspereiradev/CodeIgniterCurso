<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo 'Gerenciar ' . $subtitulo; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Criar nova ' . $subtitulo; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/Publicacao/salvarPostEditado'); /* aponta pro outro metodo q faz a interação com o banco */
                            if (isset($noticia)) {
                                foreach ($noticia as $post) {
                                    ?>
                                    <label id="titulo">Titulo do post:</label>
                                    <input type="text" id="titulo" name="titulo" class="form-control"
                                           placeholder="Digite o titulo da publicação" value="<?php echo $post->titulo; ?>">
                                    <br>
                                    <label id="subtitulo">Resumo do post:</label>
                                    <textarea id="subtitulo" name="subtitulo" class="form-control"
                                              placeholder="Digite o resumo do seu post" rows="4"><?php echo $post->resumo; ?></textarea>
                                    <br>
                                    <label id="conteudo">Conteúdo:</label>
                                    <textarea id="conteudo" name="conteudo" class="form-control"
                                              placeholder="Digite aqui o conteudo de sua publicação" rows="10" ><?php echo $post->conteudo; ?></textarea>
                                    <br>
                                    <label id="categoria" >Categoria:</label>
                                    <select id="cat" name ="cat" class="form-control">
                                        <option disabled selected>Selecione a categoria</option>
                                        <?php
                                        if (isset($categorias)) {
                                            foreach ($categorias as $cat) {
                                                ?>
                                                <option value="<?php echo $cat->id; ?>" <?php if ($cat->id == $post->categoria) { ?>selected<?php } ?>><?php echo $cat->titulo; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <br>
                                    <input type="hidden" id="id" name="id" value="<?php echo $post->id; ?>">
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
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo 'Imagem de destaque do ' . $subtitulo; ?>
                        </div>
                        <div class="panel-body">
                            <div class="row" style="padding-bottom: 10px">
                                <div class="col-lg-12 col-lg-offset-3">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php
                                    //formulario com helpers do framework
                                    $divopen = '<div class="form-group">';
                                    $divclose = '</div>';
                                    echo form_open_multipart('admin/Publicacao/novafoto');
                                    echo form_hidden('id', md5($post->id));
                                    echo $divopen;
                                    $imagem = array('name' => 'userfile', 'id' => 'userfile', 'class' => 'form-control');
                                    echo form_upload($imagem);
                                    echo $divclose;
                                    echo $divopen;
                                    $botao = array('nome' => 'bt-adicionar', 'id' => 'bt-addimg', 'class' => 'btn btn-defaut', 'value' => "Adicionar imagem");
                                    echo form_submit($botao);
                                    echo $divclose;
                                }
                            }
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
