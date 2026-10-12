<?php 
session_start();
$_SESSION += ["dobiveniID" => "", "dsn" => ""];

$dsn="mysql:host=localhost; dbname=fakultet";
$dobiveniID=$_POST["idStudentWeb"];

$_SESSION["dobiveniID"]=$dobiveniID;
$_SESSION["dsn"]=$dsn;

/*      RADI
echo "iz sesije prije try-a: "; 
echo $_SESSION["dobiveniID"];
echo $_SESSION["dsn"];
*/


try {
    
        $veza=new PDO($_SESSION["dsn"], "student", "student123");

        $sqlSelect="SELECT * FROM student WHERE idStudent=:id;";

        $upit=$veza->prepare($sqlSelect);
        $upit->execute(["id"=>$_SESSION["dobiveniID"]]);

        while($student=$upit->fetch()) {
            echo "Odabrali ste studenta: ";
            echo $student["ime"]." ";
            echo $student["prezime"].", s e-mailom: ";
            echo $student["email"];
            echo "<br>";

            echo "Ako ste sigurni u odabir, nastavite na <a href='potvrda.html'>brisanje</a>";
            }
        

    

} catch (PDOException $e) {
    echo "Greska: ".$e->getMessage();
}


?>