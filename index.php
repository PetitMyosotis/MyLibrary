<?php
require_once('connexionBooks.php');
require_once('process.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>My library v1</title>
<meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
<!-- NAVBAR -->
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ajouter un nouveau livre</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche">
          <button class="btn btn-info" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
<!-- End Navbar -->
<!-- Page -->
<div class="container" id="container_page">
    <!-- first line -->
    <div class="container" id="container1">
        <div class="row">
            <!-- 2022 -->
            <div class="col">
                <h2 id="title_2022">2022</h2>
                    <div>
                        <?php
                        $date_explosee = explode("/", $date);
                        $year = $date_explosee[2];
                        $requete= "SELECT title FROM books WHERE YEAR(endReading) = $year";
                        $resultat=mysqli_query($mysqli,$requete);
                        while($ligne=mysqli_fetch_assoc($resultat))
                        {
                        ?>
                            <div>
                            <?php echo $ligne["title"]; ?>
                            </div>
                        <?php } ?>
                    </div>
            </div>
            <!-- Lecture en cours -->
            <div class="col">
                <h2 id="title_inProgress">Lecture en cours</h2>
                    <div>
                        <?php
                        $requete= "SELECT title FROM books WHERE endReading IS NULL";
                        $resultat=mysqli_query($mysqli,$requete);
                        while($ligne=mysqli_fetch_assoc($resultat))
                        {
                        ?>
                            <div>
                            <?php echo $ligne["title"]; ?>
                            </div>
                        <?php } ?>
                    </div>
            </div>        
            <!-- BTN -->
            <div class="col btn-group-vertical">
                <button class="btn btn-info" name="edit_book">Modifier ma lecture</button>
                <button class="btn btn-info" name="new_book">Nouvelle lecture</button>
            </div>
        </div>
    </div>
    <!-- End first line -->
    <!-- Second line -->
    <div class="container" id="container2">
        <h2 id="title_month">Ce mois-ci</h2>
            <div>
                <?php
                $mois = $date_explosee[1];
                $requete= "SELECT title FROM books WHERE MONTH(endReading) = $mois";
                $resultat=mysqli_query($mysqli,$requete);
                while($ligne=mysqli_fetch_assoc($resultat))
                {
                ?>
                    <div>
                    <?php echo $ligne["title"]; ?>
                    </div>
                <?php } ?>
            </div>   
    </div>
</div>
</body>

</html> 