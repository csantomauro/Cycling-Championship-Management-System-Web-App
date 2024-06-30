<html>
   <head>
      <title>Page3</title>
      <form action="Hw4Page4.php" method="GET">
   </head>
   <body>
       <?php
          $mysqli = new MySQLi('Localhost', 'root', '', 'cyclingchampionship');
          $resultSet = $mysqli->query("SELECT DISTINCT CodT
                                       FROM CYCLIST");
        ?>
        
        <p>Codice Ciclista:</p>
        <p><input type="text" placeholder="e.g. 5" name="CodC" size="15" maxlenght="20"/></p> 

        <p>Nome Ciclista:</p>
        <p><input type="text" placeholder="e.g. Mario" name="Name" size="15" maxlenght="20"/></p> 
        
        <p>Cognome Ciclista:</p>
        <p><input type="text" placeholder="e.g. Rossi" name="Surname" size="15" maxlenght="20"/></p>

        <p>Nazionalità Ciclista:</p>
        <p><input type="text" placeholder="e.g. Italian" name="Nationality" size="15" maxlenght="20"/></p> 
        
        <p>Team Code:</p>
        <!--<select name="CodT" >
        <option selected disabled>Seleziona una Squadra</option>
        <?php
         //while($rows = $resultSet->fetch_assoc()){
           // $CTeam = $rows['CodT'];
           
           // echo "<option value='$CodT'>$CTeam</option>";
       //}
        ?>
        </select>-->
        <select name="CodT">
        <option selected disabled>Seleziona una Squadra</option>
        <option value='1'>1</option>
        <option value='2'>2</option>
        <option value='3'>3</option>
        <option value='4'>4</option>
        <option value='5'>5</option>
        <option value='6'>6</option>
        
        </select>
          
        <p>Anno di nascita del ciclista:</p> 
        <p><input type="text" placeholder="e.g. 1980" name="BirthYear" size="15" maxlenght="2"/></p> 
        
        <p><input style="background: Green; color: White" size="15"; type="submit" value="Inserisci"/></p>
        
     
   </body>
</html>