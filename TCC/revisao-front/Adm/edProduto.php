<?php
require 'conexao.php';
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

    <title>Editar produto</title>
</head>

<body>

    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar produto
                            <a href="vitrineAdm.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['idProduto'])) {
                            $idProduto = mysqli_real_escape_string($con, $_GET['idProduto']);
                            $query = "SELECT * FROM tb_produto WHERE idProduto='$idProduto' ";
                            $query_run = mysqli_query($con, $query);

                            //uma função que retorna o número de linhas do select (count())
                            if (mysqli_num_rows($query_run) > 0) {
                                //atualizar a variável com a informação que vem no select, retorna uma linha
                                $produto = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <div class="mb-3">
                                        <label>ID</label>
                                        <input type="text" name="idProduto" value="<?= $produto['idProduto']; ?>"
                                            class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label>Nome do produto</label>
                                        <input type="text" name="nm_produto" value="<?= $produto['nm_produto']; ?>"
                                            class="form-control" Required>
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
                                        <label>Tipo unitário</label><br>
                                        <select name="tp_unitario" Required>
                                            <option value="KG">KG</option>
                                            <option value="L">L</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Valor</label>
                                        <input type="number" step="0.01" min="0" name="vl_produto" class="form-control" 
                                            value="<?= $produto['vl_produto']; ?>" Required>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_produto" class="btn btn-primary">Atualizar
                                            produto</button>
                                    </div>

                                </form>
                                <?php
                            } else {
                                echo "<h4>Nenhum ID encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>