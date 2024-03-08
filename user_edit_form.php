<?php
   $q = "select usuario, nome, senha, tipo from usuarios where usuario='" .$_SESSION['user']."'";
    $busca=$banco->query($q);
    $reg=$busca->fetch_object();

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Listagem de Jogos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilos/estilo.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>

<h1>Alteração de Dados</h1>
<form action="user_edit.php" method="POST">

    <table>
        <tr><td>Usuário <td> <input type="text" name="usuario" id="usuario" size="10" maxlength="10" readonly value="<?php echo $reg->usuario?>">
        <tr><td>Nome <td> <input type="text" name="nome" id="nome" size="30" maxlength="30" value="<?php echo $reg->nome?>">
        <tr><td>Tipo <td> <input type="text" name="tipo" id="tipo" readonly value="<?php echo $reg->tipo?>">
        <tr><td>Senha <td> <input type="password" name="senha1" id="senha1" size="10" maxlength="10">
        <tr><td>Confirme a Senha <td> <input type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr><td><input type="submit" value="Salvar">
    </table>

</form>
<?php include_once "rodape.php"; /*incluir*/ ?>
</body>
</html>