<html>
   <head>
      <title>Page5</title>
      <form action="Hw4Page6.php" method="GET">
      
   </head>
   <body>
       <?php
          $mysqli = new MySQLi('Localhost', 'root', '', 'cyclingchampionship');
          $resultSet = $mysqli->query("SELECT DISTINCT CodC
                                       FROM CYCLIST");
          $resultSet1 = $mysqli->query("SELECT DISTINCT CodS
                                        FROM STAGE");
          $resultSet2 = $mysqli->query("SELECT DISTINCT Edition
                                        FROM STAGE");                             
        ?>
        <p>Codice Ciclista:</p>
        <select name="CodC" >
        <option selected disabled>Seleziona un Ciclista</option>
        <?php
        while($rows = $resultSet->fetch_assoc()){
            $CodC = $rows['CodC'];
            echo "<option value='$CodC'>$CodC</option>";
        }
        ?>
        </select>

        <p>Codice Tappa:</p>
        <select name="CodS" >
        <option selected disabled >Seleziona una Tappa</option>
        <?php
        while($rows = $resultSet1->fetch_assoc()){
            $CodS = $rows['CodS'];
            echo "<option value='$CodS'>$CodS</option>";
        }
        ?>
        </select>

        <p>Edizione:</p>
        <select name="Edition" >
        <option selected disabled>Seleziona un'Edizione</option>
        <?php
        while($rows = $resultSet2->fetch_assoc()){
            $Edition = $rows['Edition'];
            echo "<option value='$Edition'>$Edition</option>";
        }
        ?>
        </select>

          
        <p>Posizione Ciclista:</p> 
        <p><input type="text" placeholder="e.g. 2" name="Ranking" size="15" maxlenght="2"/></p> 
        
        <p><input style="background: Green;  color: White" type="submit" value="Inserisci"/></p>

        
        
       
   </body>
</html>