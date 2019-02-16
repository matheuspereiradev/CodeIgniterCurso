

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
                            echo form_open('admin/Usuarios/salvar_usr_editado'); /* aponta pro outro metodo q faz a interação com o banco */
                            foreach ($usuario as $usr) {
                                ?>
                                <label id="nomeusr">Nome do usuario:</label>
                            <input type="text" id="nomeusr" name="nomeusr" class="form-control"
                                   placeholder="Digite o nome do usuário" value="<?php echo $usr->nome; ?>">
                            <br>
                            
                            <label id="emailusr">Email do usuario:</label>
                            <input type="text" id="emailusr" name="emailusr" class="form-control"
                                   placeholder="Digite o email do usuário" value="<?php echo $usr->email; ?>">
                            <br>
                            <label id="historicousr">Histórico:</label>
                            <textarea id="historicousr" name="historicousr" class="form-control"
                                      placeholder="Digite o histórico do usuário" ><?php echo $usr->historico; ?></textarea>
                            <br>
                            <label id="loginusr">Login do usuario:</label>
                            <input type="text" id="loginusr" name="loginusr" class="form-control"
                                   value="<?php echo $usr->user; ?>" placeholder="Digite o login do usuário">
                            <br>
                            <label id="senhausr">Senha do usuario:</label>
                            <input type="password" id="senhausr" name="senhausr" class="form-control">
                            <br>
                            <label id="senhausr2">Confirmar senha:</label>
                            <input type="password" id="senhausr2" name="senhausr2" class="form-control">
                            <br>
                            <input type="hidden" id="id" name="id" value="<?php echo $usr->id; ?>">
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
