<html>
   <head>
      <title>Page1</title>
      <form action="Hw4Page2.php" method="GET">
   </head>
   <body>
       <?php
          $mysqli = new MySQLi('Localhost', 'root', '', 'cyclingchampionship');
          $resultSet = $mysqli->query("SELECT DISTINCT Name, CodC
                                       FROM CYCLIST");
        ?>
        <p>Cyclist Code:</p>
        <select name="cyclist">
        <?php
         while($rows = $resultSet->fetch_assoc()){
            $CName = $rows['Name'];
            $CCodC = $rows['CodC'];
            echo "<option value='$CCodC'>$CCodC - $CName</option>";
       }
        ?>
        </select>
          
        <p>Codice Tappa:</p> 
        <p><input type="text" name="CodS" size="15" maxlenght="2"/></p> 
        <p><input type="submit" value="Search"/></p>
        
     
   </body>
</html>