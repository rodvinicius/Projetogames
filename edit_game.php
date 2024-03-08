<?php $c = $_GET['cod'] ?? 0;  ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Edição de dados do jogo</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
           require_once "includes/banco.php";
           require_once "includes/funcoes.php";
           require_once "includes/login.php";
        ?>
        <div id="corpo">
            <?php            
            if(!is_logado()){
                echo msg_erro("Efetue o login para editar seus dados");
            }
            else{
                if(!isset($_POST['cod'])){
                    if(!is_admin()){
                        include "edit_game_form_editor.php";
                    }
                    else{
                        include "edit_game_form_admin.php";
                    }
                }
                else{    
                    $cod=$_POST['cod']??null;
                    $nome=$_POST['nome']??null;
                    $genero=$_POST['genero']??null;
                    $produtora=$_POST['produtora']??null;
                    $descricao=$_POST['descricao']??null;
                    $nota=$_POST['nota']??null;
                    $capa=$_POST['capa']??null;


                    $novacapa= !empty($capa) ? $capa :'';

                    $q="update jogos SET nome='$nome', genero='$genero', produtora='$produtora', descricao='$descricao', nota='$nota', capa='$novacapa' where cod='$cod' ";            
                    
            
                    //echo msg_aviso($q);
                    //jogar no formulário 
                    if($banco->query($q)){
                        echo msg_sucesso("Dados alterados com sucesso!");
                        logout();
                        echo msg_aviso("Por segurança, efetue o <a href='user_login.php'>Login</a> novamente.");
                    }else{
                        echo msg_erro("Não foi possivel alterar os dados");
                    }
                }
                }                  
            ?>
            <?php echo voltar();?>
        </div>
        
    </body>
</html>