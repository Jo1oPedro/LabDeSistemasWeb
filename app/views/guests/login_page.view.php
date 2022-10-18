<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'app/views/includes/header.view.php' ?>
    <link rel="stylesheet" href="../../../public/css/login_page.css">
    <title>Document</title>
</head>
<body>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="../../../public/assets/gifs/elephpant-running-78x48.gif">
                                    <h4 class="mt-1 mb-5 pb-1">Laboratório de Sistemas Web</h4>
                                </div>

                                <?php if(isset($_SESSION['errors']['loginInvalido']) && !empty($_SESSION['errors']['loginInvalido'])): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?= $_SESSION["errors"]["loginInvalido"] ?? "" ?>
                                    </div>
                                <?php endif; ?>
                                
                                <form action="/login" method="post">
                                    <p>Logue na sua conta</p>

                                    <?= $_SESSION["errors"]["email"] ?? "" ?>
                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="email" class="form-control"
                                               placeholder="E-mail" required />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="password" class="form-control"
                                               required />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">
                                            Login</button>
                                        <a class="text-muted" href="#!">Esqueceu a senha?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Não tem uma conta?</p>
                                        <a type="button" class="btn btn-outline-danger" href="/register" >Crie uma</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2" style="background-color:black;">
                            <img src="../../public/img/SimulationTheoryAlbumCover.png" style="max-width: 100%;max-height: 200%">
                            <!--<div class="text-white px-3 py-4 p-md-5 mx-md-4">
                              <h4 class="mb-4">PHP</h4>
                              <p class="small mb-0">PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP
                              -PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP
                              -PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP-PHP.</p>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "app/views/includes/footer.view.php" ?>

<body>

</html>