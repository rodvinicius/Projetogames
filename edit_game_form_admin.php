<?php
           require_once "includes/banco.php";

        
$c = $_GET['cod'] ?? 0;  
$q = "SELECT j.cod, j.nome, j.capa, g.genero, p.produtora FROM jogos j JOIN generos g ON j.genero=g.cod JOIN produtoras p ON j.produtora=p.cod WHERE j.cod='$c'";

//$c = $_GET['cod'] ?? 0;
//select j.cod, j.nome, j.capa, j.genero, j.produtora from jogos j where cod='$c'";
//$q = "SELECT j.cod, j.nome, j.capa, g.genero, p.produtora FROM jogos j JOIN generos g ON j.genero=g.cod JOIN produtoras p ON j.produtora=p.cod WHERE j.cod='$c'";
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

<div id="corpo">
<h1>Alteração de Dados</h1>
<form action="edit_game.php" method="POST">
    <table>
        <tr><td>Nome <td> <input type="text" name="nome" id="nome" size="10" maxlength="10" readonly value="<?php echo $reg->nome?>">
        <tr><td>Gênero <td> <input type="text" name="genero" id="genero" size="30" maxlength="30" value="<?php echo $reg->genero?>">
        <tr><td>Produtora <td> <input type="text" name="produtora" id="produtora" readonly value="<?php echo $reg->produtora?>">
        <tr><td>Descrição <td> <textarea name="descricao" id="descricao" size="10" value="<?php echo $reg->descricao?>"></textarea>
        <tr><td>Nota <td> <input type="number" name="nota" id="nota" size="10" maxlength="10">
        <tr><td><input type="submit" value="Salvar">
    </table>

</form>
</div>

</body>
<?php include_once "rodape.php"; /*incluir*/ ?>
</html>

<?php 
    $_SESSION['cod'] = $c;
?>