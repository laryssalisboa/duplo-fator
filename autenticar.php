<?php

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

$g = new \Google\Authenticator\GoogleAuthenticator();

$secret = '1R34F67K9112TT56';

if(isset($_POST["token"])){
    $token = $_POST["token"];
    if($g -> checkCode($secret, $token)){
        echo "Acesso liberado";
    }
    else{
        echo "Token inválido ou expirado";
    }
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Autenticando </title>
</head>
<body>
    <h1>Nesta etapa você deve informar seu token</h1>

    <form method="POST">
        <input type="text" name="token">
        <button type="submit"> Verificar token </button>
    </form>

</body>
</html>