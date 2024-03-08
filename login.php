<?php

session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user']="";
    $_SESSION['nome']="";
    $_SESSION['tipo']="";
}

function cripto($senha){
    $c='';
    for($pos=0; $pos < strlen($senha); $pos++){
        $letra = ord($senha[$pos])+1;
        $c .=chr($letra);         
    }
    return $c;
}

function gerarHash($senha){
    $txt = cripto($senha);
    $hash = password_hash($txt,PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha,$hash){    
    $ok = password_verify(cripto($senha),$hash);
    return $ok;
}

function logout(){
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
}

function is_logado(){
    if(empty($_SESSION['user'])){
        return false;
    }else{
        return true;
    }
}

function is_admin(){
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)){
        return false;
    }else {
        if($t == 'admin'){
            return true;
        }else{
            return false;
        }
    }
}

function is_editor(){
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)){
        return false;
    }else {
        if($t == 'editor'){
            return true;
        }else{
            return false;
        }
    }
}
/*EXPLICAÇÃO DE HASH
function gerarHash($senha){
    $hash = password_hash($senha,PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha,$hash){
    $ok = password_verify($senha,$hash);
    return $ok;
}

echo gerarHash('teste');
echo "<br>";
echo testarHash('teste','$2y$10$FzM5GrAPWVWGCylZDUum5OUQorYJ1e.GHi3Q23Av7s6om.Rn/7gD6');//retorna 1 esta ok

if(testarHash('test','$2y$10$FzM5GrAPWVWGCylZDUum5OUQorYJ1e.GHi3Q23Av7s6om.Rn/7gD6')){
    echo "<br> Senha confere";
}else{
    echo "<br> Senha não confere";
}
*/

//CRIPTOGRAFIA explicação
//ABCDEFGHIJKLMNOPQRSTUVWYZ

//ADMIN = BENJO


//EXPLICAÇÃO FUNÇÃO CRIPTO
/*function cripto($senha){
    $c='';
    for($pos=0; $pos < strlen($senha); $pos++){
        //$letra = $senha[$pos];
        //echo " --- $letra --- ";
        $letra = ord($senha[$pos]);    //+1
        echo " --- $letra --- ";
        //echo chr($letra);
    }
    return $c;
}

cripto('admin');
*/

//--------------Final----------------
/*function cripto($senha){
    $c='';
    for($pos=0; $pos < strlen($senha); $pos++){
        $letra = ord($senha[$pos])+1;
        $c .=chr($letra);         
    }
    return $c;
}

function gerarHash($senha){
    $txt = cripto($senha);
    $hash = password_hash($txt,PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha,$hash){
    $ok = password_verify($senha,$hash);
    return $ok;
}
*/
//Teste
/*
$original = "hanna";
echo "$original <br>";
echo cripto($original);
echo "<br>";
echo gerarHash($original);
echo "<br>";
echo testarHash($original,'$2y$10$k/eihOFYhgHeKMzFvJFn5uSbzzplzShlzsW6uE1k6AqnRz9SgCvpe')?"SIM":"NAO";
//echo testarHash('iboob','$2y$10$k/eihOFYhgHeKMzFvJFn5uSbzzplzShlzsW6uE1k6AqnRz9SgCvpe')?"SIM":"NAO";

*/
?>