<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
     
     
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
                return "<td>" . parent::current(). "</td>";
            }

            function beginChildren() {
                echo "<tr>";
            }

            function endChildren() {
                echo "</tr>" . "<br/>";
            }
            }

            require_once("connexionBD.php");

            try {
            // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete = $connexion->prepare("SELECT id, prenom, nom, age, classe, date_inscription  FROM etudiant ORDER BY nom");
            $requete->execute();

            // set the resulting array to associative
            $result = $requete->setFetchMode(PDO::FETCH_ASSOC);
            foreach(new TableRows(new RecursiveArrayIterator($requete->fetchAll())) as $k=>$v) {
                echo $v;
            }
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
            
            echo "</table>";
?>
    </body>