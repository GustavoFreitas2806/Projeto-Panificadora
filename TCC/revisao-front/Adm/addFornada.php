<?php
session_start();
require 'protect.php';
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Adicionar Fornada</title>
</head>

<body>

    <div class="container mt-5">

        <?php include 'message.php'; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Fornada
                            <a href="fornada.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Quantidade</label>
                                <input type="number" min="1" name="quantidade" class="form-control" Required>
                            </div>
                            <!-- <div class="mb-3">
                                <label>Data</label>
                                <input type="datetime" name="dt_fornada" class="form-control" Required>
                            </div> -->
                            <div class="mb-3">
                                <button type="submit" name="save_fornada" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>