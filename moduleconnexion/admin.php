<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
        <link href="admin.css" rel="stylesheet" />

    </head>
    <body>
        <h1>My SQL</h1>
        <?php
            $bdd= mysqli_connect("localhost:3306","root","","moduleconnexion");
            $req= mysqli_query($bdd,"SELECT * FROM utilisateurs");  
            $res= mysqli_fetch_all($req); 
 ?>

        <h1>Afficher les membres</h1>
        <center>
            <strong>
                <table>
                    <head>
                       *
                    </head>
                    <body>
                        <tr>
                    <?php

                    foreach($res as $key => $value){ 
                        echo '<tr>';
                        foreach ($value as $key1 => $value1) 
                        {
                        echo "<td>$value1</td>";  
                        }
                        echo '</tr>'; 
                        }
                        ?>

                    </body>
                </table>
            </strong>    
        </center>
    </body>