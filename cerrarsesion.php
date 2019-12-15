<?php
    session_start();

    session_unset();

    session_destroy();

    unset($_SESSION["email"]);
    unset ($_COOKIE ["PHPSESSID"]);

    // unset ($_COOKIE ["emailcookie"]); /* Si quisieramos qeu se borrasen las cookies al logout */

    // echo "<br><br><p align='center'>Su sesión ha sido cerrada con éxito.</p>";
    echo "<script>window.alert('Sesión cerrada con éxito')</script>";

    // echo "<br><br><div align='center'><a href='index_.php'>Ir a PAGINA PRINCIPAL (INDEX)</a></div>";
    echo "<script language='javascript'> window.location.assign('index_.php'); </script>";

    return true;
?>

