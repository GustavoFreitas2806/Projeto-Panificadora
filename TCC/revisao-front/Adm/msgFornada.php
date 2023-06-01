<?php
//se não estiver vázio, apresenta mensagem 
if (isset($_SESSION['fornada'])):
    ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Aviso:</strong>
        <?= $_SESSION['fornada']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php
    //limpa variável, para não deixar armazenada para não conflitar com as próximas ações.
    unset($_SESSION['fornada']);
endif;
?>
