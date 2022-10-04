<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'app/views/includes/header.view.php' ?>
    <link rel="stylesheet" href="../../../public/css/home_page.css">
    <title>Document</title>
</head>
<body>
    
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div id="main-content" class="blog-page">
    <div class="container">
        <?php include 'app/views/includes/navbar.view.php' ?>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    <div class="card single_post">
                        <div class="body">
                            <div class="img-post">
                                <img class="d-block img-fluid" src="../../../public/assets/gifs/elephpant-running-78x48.gif" alt="First slide">
                            </div>
                            <!--<h3><a href="blog-details.html">Coloca seu texto aqui</a></h3>-->
                            <?= $_SESSION["errors"]["error"] ?? ""; ?>
                            <form action="post" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="body">Digite o problema</label>
                                    <textarea class="form-control" name="body" id="body" rows="7"></textarea>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px">
                                    <label for="file">Imagem</label>
                                    <input type="file" class="form-control" name="file" id="file">
                                </div>
                                <input type="hidden" name="user_id" value="<?= ($_SESSION["logado"]["id"]); ?>">
                                <input type="submit" value="Enviar">
                            </form>
                        </div>                        
                    </div>
                    <div class="card">
                            <?php echo($_SESSION["deleted"] ?? ""); unset($_SESSION["deleted"]);  ?>
                            <div class="header">
                                <h2>Posts</h2>
                            </div>
                            <div class="body">
                                <ul class="comment-reply list-unstyled">
                                    <?php foreach($posts as $post) : ?>
                                        <li class="row clearfix">
                                            <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="<?= $post->image_path ;?>" alt="Awesome Image"></div>
                                            <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                                <h5 class="m-b-0"><?= $post->user->name ;?> </h5>
                                                <p> <?= $post->body ;?>  </p>
                                                <ul class="list-inline">
                                                    <li><a href="javascript:void(0);" style="text-decoration: none"><?= date("d/m/Y", strtotime($post->created_at)) ;?></a></li>
                                                    <?php if($_SESSION['logado']['admin']) : ?>
                                                        <li>
                                                            <form method="post" action="/delete/post">
                                                                <input type="hidden" name="post_id" value="<?= $post->id; ?>">
                                                                <button style="border: none; background-color: white;" type="submit">deletar</button>
                                                            </form>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>                                        
                            </div>
                        </div>
                        <!--<div class="card">
                            <div class="header">
                                <h2>Leave a reply <small>Your email address will not be published. Required fields are marked*</small></h2>
                            </div>
                            <div class="body">
                                <div class="comment-form">
                                    <form class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Your Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary">SUBMIT</button>
                                        </div>                                
                                    </form>
                                </div>
                            </div>
                        </div>-->
                </div>
                <div class="col-lg-4 col-md-12 right-box">
                    <div class="card">
                        <div class="body search">
                            <div class="input-group m-b-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search...">                                    
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Propagandas</h2>
                        </div>
                        <div class="body widget popular-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single_post">
                                        <div class="img-post">
                                            <img src="<?= $banner->image_path; ?>" alt="Awesome Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Novos Posts</h2>                        
                        </div>
                        <div class="body widget popular-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php foreach ($posts_mais_recentes as $post) : ?>
                                        <div class="single_post">
                                            <p class="m-b-0"> <?= substr($post->body, 0, 20); ?> </p>
                                            <span>jun <?= $post->created_at->day . ", " . $post->created_at->year; ?></span>
                                            <div class="img-post">
                                                <img src="<?= $post->image_path; ?>" alt="Awesome Image">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include "app/views/includes/footer.view.php" ?>

</body>
</html>

