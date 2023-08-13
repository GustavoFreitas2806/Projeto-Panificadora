<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- link do css, para fazer alterações no bootstrap -->
    <link rel="stylesheet" href="css/styleInicio.css">
    <title>Panificadora Sonho Meu</title>
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
                        <a href="index.php" class="nav-link primary-color active" aria-current="page">Início</a>
                    </li>
                    <li class="nav-item">
                        <a href="local.html" class="nav-link primary-color">Local</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link primary-color">Sobre nós</a>
                    </li>
                    <li class="nav-item">
                        <a href="vitrineCliente.php" class="nav-link primary-color">Vitrine</a>
                    </li>
                    <li class="nav-item text-center"
                        style="background-color: #3973C2; border-radius: 20px; width: 70px;">
                        <a href="../Adm/login.php" class="nav-link primary-color" id="adm"
                            style="color: #fff;"><b>ADM</b></a>
                    </li>
                    <li class="nav-item">
                        <input type="checkbox" class="checkbox" id="chk" />
                        <label class="label" for="chk">
                            <i class="fas fa-sun"></i>
                            <i class="fas fa-moon"></i>
                            <div class="ball"></div>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </nav>





    <!-- <div style="position: absolute; widht: 100%"> -->

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>


    <?php
    require '../adm/conexao.php';


    $query = "SELECT * FROM tb_fornada ORDER BY dt_fornada DESC LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result); //Obtendo o valor do último resultado pego
    
        $diaHoje = date_default_timezone_set('America/Sao_Paulo'); //Armazendo em uma variável a data ATUAL
    

        //Fazendo uma comaparação, para saber se a última fornada é do dia atual
        if ($row['dt_fornada'] == $diaHoje) {

            function alterarOrdemData($row) //Função utilizada apenas para por a ordem da data correta, na hora de exibi-lá
            {
                foreach ($row as &$elemento) { //Utilizando um foreach, para checar cada elemento 
                    $timestamp = strtotime($elemento); //Essa função 'strtotime' responsável por fazer tudo
                    $elemento = date('d/m/Y - H:i', $timestamp);
                }
                unset($elemento);

                return $row;
            }

            $posicaoData = alterarOrdemData($row);


            echo '<div class="alert alert-primary d-flex align-items-center w-100 text-center" role="alert"
                        style="position: fixed; top: 75px; margin-top: 10px;">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                            <use xlink:href="#info-fill" />
                        </svg>
                        <div>
                        Atenção, acabou de sair uma fornada com '. $row['quantidade'].' pães franceses, na data e hora: '. $posicaoData['dt_fornada'] .'. Aproveite e pegue seu pão quentinho!
                
                            <button type="button" class="btn-close position-absolute end-0" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                                           
                
                
                        </div>
                    </div>';

        }
    }


    ?>







    <div class="container">
        <div class="row">
            <main>
                <section class="home">

                    <div class="col">
                        <div class="home-text text-start">
                            <h4 class="text-h4">Panificadora</h4>
                            <h1 class="text-h1"> Sonho Meu</h1>

                            <p>Sendo uma das melhores panificadoras da região, a Panificadora Sonho Meu apresenta preços
                                justos
                                e um ótimo atendimento. Conheça nossa história, produtos e quando saiu a fornada mais
                                recente!
                            </p>

                            <a href="local.html"><button class="home-btn">Veja mais</button></a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="home-img">
                            <img src="images/logoInicial.png" alt="">
                        </div>
                    </div>
                </section>
            </main>

        </div>

    </div>

    <script src="https://kit.fontawesome.com/67596f1e06.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>