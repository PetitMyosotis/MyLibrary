<?php 
////////////////// START SESSION  /////////////////////////
session_start();

$mysqli = new mysqli('localhost', 'root','','books') or die(mysqli_error($mysqli));
$mysqli->set_charset("utf8mb4");

/////////////////////////// VARIABLES  ////////////////////////////
$date = date('d/m/Y');
$id_book = 0;
$title ="";
$author="";
$numberOfPage=0;
$category="";
$startReading= date ("Y-m-d");
$endReading= date ("Y-m-d");
$update = false ;

///////////////////////// SAVE  //////////////////////////////////
if (isset($_POST['save'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $numberOfPage = $_POST['numberOfPage'];
    $category = $_POST['category'];
    $startReading = $_POST['startReading'];
    $endReading = $_POST['endReading'];
    $mysqli->query("INSERT INTO books (title,author,numberOfPage,category,startReading,endReading) VALUE('$title','$author',
        '$numberOfPage','$category','$startReading','$endReading')") or die($mysqli->error);

    $_SESSION['message'] ="Record has been saved!";
    $_SESSION['msg_type'] ="success";
    header("location: index.php");

}

///////////////////////// DELETE  //////////////////////////////////
if (isset($_GET['delete'])){
    $id_book = $_GET['delete'];
    $mysqli->query("DELETE FROM books WHERE id_book=$id_book") or die($mysqli->error);

    $_SESSION['message'] ="Record has been deleted!";
    $_SESSION['msg_type'] ="danger";
    header("location: index.php");
}

///////////////////////// COMPLETE THE FORM WHEN BTN EDIT IS PRESS  //////////////////////////////////
if (isset($_GET['edit'])){
    $id_book = $_GET['edit'];
    $update =true ;
    $result = $mysqli->query("SELECT title FROM books WHERE endReading IS NULL") or die($mysqli->error);
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $numberOfPage = $row['numberOfPage'];
    $category = $row['category'];
    $startReading = $row['startReading'];
    $endReading = $row['endReading'];
}

///////////////////////// UPDATE  //////////////////////////////////
if(isset($_POST['update'])){
    $id_book = $_POST['id_book'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $mysqli->query("UPDATE books SET title='$title', author='$author' WHERE id_book=$id_book") or die($mysqli->error);

    $_SESSION['message'] ="Record has been update!";
    $_SESSION['msg_type'] ="warning";
    header("location: index.php");

}
//////////////////////////// INNER JOIN /////////////////////////////////


?>

