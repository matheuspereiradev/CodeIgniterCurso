
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                <?php echo $titulo; ?> >
                <small><?php
                    if ($subtitulo != '') {
                        echo $subtitulo;
                    } else {
                        foreach ($subtitulodb as $categoriadb) {//precisa de um foreach porque o subtitulo é uma tupla de dados do banco
                            echo $categoriadb->titulo;
                        }
                    }
                    ?> </small>
            </h1>

            <!-- Postagem -->
            <?php
            if (isset($postagem)) {
                foreach ($postagem as $post) {
                    ?>


                    <h2>
                        <a href="<?php echo base_url('postagem/' . $post->idpost . '/' . limpar($post->titulo)) ?>"><?php echo $post->titulo; ?></a>
                    </h2>
                    <p class="lead">
                        por <a href="<?php echo base_url('autor/' . $post->idautor . '/' . limpar($post->nomeautor)) ?>"><?php echo $post->nomeautor; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo postadoem($post->data); ?></p>
                    <hr>
                    <?php
                    if ($post->img == 1) {
                        $img = "assets/frontend/img/bannerpost/" . md5($post->idpost) . ".jpg";
                    } else {
                        $img = "assets/frontend/img/postsembaner.png";
                    }
                    ?>
                    <img class="img-responsive" src="<?php echo base_url($img); ?>" alt="">
                    <hr>
                    <p><?php echo $post->subtitulo; ?></p>
                    <a class="btn btn-primary" href="<?php echo base_url('postagem/' . $post->idpost . '/' . limpar($post->titulo)) ?>">Leia mais <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                <?php
                }
            }
            ?>

        </div>
