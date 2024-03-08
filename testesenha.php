<?php

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

$original = "1234";
echo "$original <br>";
echo cripto($original);
echo "<br>";
echo gerarHash($original);
echo "<br>";
echo testarHash($original,'$2y$10$knPp9syWSKSks2x26U3BteBYKS.hGeeKIrZBUOlw8lNiZL7sGv0Qu')?"SIM":"NAO";
//echo testarHash('iboob','$2y$10$k/eihOFYhgHeKMzFvJFn5uSbzzplzShlzsW6uE1k6AqnRz9SgCvpe')?"SIM":"NAO";