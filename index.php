<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $sql = "INSERT INTO products (name, price, description) VALUES ('$name', '$price', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Monginis Hub</h1>
    <p class="text-center1">your's trusted enterprise for daily purposed products since 1998...</p>
    <center><h2 style="font-size: 15px; color:white; position:relative; top:-15px;">122/25B, Haridas Lane, Kolkata - 700 012</h2></center>

    <!-- Add Product Form -->
    <form method="POST" action="" class="mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" name="price" id="price" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>

    <!-- Product Table -->
    <table class="table table-striped mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action1</th>
                <th>Action2</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td>$<?= $row["price"] ?></td>
                        <td><?= $row["description"] ?></td>
                        <td><button type="submit" class="btn btn-primary"><a href="update.php?id=<?php echo $row['id']; ?>" style="color:white; text-decoration:none;">Edit</a></button></td>
                        <td><button type="submit" class="btn btn-danger"><a href="delete.php?id=<?php echo $row['id']; ?>" style="color:yellow; text-decoration:none;">Delete</a></button></td>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No Products Available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php $conn->close(); ?>
