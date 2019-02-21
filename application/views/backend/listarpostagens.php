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
            <a href="<?php echo base_url('adiconarPost'); ?>"> <button type="submit" class="btn btn-primary btn-block btn-lg">Criar postagens</button></a>
            <!-- /.panel-body -->

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo 'Lista de ' . $subtitulo . ' existente'; ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            $this->table->set_heading("Titulo", "Resumo", "Data", "Visualizar/Editar", "Excluir");
                            $template = array(
                                'table_open' => '<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-tabela">'
                            );
                            $this->table->set_template($template);

                            if (isset($publicacoes)) {
                                foreach ($publicacoes as $pub) {

                                    $atributoshtml = array(
                                        'onclick' => "return confirm('Deseja realmente excluir a publicação?')",
                                        'class' => 'btn btn-danger btn-block'
                                    );

                                    $nomepub = $pub->titulo;
                                    $subtitulopub = $pub->subtitulo;
                                    $datapub = $pub->data;

                                    $alterarpub = anchor(base_url('admin/categoria/alterar/' . md5($pub->idpost)), '<i class="fas fa-edit"></i> Alterar', array(
                                        'class' => 'btn btn-primary btn-block'
                                    ));
                                    $excluirpub = anchor(base_url('admin/publicacao/excluir/' . md5($pub->idpost)), '<i class="fas fa-trash-alt fa-"></i> Excluir', $atributoshtml);

                                    $this->table->add_row($nomepub, $subtitulopub, $datapub, $alterarpub, $excluirpub);
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
