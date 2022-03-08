<?php 

session_start();

$mysqli = new mysqli('localhost', 'root','','books') or die(mysqli_error($mysqli));
$mysqli->set_charset("utf8mb4");
$title ="";
$author="";
$update = false ;
$id_book = 0;

if (isset($_POST['save'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $mysqli->query("INSERT INTO books (title) VALUE('$title')") or die($mysqli->error);

    $_SESSION['message'] ="Record has been saved!";
    $_SESSION['msg_type'] ="success";
    header("location: index.php");

}

if (isset($_GET['delete'])){
    $id_book = $_GET['delete'];
    $mysqli->query("DELETE FROM books WHERE id_book=$id_book") or die($mysqli->error);

    $_SESSION['message'] ="Record has been deleted!";
    $_SESSION['msg_type'] ="danger";
    header("location: index.php");
}

if (isset($_GET['edit'])){
    $id_book = $_GET['edit'];
    $update =true ;
    $result = $mysqli->query("SELECT * FROM books WHERE id_book=$id_book") or die($mysqli->error);
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $author = $row['author'];
}

if(isset($_POST['update'])){
    $id_book = $_POST['id_book'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $mysqli->query("UPDATE books SET title='$title', author='$author' WHERE id_book=$id_book") or die($mysqli->error);

    $_SESSION['message'] ="Record has been update!";
    $_SESSION['msg_type'] ="warning";
    header("location: index.php");

}
?>

