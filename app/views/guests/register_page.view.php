<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'app/views/includes/header.view.php' ?>
    <link rel="stylesheet" href="../../../public/css/register_page.css">
    <title>Document</title>
</head>
<body style="background-color: #8fc4b7;">

<section class="h-100 h-custom" style="background-color: #8fc4b7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-8 col-xl-6">
                <div class="card rounded-3">
                    <img src=<?= "https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"; ?>
                         class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                         alt="Sample photo">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registro</h3>

                        <form class="px-md-2" action="/register" method="post">

                            <div class="form-outline mb-4">
                                <input type="text" id="name" class="form-control" name="name" required />
                                <label class="form-label" for="name">Nome</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control" required />
                                <label class="form-label" for="email">E-mail</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" class="form-control" required/>
                                <label class="form-label" for="password">Senha</label>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline datepicker">
                                        <input type="date" class="form-control" name="birthdate" id="birthdate" />
                                        <label for="birthdate" class="form-label">Data de aniversario</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <select class="select" id="gender" name="gender">
                                        <option value="1" disabled>Gender</option>
                                        <option value="2">Homem</option>
                                        <option value="3">Mulher</option>
                                        <option value="4">?????</option>
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

                            <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

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
