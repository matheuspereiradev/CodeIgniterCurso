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
                    <?php echo 'Adicionar nova ' . $subtitulo; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('admin/Categoria/inserir'); /* aponta pro metodo */
                            ?>
                            <label id="txt-categoria">Nome categoria:</label>
                            <input type="text" id="txt-categoria" name="nomecategoria" class="form-control" placeholder="Digite o nome da categoria">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
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
                    <?php echo 'Editar ' . $subtitulo . ' existente'; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $this->table->set_heading("Nome", "Editar", "Excluir");
                            $template = array(
                                'table_open' => '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-tabela">'
                            );
                            $this->table->set_template($template);

                            if (isset($categorias)) {
                                foreach ($categorias as $cat) {

                                    $atributoshtml = array(
                                        'onclick' => "return confirm('Deseja realmente excluir a categoria?')",
                                        'class' => 'btn btn-danger btn-block'
                                    );

                                    $nomecat = $cat->titulo;
                                    $alterarcat = anchor(base_url('admin/categoria/alterar/' . md5($cat->id)), '<i class="fas fa-edit"></i> Alterar', array(
                                        'class' => 'btn btn-primary btn-block'
                                    ));
                                    $excluircat = anchor(base_url('admin/categoria/excluir/' . md5($cat->id)), '<i class="fas fa-trash-alt fa-"></i> Excluir', $atributoshtml);

                                    $this->table->add_row($nomecat, $alterarcat, $excluircat);
                                }
                            }echo $this->table->generate(); //atentar para nao deixar o generate dentro do foreach
                            ?>

                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
