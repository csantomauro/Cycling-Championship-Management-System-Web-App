<?php 
function show_header($result){
    echo "<tr>";

    for($i=0;$i < mysqli_num_fields($result); $i++){
        $title = mysqli_fetch_field($result);
        $name=$title->name;
        echo "<th> $name </th>";
    } 
    echo "</tr>";
}

function show_rows($result){
    while($row=mysqli_fetch_row($result)){
        echo "<tr>";
        foreach($row as $cell){
            echo "<td> $cell </td>";
        }
        echo "</tr>";
    }
}

function show_query_results($result){
    echo "<table order=1 cellpadding=10>";
    show_header($result);

    show_rows($result);

    echo "</table>";
}
?>
<html>
    <head>
        <title>results Page 3</title>
    </head>
    <body>
          
        <?php

if($_REQUEST["CodC"]==null || $_REQUEST["Name"]==null || $_REQUEST["Surname"]==null || $_REQUEST["Nationality"]==null || $_REQUEST["CodT"]==null || $_REQUEST["BirthYear"]==null){
    die("<h1 style=\"color: rgb(200,0,0)\">Bisogna riempire tutti i campi!</h1>");
}
if(!is_numeric($_REQUEST["CodC"]) || is_numeric($_REQUEST["Name"]) || is_numeric($_REQUEST["Surname"]) || is_numeric($_REQUEST["Nationality"]) || !is_numeric($_REQUEST["CodT"]) || !is_numeric($_REQUEST["BirthYear"])){
    die("<h1 style=\"color: rgb(200,0,0)\">Errore inserimento dati</h1>");
} 
         $CodC = $_REQUEST["CodC"];
         $Name = $_REQUEST["Name"];
         $Surname = $_REQUEST["Surname"];
         $Nationality = $_REQUEST["Nationality"];
         $CodT = $_REQUEST["CodT"];
         $BirthYear = $_REQUEST["BirthYear"];
         $con = mysqli_connect('localhost', 'root','', 'cyclingchampionship');
         
         if(mysqli_connect_errno()){
             echo "Errore connessione mysqli";
             exit;
         }
       
        
         $sql1 = "SELECT DISTINCT C.CodT
                  FROM CYCLIST C";
           $result1 = mysqli_query($con, $sql1);
           $flag1=1; 
           while($row1=mysqli_fetch_row($result1)){
             
              foreach($row1 as $cell1){
                
                 if($cell1 == $CodT){
                     $flag1=0;
                 }
              }
             }
             
         if($flag1==1){
            echo "<h2 style=\"background: rgb(200, 0, 0); color: White\">ERRORE!</h2>";
            die("<p style=\"background: rgb(200, 0, 0); color: White\">Il codice team inserito non è presente nel DB!</p>");
         }
           

          
          
          $sql = "SELECT C.CodC
                  FROM CYCLIST C";
          
          $result = mysqli_query($con, $sql);
         
          $flag=0;
         while($row=mysqli_fetch_row($result)){
           
            foreach($row as $cell){
               if($cell == $CodC){
                   $flag=1;
               }
            }
           }
  
         if($flag==1){
            echo "<h2 style=\"background: rgb(200, 0, 0); color: White\">ERRORE!</h2>";
            die("<p style=\"background: rgb(200, 0, 0); color: White\">Il codice ciclista inserito è già presente nel DB!</p>");
         }
        $sql2 = "INSERT INTO cyclist (CodC, Name, Surname, Nationality, CodT, BirthYear)
                 VALUES ('$CodC', '$Name', '$Surname', '$Nationality', '$CodT', '$BirthYear');
                ";


          $result2 = mysqli_query($con, $sql2);

         if(!$result || !$result2){
             echo "Errore in result";
             exit;
         }


          if ($result2) {
            echo "<h2 style=\"background: Green; color: White\">Inserimennto Avvenuto!</h2>";
            echo "<p style=\"background: Green; color: White\">Inserimento avvenuto con successo</p>";
          } else {
            echo "Inserimento non avvenuto :(";
          }
            
         

         


         ?>
         

    </body>
</html>