<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    if (empty($title) || empty($author) || empty($genre) || empty($year)) {
        $error = "All fields are required!";
    } else {
        $stmt = $conn->prepare("INSERT INTO books (title, author, genre, published_year) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('sssi', $title, $author, $genre, $year);
        $stmt->execute();
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add New Book</h1>
    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="text" name="genre" placeholder="Genre" required>
        <input type="number" name="year" placeholder="Published Year" required>
        <button type="submit">Add Book</button>
    </form>
</body>
</html>
