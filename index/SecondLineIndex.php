<div class="container p-3 my-3 border text-center" id="container2">
    <h2 id="title_month">Ce mois-ci</h2>
      <div>
        <?php
        $mois = $date_explosee[1];
        $requete = "SELECT title FROM books WHERE MONTH(endReading) = $mois";
        $resultat = mysqli_query($mysqli, $requete);
        while ($ligne = mysqli_fetch_assoc($resultat))
        {
        ?>
        <div>
          <?php echo $ligne["title"]; ?>
        </div>
        <?php
        } ?>
      </div>   
  </div> 