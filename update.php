<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM guestbook_entries WHERE id=$id";
$result = $conn->query($sql);
$entry = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    $sql = "UPDATE guestbook_entries SET name='$name', message='$message' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Update Entry</h1>

    <!-- Update Guestbook Entry Form -->
    <form method="POST" action="" class="mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $entry['name'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea class="form-control" name="message" id="message" rows="3" required><?= $entry['message'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Entry</button>
    </form>
</div>
</body>
</html>

<?php $conn->close(); ?>
