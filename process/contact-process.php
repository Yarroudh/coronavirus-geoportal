<?php

    header("content-type: text/html");

    $servername = "sql213.epizy.com";
    $username = "epiz_30924560";
    $password = "lSZ9kv1cvv";
    $port = "3306";
    $dbname = "epiz_30924560_geoportal";

    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    if (isset($_POST["submit"])) {
        if (!$conn) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }
    }

    $name = addslashes($_POST["name"]);
    $email = addslashes($_POST["email"]);
    $phone = addslashes($_POST["phone"]);
    $message = addslashes($_POST["message"]);

    $query = "INSERT INTO `contact` (`nom`, `email`, `telephone`, `message`) VALUES ('$name', '$email', '$phone', '$message');";

    if (mysqli_multi_query($conn, $query)) {
        header("Location: remerciement.html");
        exit();
    }

    mysqli_close($conn);
?>