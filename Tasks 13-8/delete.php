<?php 
include 'connection.php';
$id=$_GET['id'];
$sql = "DELETE FROM products  WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record Deleted successfully";
    header('Location: table.php');
} else {
    echo "Error dDeleting record: " . $conn->error;
}
?>