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

    <title>Adicionar produto</title>
</head>

<body>

    <div class="container mt-5">

        <?php include 'message.php'; ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Produto
                            <a href="vitrineAdm.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Nome do produto</label>
                                <input type="text" name="nm_produto" class="form-control" Required>
                            </div>
                            <div class="mb-3">
                                <label>Tipo unitário</label><br>
                                <select name="tp_unitario" Required>
                                    <option value="KG">KG</option>
                                    <option value="L">L</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <!-- O segundo valor estará selecionado inicialmente -->
                                <label>Categoria</label><br>
                                <select name="idCategoria" Required>
                                    <option value="1">Padaria</option>
                                    <option value="2">Alimentos</option>
                                    <option value="3">Hortifruti</option>
                                    <option value="4">Bebidas</option>
                                    <option value="5">Congelados e frios</option>
                                    <option value="6">Higiene pessoal</option>
                                    <option value="7">Produtos de limpeza</option>
                                    <option value="8">Latcinios</option>
                                    <option value="9">Outros</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Valor</label>
                                <input type="number" step="0.01" min="0" name="vl_produto" class="form-control"
                                    Required>
                            </div>
                            <div class="mb-3">
                                <label>Imagem</label> <br>
                                <input type="file" name="img" Required /> <br><br>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_produto" class="btn btn-primary">Adicionar</button>
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