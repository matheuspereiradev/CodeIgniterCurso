
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            

            <!-- Postagem -->
            <?php if (isset($cont)){ foreach ($cont as $c){ ?>


                <h1>
                    <?php echo $c->titulo; ?>
                </h1>
                <p><i><font color="gray"><?php echo $c->resumo; ?></font></i></p>
                <p class="lead">
                    por <a href="<?php echo base_url('autor/'.$c->user.'/'.limpar($c->nome)) ?>"><?php echo $c->nome; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo postadoem($c->data); ?></p>
                <hr>

                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p><?php echo $c->conteudo; ?></p>

            <?php }} ?>

        </div>
