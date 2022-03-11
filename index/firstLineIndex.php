<div class="container p-3 my-3 border text-center" id="container1">
    <div class="row">               
      <!-- 2022 -->
      <div class="col container p-3 my-3 border me-1">
          <h2 id="title_2022">2022</h2>
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
      <!-- Lecture en cours -->
      <?php
      $result = $mysqli->query("SELECT title,id_book FROM books WHERE endReading IS NULL") or die($mysqli->error);
      ?>
      <div class="col container p-3 my-3 border ms-1">
          <h2 id="title_inProgress">Lecture en cours</h2>
        <div class="row justify-content-center">
          <table class="table">
          <tread>
          <tr>
              <th>Id book</th>
              <th>Titre</th>
              <th colspan="2">Action</th>
          </tr>
          </tread>
          <?php
          while ($row = $result->fetch_assoc()):
          ?>
          <tr>
            <td><?php echo $row['id_book']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td>
            <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editBookModal" name="edit_book">Edit lecture</button>
            </td>
          </tr>
          <?php
          endwhile; ?>
          </table>
        </div>
      </div>     
      <!-- BTN trigger modal -->
      <div class="col d-grid gap-4 col-2 mx-auto m-3">
          <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#newBookModal" name="new_book">Nouvelle lecture</button>
      </div>
      <?php include ('modalNewBook.php'); ?>
      <?php include ('modalEditBook.php'); ?>
    </div>                             
  </div>