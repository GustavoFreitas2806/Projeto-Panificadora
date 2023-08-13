<?php
require 'conexao.php';
include 'message.php';


if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['login'])) {
    //função para remover caracteres comumente utilizados dentro do SQL, com a finalidade de deixar mais seguro
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $senha = mysqli_real_escape_string($con, $_POST['senha']);

    $sql = "SELECT * from tb_administrador WHERE nm_email = '$email' and nm_senha = '$senha';";
    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        foreach ($sql_run as $usuario) {
            $idAdministrador = $usuario['idAdministrador'];
            $nm_email = $usuario['nm_email'];
            $nm_senha = $usuario['nm_senha'];
        }
        if ($senha != $nm_senha || $email != $nm_email) {
            header("Location: login.php");
            $_SESSION['messageLogin'] = "E-mail ou senha incorretas";

        } else {
            //definindo as informações da sessão que serão guardadas. ( $_SESSION [' INFORMAÇÃO A SER GUARDADA ']) = $variavelDasInformações = [' $valorEscolhido '];
            $_SESSION['usuario'] = $usuario['idAdministrador'];
            $_SESSION['email'] = $usuario['nm_email'];
            header("Location: vitrineAdm.php");
        }
    } else {
        header("Location: login.php");
        $_SESSION['messageLogin'] = "Usuário não encontrado";
    }
}

if (isset($_POST['sair'])) {
    //o que estava dando erro era o fato de não ter iniciado a sessão no código para poder destruir ela depois, estava destruindo o nada
    session_start();
    session_destroy();
    header("Location: ../cliente/index.php");
}


if (isset($_POST['save_produto'])) {
    //mysqli_real_escape_string é usada para verificar caracteres especiais em uma string, tornando-a segura para ser usada em consultas SQL

    $nm_produto = mysqli_real_escape_string($con, $_POST['nm_produto']);
    $tp_unitario = mysqli_real_escape_string($con, $_POST['tp_unitario']);
    $vl_produto = mysqli_real_escape_string($con, $_POST['vl_produto']);
    $idCategoria = mysqli_real_escape_string($con, $_POST['idCategoria']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);



    $arquivoImg = $_FILES['img'];

    if ($arquivoImg['error']) {
        die("Falha em enviar o arquivo");
    }

    if ($arquivoImg['size'] > 10485760) {
        die("O tamanho máximo do arquivo é de 10mb");
    }

    $local = "arquivos/";
    $nomeDoArquivo = $arquivoImg['name'];
    $nomeUnico = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
        die("Só são aceitos arquivos JPG e PNG.");
    }

    $query = "INSERT INTO tb_produto (`nm_produto`, `tp_unitario`, `vl_produto`, `idCategoria`, `nm_imagem`, `descricao`) VALUES ('$nm_produto','$tp_unitario','$vl_produto','$idCategoria', '$nomeUnico.$extensao', '$descricao')";
    $query_run = mysqli_query($con, $query);


    if ($query_run) {
        $_SESSION['message'] = "Produto cadastrado com sucesso!";
        header("Location: vitrineAdm.php");
        $uploadImgOk = move_uploaded_file($arquivoImg["tmp_name"], $local . $nomeUnico . "." . $extensao);
        exit(0);
    } else {
        $_SESSION['message'] = "Produto não cadastrado";
        header("Location: vitrineAdm.php");
        exit(0);
    }
}


if (isset($_POST['delete_produto'])) {
    $idProduto = mysqli_real_escape_string($con, $_POST['delete_produto']);

    $query = "DELETE FROM tb_produto WHERE idProduto='$idProduto' ";
    $query_run = mysqli_query($con, $query);

    $nm_imagem = mysqli_real_escape_string($con, $_POST['img']);

    if ($query_run) {
        $_SESSION['message'] = "Produto excluido com sucesso";
        unlink("arquivos/" . $nm_imagem);
        header("Location: vitrineAdm.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Não foi possivel excluir o Produto";
        header("Location: vitrineAdm.php");
        exit(0);
    }
}

if (isset($_POST['update_produto'])) {
    $idProduto = mysqli_real_escape_string($con, $_POST['idProduto']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $nm_produto = mysqli_real_escape_string($con, $_POST['nm_produto']);
    $tp_unitario = mysqli_real_escape_string($con, $_POST['tp_unitario']);
    $vl_produto = mysqli_real_escape_string($con, $_POST['vl_produto']);
    $idCategoria = mysqli_real_escape_string($con, $_POST['idCategoria']);
    $imgAntiga = mysqli_real_escape_string($con, $_POST['imgAntiga']);

    $arquivoImg = $_FILES['img'];

    if ($arquivoImg['error']) {
        die("Falha em enviar o arquivo");
    }

    if ($arquivoImg['size'] > 10485760) {
        die("O tamanho máximo do arquivo é de 10mb");
    }

    $local = "arquivos/";
    $nomeDoArquivo = $arquivoImg['name'];
    $nomeUnico = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
        die("Só são aceitos arquivos JPG e PNG.");
    }

    $query = "UPDATE tb_produto SET nm_produto='$nm_produto', descricao='$descricao', tp_unitario='$tp_unitario', vl_produto='$vl_produto', idCategoria='$idCategoria', nm_imagem='$nomeUnico.$extensao' WHERE idProduto='$idProduto' ";
    $query_run = mysqli_query($con, $query);

    //Caso $query_run (mysqli_query) seja true, a váriavel $_SESSION['MESSAGE'] recebe uma frase dizendo que o conteiner foi atualizado, 
    //caso seja false, ela recebe a frase dizendo que o conteiner não foi atualizado.
    if ($query_run) {
        $_SESSION['message'] = "Produto atualizado com sucesso";
        //função rediriciona para index.php
        $uploadImgOk = move_uploaded_file($arquivoImg["tmp_name"], $local . $nomeUnico . "." . $extensao);
        unlink("arquivos/" . $imgAntiga);
        header("Location: vitrineAdm.php");

        //fim da função do script (mysql)
        exit(0);
    } else {
        $_SESSION['message'] = "Produto não atualizado";
        header("Location: vitrineAdm.php");
        exit(0);
    }

}


if (isset($_POST['update_fornada'])) {
    $idFornada = mysqli_real_escape_string($con, $_POST['idFornada']);
    $quantidade = mysqli_real_escape_string($con, $_POST['quantidade']);
    $dt_fornada = mysqli_real_escape_string($con, $_POST['dt_fornada']);

    $query = "UPDATE tb_fornada SET quantidade='$quantidade', dt_fornada='$dt_fornada' WHERE idFornada='$idFornada' ";
    $query_run = mysqli_query($con, $query);

    //Caso $query_run (mysqli_query) seja true, a váriavel $_SESSION['MESSAGE'] recebe uma frase dizendo que o conteiner foi atualizado, 
    //caso seja false, ela recebe a frase dizendo que o conteiner não foi atualizado.
    if ($query_run) {
        $_SESSION['message'] = "Fornada atualizada com sucesso";
        //fim da função do script (mysql)
        header("Location: fornada.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Fornada não foi atualizada";
        header("Location: fornada.php");
        exit(0);
    }

}

if (isset($_POST['delete_fornada'])) {
    $idFornada = mysqli_real_escape_string($con, $_POST['delete_fornada']);

    $query = "DELETE FROM tb_fornada WHERE idFornada='$idFornada' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Fornada excluida com sucesso";
        header("Location: fornada.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Não foi possivel excluir a fornada";
        header("Location: fornada.php");
        exit(0);
    }
}


if (isset($_POST['save_fornada'])) {
    //mysqli_real_escape_string é usada para verificar caracteres especiais em uma string, tornando-a segura para ser usada em consultas SQL

    date_default_timezone_set('America/Sao_Paulo'); //Função do próprio PHP para arrumar o horário de determinada região;

    // https://www.php.net/manual/en/timezones.php


    $quantidade = mysqli_real_escape_string($con, $_POST['quantidade']);
    $dt_fornada = date('Y/m/d H:i');
    // $dt_fornada->format('Y/m/d H:i');


    $query = "INSERT INTO tb_fornada (`quantidade`, `dt_fornada`) VALUES ('$quantidade', '$dt_fornada');";
    $query_run = mysqli_query($con, $query);


    if ($query_run) {
        $_SESSION['message'] = "Fornada cadastrada com sucesso!";
        header("Location: fornada.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Fornada não foi cadastrada";
        header("Location: fornada.php");
        exit(0);
    }
}



?>