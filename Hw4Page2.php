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
        <title>results Page1</title>
    </head>
    <body>
          
        <?php
        if($_REQUEST["cyclist"]==null || $_REQUEST["CodS"]==null){
            die("<h1 style=\"color: rgb(200,0,0)\">Bisogna riempire tutti i campi!</h1>");
        }
        if(!is_numeric($_REQUEST["CodS"])){
            die("<h1 style=\"color: rgb(200,0,0)\">Errore inserimento dati</h1>");
        }
        
         $cyclist = $_REQUEST["cyclist"];
         $CodS = $_REQUEST["CodS"];
         $con = mysqli_connect('localhost', 'root','', 'cyclingchampionship');
         if(mysqli_connect_errno()){
             echo "Errore connessione mysqli";
             exit;
         }
         
         $sql = "SELECT DISTINCT C.Name, C.Surname, T.NameT, I.Edition, I.Ranking
         FROM CYCLIST C, TEAM T, INDIVIDUAL_CLASSIFICATION I, STAGE S 
         WHERE C.CodC = '$cyclist' 
         AND C.CodT = T.CodT
         AND I.CodC = C.CodC
         AND S.CodS = I.CodS
         AND S.Edition = I.Edition
         AND S.CodS = $CodS
         ORDER BY I.Edition
         "; 

         $result = mysqli_query($con, $sql);

         if(!$result){
             echo "Errore in result";
             exit;
         }

         //echo "<h2>Results: $cyclist</h2>";        
         if(mysqli_num_rows($result)>0){
             show_query_results($result);
         }else{
             echo "Nessun Risultato";
         }

         echo "\n<input name=\"backPage\" type=\"button\" value=\"Search Again\" onclick=\"window.open('http://localhost/HW4/Hw4Page1.php')\"/>"


         ?>

    </body>
</html>