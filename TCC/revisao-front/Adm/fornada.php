<?php
require 'protect.php';
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Fornada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav>
        <img class="logo" src="images/logo.png" alt="Logo" />
        <form action="code.php" method="POST">
            <ul>
                <li><a href="vitrineAdm.php">Vitrine</a></li>
                <li class="active"><a href="fornada.php">Fornada</a></li>
                <li><a href="../Cliente/index.php"><button class="adm" type="submit" name="sair">Sair</button></a>
                </li>
            </ul>
        </form>
        <img class="menu" src="images/menu.png" alt="Menu" onclick="toggleMenu()" />
    </nav>
    <div class="container mt-4">
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Fornadas cadastradas
                            <a href="addFornada.php" class="btn btn-primary float-end">Adicionar fornada</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Quantidade</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'conexao.php';
                                $query = "SELECT * FROM tb_fornada order by idFornada DESC";
                                $query_run = mysqli_query($con, $query);


                                //pega todas as informações dos container no vacuo 
                                if (mysqli_num_rows($query_run) > 0) {
                                    //atribuir as informação do select ao array container 
                                    foreach ($query_run as $fornada) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $fornada['idFornada']; ?>
                                            </td>
                                            <td>
                                                <?= $fornada['quantidade']; ?>
                                            </td>
                                            <td>
                                                <?= $fornada['dt_fornada']; ?>
                                            </td>
                                            <td>

                                                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal"
                                                    data-bs-whatever="<?= $fornada['idFornada']; ?>"
                                                    data-bs-whateverquantidade="<?= $fornada['quantidade']; ?>"
                                                    data-bs-whateverdt_fornada="
                                                    <?= $fornada['dt_fornada']; ?>">Editar</button>

                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_fornada"
                                                        onclick="return confirm('Tem certeza que deseja deletar a fornada?')"
                                                        value="<?= $fornada['idFornada']; ?>"
                                                        class="btn btn-danger btn-sm">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<h5> Nenhum produto cadastrado </h5>";
                                }
                                ?>

                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" style="transition: 0.15s;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <?php include 'message.php'; ?>
                                                <h5 class="modal-title" id="exampleModalLabel">Editar fornada</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="code.php" method="POST">
                                                    <div class="mb-3">
                                                        <label for="ID" class="col-form-label">ID</label>
                                                        <input type="text" class="form-control" id="recipient-name"
                                                            name="idFornada" value="<?= $fornada['idFornada']; ?>"
                                                            readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Quantidade"
                                                            class="col-form-label">Quantidade</label>
                                                        <input type="text" class="form-control" id="Quantidade"
                                                            name="quantidade" value="<?= $fornada['quantidade']; ?>" Required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="Data" class="col-form-label">Data</label>
                                                        <input type="text" class="form-control" id="Data"
                                                            name="dt_fornada" value="<?= $fornada['dt_fornada']; ?>" Required>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary"
                                                    name="update_fornada">Atualizar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>