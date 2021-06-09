<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Bases de données MySQL</h1>  
    <?php
            echo "<table>";
            echo "<tr'>
            <th>Id</th> <th>Preom</th> <th>nom</th> <th>âge</th ><th>Classe</th> <th>Date</th>
            </tr>";

            class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current() {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "<br/>";
            }
            }

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "senecole";

            try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = $conn->prepare("SELECT id, prenom, nom, age, classe, date_inscription  FROM etudiant ORDER BY nom");
            $requete->execute();

            // set the resulting array to associative
            $result = $requete->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new TableRows(new RecursiveArrayIterator($requete->fetchAll())) as $k=>$v) {
                echo $v;
            }
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
            $conn = null;
            echo "</table>";
?>
    </body>