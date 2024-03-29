<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link do bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- link do css, para fazer alterações no bootstrap -->
    <link rel="stylesheet" href="css/styleVitrine.css">

    <title>Vitrine Sonho Meu</title>
</head>

<body>
    <!-- se quiser deixar fixado pode utilizar o fixed-top -->
    <nav class="navbar navbar-expand-lg fixed-top bg-primary-color" id="navbar">
        <div class="container">
            <a href="#" class="navbar-brand primary-color">
                <img src="images/logo.png" alt="Logo sonho meu">
                <span>Panificadora Sonho Meu</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items"
                aria-expanded="false" aria-label="toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-items">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link primary-color" aria-current="page">Início</a>
                    </li>
                    <li class="nav-item">
                        <a href="local.html" class="nav-link primary-color">Local</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link primary-color">Sobre nós</a>
                    </li>
                    <li class="nav-item">
                        <a href="vitrineCliente.php" class="nav-link active primary-color">Vitrine</a>
                    </li>
                    <li class="nav-item text-center"
                        style="background-color: #3973C2; border-radius: 20px; width: 70px;">
                        <a href="../Adm/login.php" class="nav-link primary-color" style="color: #fff;"><b>ADM</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <!-- TITULO DA PÁGINA -->
        <section class="banner">
            <div class="container-img">
                <img src="images/PANIFICADORA SONHO MEU (4).png" alt="imagem recado">
            </div>
            <div class="mensagem">
                <h1>A PANIFICADORA QUE FAZ PARTE DA SUA VIDA</h1>
                <p>São vendidos produtos de diferentes categorias, como lactícinios, alimentos, bebidas além da
                    tradicional
                    padaria do estabelecimento. Nosso objetivo é ajudar a tornar os momentos mais agradáveis.</p>
                <button class="btn btn-danger"
                    style="width: 50%; margin-top: 60px; border-radius: 40px; font-weight: 600;">Veja abaixo</button>
            </div>
        </section>

        <!-- CAROUSEL -->

        <div class="container-md">

            <div class="container-md">
                <h1 class="text-left primary-color" style="color: black; margin-bottom: -70px; margin-left: 55px;">
                    <b>Bebidas</b>
                </h1>
            </div>


            <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">

                    <div class="carousel-item active" style="border-radius:30%">

                        <div class="cards-wrapper">

                            <?php
                            require '../adm/conexao.php';
                            $query = "SELECT * FROM tb_produto where idCategoria = 4;";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                //atribuir as informação do select ao array container 
                                foreach ($query_run as $produto) {
                                    ?>
                                    <div class="card" style="width: 18rem; border: 3px solid; border-width: 3px; border-style: solid; font-weight: bold;">
                                        <img src="../adm/arquivos/<?= $produto['nm_imagem'] ?>" class="card-img-top" alt=""
                                            style="width: 100%; max-width: 250px; max-height: 200px">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?= $produto['nm_produto'] ?>
                                            </h5>
                                            <p class="card-text">
                                                <?= $produto['descricao'] ?>
                                            </p>
                                            <hr>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item" style="font-size: 25px; cursor: auto; background-color: #E6E6E6; border: 3px solid">R$
                                                    <?= $produto['vl_produto'] ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-md">
                <h1 class="text-left primary-color" style="color: black; margin-bottom: -70px; margin-left: 55px;">
                    <b>Alimentos</b>
                </h1>
            </div>


            <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">

                    <div class="carousel-item active">

                        <div class="cards-wrapper">

                            <?php
                            require '../adm/conexao.php';
                            $query = "SELECT * FROM tb_produto where idCategoria = 2;";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                //atribuir as informação do select ao array container 
                                foreach ($query_run as $produto) {
                                    ?>
                                    <div class="card" style="width: 18rem; border: 3px solid; border-width: 3px; border-style: solid; font-weight: bold;">
                                        <img src="../adm/arquivos/<?= $produto['nm_imagem'] ?>" class="card-img-top" alt=""
                                        style="width: 100%; max-width: 250px; max-height: 200px">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?= $produto['nm_produto'] ?>
                                            </h5>
                                            <p class="card-text">
                                                <?= $produto['descricao'] ?>
                                            </p>
                                            <hr>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item" style="font-size: 25px; cursor: auto; background-color: #E6E6E6; border: 3px solid">R$
                                                    <?= $produto['vl_produto'] ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </main>

    <!-- FOOTER/RODAPÉ -->

    <footer class="container-fluid" id="footer" style="background-color: rgb(70, 70, 70)
  ;">
        <div class="container">
            <div class="row">
                <!-- FOOTER TOP -->
                <div class="col-12" id="footer-top">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <h2 style="margin-left: -12px;">Panificadora Sonho Meu</h2>
                        </div>
                        <div class="col-4" id="social-icons">
                            <i class="bi bi-facebook"></i>
                            <i class="bi bi-instagram"></i>
                            <i class="bi bi-youtube"></i>
                            <i class="bi bi-twitter"></i>
                        </div>
                    </div>
                </div>
                <!-- FOOTER DETAILS -->
                <div class="col-12" id="footer-details">
                    <div class="row">
                        <div class="col-12 col-md-4" id="news-container">
                            <h4>Fique por dentro das novidades</h4>
                            <p style="color: white;">Increva-se para saber em primeira mão</p>
                            <form>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Digite o seu email" />
                                </div>
                                <button class="btn btn-dark" type="submit">Inscrever-se</button>
                            </form>
                        </div>
                        <div class="col-12 col-md-4" id="contact-container">
                            <h4>Formas de contato</h4>
                            <p style="color: white;">(13) 99999999</p>
                            <p style="color: white;">sonhomeu@gmail.com</p>
                        </div>
                        <div class="col-12 col-md-4" id="links-container">
                            <div class="row">
                                <h4>Você pode estar procurando por:</h4>
                                <div class="col-6">
                                    <ul class="list-unstyled">
                                        <li><a href="index.html" style="color: white;">Início</a></li>
                                        <li><a href="local.html" style="color: white;">Local</a></li>
                                        <li><a href="about.html" style="color: white;">Sobre nós</a></li>
                                        <li><a href="vitrineCliente.html" style="color: white;">Vitrine</a></li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul class="list-unstyled">
                                        <li><a href="../Adm/login.php" style="color: white;">ADM</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FOOTER BOOTOM -->
                <div class="col-12" id="footer-bottom">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-3">
                            <p style="color: white;">Panificadora Sonho Meu &copy; 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>





    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>