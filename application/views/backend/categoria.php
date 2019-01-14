

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
                            <?php $this->table->set_heading( "Nome", "Editar", "Excluir") ?>
                            
                                <?php if (isset($categorias)) {
                                    foreach ($categorias as $cat) { ?>
                                        <?php $nomecat= $cat->titulo;
                                              $alterarcat= anchor(base_url('admin/categoria'),'<i class="fas fa-edit"></i>Alterar');
                                              $excluircat= anchor(base_url('admin/categoria'),'<i class="fas fa-trash-alt fa-"></i> Excluir');
                                                
                                              $this->table->add_row($nomecat,$alterarcat,$excluircat);
                                              ?>
                            <?php $this->table->set_template(array(
                                'table_open'=> '<table class="table table-striped">'
                            ));
                            echo $this->table->generate();
                                    ?>
                           
    <?php }} ?>
                            
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
