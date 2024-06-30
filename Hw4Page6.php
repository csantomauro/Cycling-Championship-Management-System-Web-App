<html>
   <head>
       <title>Results Page 5</title>
   </head>
   <body>
       <?php 
       
       if($_REQUEST["Ranking"]==null || $_REQUEST["CodS"]==null  || $_REQUEST["Edition"]==null  || $_REQUEST["CodC"]==null){
        die("<h1 style=\"color: rgb(200,0,0)\">Bisogna riempire tutti i campi!</h1>");
       }
       if(!is_numeric($_REQUEST["Ranking"])){
        echo "<h2 style=\"background: rgb(200, 0, 0); color: White\">ERRORE!</h2>";
        die("<p style=\"background: rgb(200, 0, 0); color: White\">Il ranking deve essere un numero!</p>");
       }
       
       $CodC = $_REQUEST["CodC"];
       $CodS = $_REQUEST["CodS"];
       $Edition = $_REQUEST["Edition"];
       $Ranking = $_REQUEST["Ranking"];

      

       if($Ranking<1){
        echo "<h2 style=\"background: rgb(200, 0, 0); color: White\">ERRORE!</h2>";
        die("<p style=\"background: rgb(200, 0, 0); color: White\">Il ranking deve essere un numero positvo!</p>");
       }

       $con = mysqli_connect('localhost', 'root','', 'cyclingchampionship');
       if(mysqli_connect_errno()){
        echo "Errore connessione mysqli";
        exit;
       }

       $sql = "SELECT Edition
               FROM INDIVIDUAL_CLASSIFICATION
               WHERE CodC = '$CodC' AND CodS = '$CodS'";

              

       $result = mysqli_query($con, $sql);
       if(!$result){
        echo "Errore in risultati di controllo";
        exit;
    }
       //Controllo  che non sia gia stato inserito
       $flag=0;
         while($row=mysqli_fetch_row($result)){
           
            foreach($row as $cell){
               if($cell == $Edition){
                   $flag=1;
               }
            }
           }
        if($flag==1){
            echo "<h2 style=\"background: rgb(200, 0, 0); color: White\">ERRORE!</h2>";
            die("<p style=\"background: rgb(200, 0, 0); color: White\">Il ranking per questo ciclista, in questa gara è già stato inserito</p>");
        }

        $sql2 = "SELECT Edition
                 FROM STAGE
                 WHERE CodS = '$CodS' ";

        $result2 = mysqli_query($con, $sql2);
        if(!$result2){
         echo "Errore in risultati di controllo";
         exit;
        }
        //Controllo che l'edition sia valida
        $flag2=0;
         while($row2=mysqli_fetch_row($result2)){
           
            foreach($row2 as $cell2){
               if($cell2 == $Edition){
                   $flag2=1;
               }
            }
           }
        if($flag2==0){
            echo "<h2 style=\"background: rgb(200, 0, 0); color: White\">ERRORE!</h2>";
            die("<p style=\"background: rgb(200, 0, 0); color: White\">L'Edition scelta per questa tappa non esiste!</p>");
        }

        $sql3 ="SELECT Ranking
                FROM INDIVIDUAL_CLASSIFICATION
                WHERE CodS = '$CodS' AND Edition = '$Edition'";

        $result3 = mysqli_query($con, $sql3);

        if(!$result3){
         echo "Errore in risultati di controllo";
         exit;
        }
        
        $flag3=1;
         while($row3=mysqli_fetch_row($result3)){
           
            foreach($row3 as $cell3){
               if($cell3 == $Ranking){
                   $flag3=0;
               }
            }
           }
        if($flag3==0){
            echo "<h2 style=\"background: rgb(200, 0, 0); color: White\">ERRORE!</h2>";
            die("<p style=\"background: rgb(200, 0, 0); color: White\">Già un'altro ciclista ha ottenuto questo ranking!</p>");
        }        

        
        $sql1 = "INSERT INTO INDIVIDUAL_CLASSIFICATION (CodC, CodS, Edition, Ranking)
                  VALUES ('$CodC', '$CodS', '$Edition', '$Ranking');
         ";

         $result1 = mysqli_query($con, $sql1);

         if ($result1) {
            echo "<h2 style=\"background: Green; color: White\">Inserimennto Avvenuto!</h2>";
            echo "<p style=\"background: Green; color: White\">Inserimento avvenuto con successo</p>";
          } else {
            echo "Inserimento non avvenuto :(";
          }



       
       ?>
      
   </body>
</html>