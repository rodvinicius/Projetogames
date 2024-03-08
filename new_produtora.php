<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Nova Produtora</title>
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
                if(!isset($_POST['produtora'])){
                    require "new_produtora_form.php";
                }else{
                    $produtora = $_POST['produtora'];
                    $pais = $_POST['pais'];

                    //verifica de o novo genero ja existe no banco de dados.
                    $busca = "SELECT * FROM produtoras WHERE produtora = '$produtora'";
                    $resultado = $banco->query($busca);
                    if($resultado && $resultado->num_rows > 0){
                        echo msg_erro('Essa produtora ja existe');
                    }
                    elseif(empty($produtora) && ($pais)){
                        echo msg_erro('Digite uma nova produtora e o pais de origem');
                }else{
                    $q = "INSERT INTO produtoras (produtora, pais) VALUES ('$produtora', '$pais')";                    
                        if($banco->query($q)){
                            echo msg_sucesso("a produtora $produtora foi adicionado com sucesso!");
                        }else{
                            echo msg_erro("Não foi possível adicionar a nova produtora $produtora");
                        }
                    }
                }
            }
            echo voltar();
        ?>
    </div>
</body>
</html>