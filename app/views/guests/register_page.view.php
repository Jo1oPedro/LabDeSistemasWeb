<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'app/views/includes/header.view.php' ?>
    <link rel="stylesheet" href="../../../public/css/register_page.css">
    <title>Document</title>
</head>
<body style="background-color: #f4f7f6;">

<section class="h-100 h-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3" style="background-color: #f4f7f6;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registro</h3>

                        <form class="px-md-2" action="/register" method="post">

                            <?php if(isset($_SESSION['errors']['name']) && !empty($_SESSION['errors']['name'])): ?>
                                <div class="alert alert-warning" role="alert">
                                    <?= $_SESSION["errors"]["name"] ?? "" ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <input type="text" id="name" class="form-control" name="name" required />
                                <label class="form-label" for="name">Nome</label>
                            </div>

                            <?php if(isset($_SESSION['errors']['email']) && !empty($_SESSION['errors']['email'])): ?>
                                <div class="alert alert-warning" role="alert">
                                    <?= $_SESSION["errors"]["email"] ?? "" ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control" required />
                                <label class="form-label" for="email">E-mail</label>
                            </div>
                            
                            <?php if(isset($_SESSION['errors']['password']) && !empty($_SESSION['errors']['password'])): ?>
                                <div class="alert alert-warning" role="alert">
                                    <?= $_SESSION["errors"]["password"] ?? "" ?>
                                </div>
                            <?php endif; ?>
                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" class="form-control" required/>
                                <label class="form-label" for="password">Senha</label>
                            </div>

                            <div class="row">
                                <?php if(isset($_SESSION['errors']['birthdate']) && !empty($_SESSION['errors']['birthdate'])): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?= $_SESSION["errors"]["birthdate"] ?? "" ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline datepicker">
                                        <input type="date" class="form-control" name="birthdate" id="birthdate" />
                                        <label for="birthdate" class="form-label">Data de aniversario</label>
                                    </div>

                                </div>

                                <?php if(isset($_SESSION['errors']['gender']) && !empty($_SESSION['errors']['gender'])): ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?= $_SESSION["errors"]["gender"] ?? "" ?>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-6 mb-4">

                                    <select class="select" id="gender" name="gender">
                                        <option value="1" disabled>Gender</option>
                                        <option value="2">Homem</option>
                                        <option value="3">Mulher</option>
                                        <option value="4">Prefiro não informar<option>
                                    </select>

                                </div>
                            </div>


                            <!--<div class="row mb-4 pb-2 pb-md-0 mb-md-5">
                                <div class="col-md-6">

                                    <div class="form-outline">
                                        <input type="text" id="form3Example1w" class="form-control" />
                                        <label class="form-label" for="form3Example1w">Registration code</label>
                                    </div>

                                </div>
                            </div>-->

                            <button type="submit" class="btn btn-success btn-lg mb-1">Cadastrar</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once "app/views/includes/footer.view.php" ?>

</body>

</html>
