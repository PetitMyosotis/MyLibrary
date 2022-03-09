<?php
require_once('connexionBooks.php');
require_once('process.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Library</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
<!-- alerte -->
    <?php 
    if (isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
<!-- head -->
<div class="container">
    <h1 id="title">My Library</h1>
    <div>
        <?php
        echo "Nous sommes le " . $date = date('d/m/Y');
        ?>
    </div>
<!--  lu ce mois-ci -->
    <div>Ce mois-ci j'ai lu:</div>
    <div>
        <?php
            $date_explosee = explode("/", $date);
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
<!-- SHOW -->
    <?php
    $result = $mysqli->query("SELECT * FROM books") or die($mysqli->error);
    ?>
    <div class="row justify-content-center">
        <table class="table">
            <tread>
                <tr>
                    <th>book id</th>
                    <th>title</th>
                    <th>author</th>
                    <th>number of page</th>
                    <th>category</th>
                    <th>start reading</th>
                    <th>end reading</th>
                    <th colspan="2">Action</th>
                </tr>
            </tread>
            <?php
                while($row = $result->fetch_assoc()):
            ?>
            <tr>
                <td><?php echo $row['id_book']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['author']; ?></td>
                <td><?php echo $row['numberOfPage']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td><?php echo $row['startReading']; ?></td>
                <td><?php echo $row['endReading']; ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id_book']; ?>" class="btn btn-info">Edit</a>
                    <a href="process.php?delete=<?php echo $row ['id_book']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <?php
    function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
    ?>
<!-- INSERT -->
    <div class="row justify-content-center">
        <form action ="process.php" method="POST">
            <input type="hidden" name="id_book" value="<?php echo $id_book; ?>">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo $title;?>" placeholder="Enter the title">
            </div>
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="<?php echo $author;?>" placeholder="Enter the author">
            </div>
            <div class="form-group">
                <label>number of page</label>
                <input type="number" name="numberOfPage" class="form-control" value="<?php echo $numberOfPage;?>" placeholder="Enter the number of page">
            </div>
            <div class="form-group">
                <label>category</label>
                <input type="text" name="category" class="form-control" value="<?php echo $category;?>" placeholder="Enter the category">
            </div>
            <div class="form-group">
                <label>Start reading</label>
                <input type="date" name="startReading" class="form-control" value="<?php echo $startReading;?>" >
            </div>
            <div class="form-group">
                <label>End reading</label>
                <input type="date" name="endReading" class="form-control" value="<?php echo $endReading;?>" >
            </div>
            <div class="form-group">
                <?php if($update == true):
                ?>
                <button class="btn btn-info" type="submit" name="update">Update</button>
                <?php else: ?>
                <button class="btn btn-primary" type="submit" name="save">Save</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>
</body>
</html>