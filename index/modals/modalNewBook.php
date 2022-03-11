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
           
    <!-- fin modal Nouvelle lecture -->