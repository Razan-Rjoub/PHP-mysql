<?php include 'connection.php'; ?>

<?php

    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $price = $row['price'];
    $description = $row['description'];
    $image = $row['image'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $id = $_POST['id'];

    $sql = "UPDATE products SET name='$name', price='$price', description='$description', image='$image' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('Location: table.php');
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="container">
    <form method='post' action=''>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form-group">
            <label for="name">name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name"
                value="<?php echo $name ?>">
        </div>

        <div class="form-group">
            <label for="price">price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="price"
                value="<?php echo $price ?>">
        </div>
        <div class="form-group">
            <label for="description">description</label>
            <textarea class="form-control" id="description" rows="3"
                name="description"><?php echo $description ?></textarea>
        </div>

        <div class="form-group">
            <label for="image">image</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="image"
                value="<?php echo $image ?>">
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>