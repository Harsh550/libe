<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$book = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    if (empty($title) || empty($author) || empty($genre) || empty($year)) {
        $error = "All fields are required!";
    } else {
        $stmt = $conn->prepare("UPDATE books SET title=?, author=?, genre=?, published_year=? WHERE id=?");
        $stmt->bind_param('sssii', $title, $author, $genre, $year, $id);
        $stmt->execute();
        header('Location: index.php');
        exit;
    }
}
?>

<form method="POST">
    <input type="text" name="title" value="<?= $book['title'] ?>" required>
    <input type="text" name="author" value="<?= $book['author'] ?>" required>
    <input type="text" name="genre" value="<?= $book['genre'] ?>" required>
    <input type="number" name="year" value="<?= $book['published_year'] ?>" required>
    <button type="submit">Update Book</button>
</form>
