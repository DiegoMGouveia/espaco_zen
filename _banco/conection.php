<?php
    
    session_start();
    // passo 1
    $servidor  = "localhost";
    $usuario = "root";
    $senha = "diego123";
    $bancodb = "salaodb";
    $conecta = mysqli_connect($servidor,$usuario,$senha,$bancodb);

    //passo 2
    if ( mysqli_connect_errno() ) {
        die("Conexão falhou: " . mysqli_connect_errno() );
    }


?>