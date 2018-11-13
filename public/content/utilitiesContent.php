<?php
/**
 * Created by PhpStorm.
 * User: Joseph Rose
 * Date: 13/11/2018
 * Time: 10:03
 */

function utilitiesContent()
{
    $pdoConnection = PdoSingleton::Instance();

    if ($pdoConnection) {

        echo "Connected<br>";
    }

    // DETANGLE BY type:


    // Memory
    detangleComponentMemory($pdoConnection);


}

/*
 *
 * $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ? AND status=?');
$stmt->execute([$email, $status]);
$user = $stmt->fetch();
 *
 */