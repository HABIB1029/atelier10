<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Bases de données MySQL</h1>  
        <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On essaie de se connecter
            try{
                $connexion = new PDO("mysql:host=$servername;dbname=senecole", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                /*$insertion = "INSERT INTO etudiant(nom, prenom, age, classe, date_inscription)
                            VALUES('FAYE', 'Saliou', 19, 'licence2','2020-06-6'),
                            ('NDIAYE', 'Mamadou', 21, 'licence2','2020-01-03'),
                            ('DIOP', 'Babacar', 19, 'licence2','2018-11-03')";*/
                $connexion->exec($insertion);
                echo 'valeurs inserer' ;           
               
            }
            
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
        ?>
    </body>