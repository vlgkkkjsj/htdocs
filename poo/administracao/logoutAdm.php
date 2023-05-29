<?php
    session_start();
    session_destroy();
    header('location: ../administracao/administracao.php');
    exit;
      //resume a sessao atual e logo apos destroi os dados da sessao atual,logo apos isso retorna para o formulario de login
?>