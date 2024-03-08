<?php
    echo "<header>";
    //mudar
    if(empty($_SESSION['user'])){
    echo "<a href='user_login.php'>Entrar</a>";
    }
    else{
        echo "Olá,<strong> " . $_SESSION['nome']."</strong> |";
        echo "<a href='user_edit.php'>Meus Dados</a> | ";
        if(is_admin()){
            echo "<a href='user_new.php'> Novo usuario</a> | ";
            echo "<a href='jogo_new.php'>Novo Jogo</a> | ";
            echo "<a href='new_genero.php'>Novo Genero</a> | ";
            echo "<a href='new_produtora.php'>Nova Produtora</a> |";
        }
        echo "<a href='user_logout.php'>Sair</a>";
    }
    echo "</header>";
?>