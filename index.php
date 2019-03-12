<!DOCTYPE html>
<html>
    <head>
        <title>Jeu de la vie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
         <meta http-equiv="refresh" content="0; url=./index.php"/>
         
         
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    </head>
    <body>
        
        <table>
            <tr>
                <td>
                    <code>
                      
                        <a  href="zero.php"><input type="button" value="Bouton"/></a>
                        </br>
                        <?php
                        require_once "./Monde.php";
                        
                        
                      
                        session_start();
                        
                        if (isset($_SESSION["terre"])) {
                            
                           
                            $terre = $_SESSION["terre"]; 
                         }
                         else{
                            
                            
                             $terre = new Monde(30,30);
                             $_SESSION["terre"]= $terre;
                            
                         }
                         
                         $terre->afficher();
                         $terre->tourSuivant();
                         $_SESSION["terre"]= $terre;
                        
                        
                        ?>
                    </code>
                </td>
            </tr>
        </table>
    </body>
</html>
