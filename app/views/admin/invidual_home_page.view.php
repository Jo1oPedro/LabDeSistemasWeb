<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'app/views/includes/header.view.php' ?>
    <link rel="stylesheet" href="../../../public/css/home_page.css">
    <title>Document</title>

    <style>
    @media (max-width: 770px) 
    {   .coluna {
            display: flex;
            flex-direction: column; 
        }
    }
</style>

</head>

<body>

    <div class="container">
        <?php include 'app/views/includes/navbar.view.php' ?>

        <div class="card d-flex" style="margin-top: 4rem; margin-bottom: 2rem;">
            <div class="d-flex justify-content-between" style="margin-left: 2rem; margin-top: 2rem; margin-bottom: 1rem; margin-right:2rem;">
                <h3 class="card-title"><?= $post->user->name; ?></h3>
                <h4> <?= date("d/m/Y", strtotime($post->created_at)); ?></h4>
            </div>
            <div style="margin-left: 2rem; margin-right: 2rem; margin-bottom:2rem;">
                <img style="width: 25rem; margin-bottom: 2rem;" class="card-img-top rounded mx-auto d-block img-thumbnail" src="<?= $post->image_path;?>">
                <p class="card-text" style="margin-left: 1rem"><?= $post->body;?></p>
            </div>
        </div>

        <div class="card d-flex" style="margin-bottom: 2rem;">
            <div class="d-flex justify-content-between" style="margin-left: 2rem; margin-top: 2rem; margin-bottom: 1rem; margin-right:2rem;">
                <h3 class="card-title">Titulo comentario</h3>
                <h4> 00/00/00</h4>
            </div>
            <div style="margin-left: 2rem; margin-right: 2rem; margin-bottom:2rem;">
                <p class="card-text" style="margin-left: 1rem">Some quick example text quick example text quick example text quick example text quick example textto build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>

    </div>

    <?php include "app/views/includes/footer.view.php" ?>

</body>



</html>
