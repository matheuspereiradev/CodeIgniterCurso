   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Entrar no sistema</h3>
                    </div>
                    <div class="panel-body">
                        <?php 
                        echo validation_errors('<div class="alert alert-danger">','</div>');
                        echo form_open('admin/Usuarios/fazerlogin');//metodo de login
                        ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuário" name="usuariologin" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="usuariosenha" type="password" value="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Entrar</button>
                            </fieldset>
                        <?php
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>