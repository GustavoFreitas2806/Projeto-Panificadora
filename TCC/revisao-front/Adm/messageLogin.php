<?php
//se não estiver vázio, apresenta mensagem 
if (isset($_SESSION['messageLogin'])):
    ?>
        <strong>Aviso:</strong>
        <?= $_SESSION['messageLogin']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php
    //limpa variável, para não deixar armazenada para não conflitar com as próximas ações.
    unset($_SESSION['messageLogin']);
endif;
?>