<?php
require_once ('connexionBooks.php');
require_once ('process.php');
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
    <a class="navbar-brand" href="#"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg> My Library</a>
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
          <button class="btn btn-outline-secondary" type="submit">Search</button>
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
            <div class="col container p-3 my-3 border me-1">
                <h2 id="title_2022">2022</h2>
                    <div>
                        <?php
$date_explosee = explode("/", $date);
$year = $date_explosee[2];
$requete = "SELECT title FROM books WHERE YEAR(endReading) = $year";
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
            <!-- Lecture en cours -->
            <div class="col container p-3 my-3 border ms-1">
                <h2 id="title_inProgress">Lecture en cours</h2>
                    <div>
                        <?php
$requete = "SELECT title FROM books WHERE endReading IS NULL";
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
            <!-- BTN trigger modal -->
            <div class="col d-grid gap-4 col-2 mx-auto m-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editBookModal" name="edit_book">Modifier ma lecture</button> 
                <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#newBookModal" name="new_book">Nouvelle lecture</button>
            </div>
               
            <!-- Modal Nouvelle lecture -->
            <div class="modal fade" id="newBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modifier ma lecture</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="modal-body">
                    <!-- Formulaire -->
                  <div class="row justify-content-center">
                  <form action ="process.php" method="POST">
            <input type="hidden" name="id_book" value="<?php echo $id_book; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter the title">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $author; ?>" placeholder="Enter the author">
            </div>
            <div class="form-group">
                <label>number of page</label>
                <input type="number" name="numberOfPage" class="form-control" value="<?php echo $numberOfPage; ?>" placeholder="Enter the number of page">
            </div>
            <div class="form-group">
                <label>category</label>
                <input type="text" name="category" class="form-control" value="<?php echo $category; ?>" placeholder="Enter the category">
            </div>
            <div class="form-group">
                <label>Start reading</label>
                <input type="date" name="startReading" class="form-control" value="<?php echo $startReading; ?>" >
            </div>
            <div class="form-group">
                <label>End reading</label>
                <input type="date" name="endReading" class="form-control" value="<?php echo $endReading; ?>" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="save">Save</button>
            </div>
        </form>
    </div>
                  </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
              </div>
              </div>
              </div>
              </div>
            </div>
    <!-- fin modal Nouvelle lecture -->
    <!-- Modal edit lecture -->
    <div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modifier ma lecture</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="modal-body">
                    <!-- Formulaire de modification -->
                  <div class="row justify-content-center">
                  <form action ="process.php" method="POST">
            <input type="hidden" name="id_book" value="<?php echo $id_book; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter the title">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $author; ?>" placeholder="Enter the author">
            </div>
            <div class="form-group">
                <label>number of page</label>
                <input type="number" name="numberOfPage" class="form-control" value="<?php echo $numberOfPage; ?>" placeholder="Enter the number of page">
            </div>
            <div class="form-group">
                <label>category</label>
                <input type="text" name="category" class="form-control" value="<?php echo $category; ?>" placeholder="Enter the category">
            </div>
            <div class="form-group">
                <label>Start reading</label>
                <input type="date" name="startReading" class="form-control" value="<?php echo $startReading; ?>" >
            </div>
            <div class="form-group">
                <label>End reading</label>
                <input type="date" name="endReading" class="form-control" value="<?php echo $endReading; ?>" >
            </div>
            <div class="form-group">
            <button class="btn btn-info" type="submit" name="update">Update</button>
            </div>
        </form>
    </div>
                  </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
              </div>
              </div>
              </div>
              </div>
            </div>
    <!-- End first line -->
    <!-- Second line -->
    <div class="container container p-3 my-3 border text-center" id="container2">
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
</div>
</body>

</html>
