
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
                        foreach ($subtitulodb as $nomeautor) {//precisa de um foreach porque o subtitulo é uma tupla de dados do banco
                            echo $nomeautor->nome;
                        }
                    }
                    ?> </small>
            </h1>
            <?php if (isset($autor)) {
                foreach ($autor as $usr) {
                    ?>
                    <div class="col-md-4">
                        <img class="img-responsive img-circle" src="http://placehold.it/200x200" alt="">
                    </div>
                    <div class="col-md-8 ">
                        <h2>
        <?php echo $usr->nome; ?>
                        </h2>
                        <hr>
                        Email:
                        <p><?php echo $usr->email; ?></p>
                        Historico:
                        <p><?php echo $usr->historico; ?></p>

                        <hr>
                    </div>
                <?php }
            }
            ?>
        </div>
