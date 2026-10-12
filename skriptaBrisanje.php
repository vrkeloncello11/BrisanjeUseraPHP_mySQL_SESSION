<?php
session_start();

try {
    $veza=new PDO($_SESSION["dsn"], "student", "student123");

    $sqlDelete="DELETE FROM student WHERE idStudent=:id;";

    $upit2=$veza->prepare($sqlDelete);
    $upit2->execute(["id"=>$_SESSION["dobiveniID"]]);
    echo "Izbrisano ".$upit2->rowCount()." linija";

    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Povratak na <a href='index.html'>pocetnu stranicu</a>";

    } catch(PDOException $e) {
        echo "Greska: ".$e->getMessage();
        }

?>