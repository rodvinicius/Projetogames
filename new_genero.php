<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Novo Gênero</title>
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
            if(!is_admin()){
                echo msg_erro('Area restrita! Você não é administrador!');
            }else{
                if(!isset($_POST['genero'])){
                    require "new_genero_form.php";
                }else{
                    $genero = $_POST['genero'];

                    $busca = "SELECT * FROM generos WHERE genero = '$genero'";
                    $resultado = $banco->query($busca);
                    if($resultado && $resultado->num_rows > 0){
                        echo msg_erro('Esse gênero ja existe');
                    }
                    elseif(empty($genero)){
                        echo msg_erro('Digite um novo gênero');
                }else{
                    $q = "INSERT INTO generos (genero) VALUES ('$genero')";                    
                        if($banco->query($q)){
                            echo msg_sucesso("o gênero $genero foi adicionado com sucesso!");
                        }else{
                            echo msg_erro("Não foi possível adicionar o novo gênero $genero");
                        }
                    }
                }
            }
            echo voltar();
        ?>
    </div>
</body>
</html>