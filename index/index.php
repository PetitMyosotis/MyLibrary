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
  <?php include ('navbar.php'); ?>
  <!-- End Navbar -->
  <!--  first line -->
  <?php include ('firstLineIndex.php'); ?>
  <!-- End first line -->
  
  <!-- Second line -->
  <?php include ('SecondLineIndex.php'); ?>
  <!-- End Second line -->
</body>

</html>
