<?php
require 'protect.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>VitrineADM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav>
        <img class="logo" src="images/logo.png" alt="Logo" />
        <ul>
            <li class="active"><a href="index.html">Vitrine</a></li>
            <li><a href="fornada.php">Fornada</a></li>
            <form action="code.php" method="POST">
                <li><a href="../Cliente/index.html"><button class="adm" type="submit" name="sair">Sair</button></a></li>
            </form>
        </ul>
        <img class="menu" src="images/menu.png" alt="Menu" onclick="toggleMenu()" />
    </nav>

    <div class="container mt-4">
        <!-- importa as informações do arquivo, apresentando uma mensagem de AVISO -->
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Produtos cadastrados
                            <a href="addProduto.php" class="btn btn-primary float-end">Adicionar produto</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Tipo Unitário</th>
                                    <th>Valor</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require 'conexao.php';
                                $query = "SELECT * FROM tb_produto as P
                                INNER JOIN tb_categoria as C
                                ON P.idCategoria = C.idCategoria;";
                                $query_run = mysqli_query($con, $query);



                                //pega todas as informações dos container no vacuo 
                                if (mysqli_num_rows($query_run) > 0) {
                                    //atribuir as informação do select ao array container 
                                    foreach ($query_run as $produto) {
                                        //https://pt.stackoverflow.com/questions/213361/pegar-nome-atrav%C3%A9s-do-id-do-usu%C3%A1rio
                                        ?>
                                        <tr>
                                            <td>

                                                <?= $produto['idProduto']; ?>
                                            </td>
                                            <td>
                                                <?= $produto['nm_produto']; ?>
                                            </td>
                                            <td>
                                                <?= $produto['tp_unitario']; ?>
                                            </td>
                                            <td>
                                                R$
                                                <?= $produto['vl_produto']; ?>
                                            </td>
                                            <td>
                                                <?= $produto['nm_categoria']; ?>
                                            </td>
                                            <td>
                                                <a href="edProduto.php?idProduto=<?= $produto['idProduto']; ?>"
                                                    class="btn btn-success btn-sm">Editar</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <input value=<?= $produto['nm_imagem'];?> name="img" style="display: none;">
                                                    <button type="submit" name="delete_produto"
                                                        onclick="return confirm('Tem certeza que deseja deletar esse produto?')"
                                                        value="<?= $produto['idProduto'];?>"
                                                        class="btn btn-danger btn-sm">Deletar</button>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal">Foto</button>
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
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <?php include 'message.php'; ?>
                                                <h5 class="modal-title" id="exampleModalLabel">Visualizar foto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="arquivos/<?= $produto['nm_imagem']?>" alt="img produto"
                                                    style="width: 80%;">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>