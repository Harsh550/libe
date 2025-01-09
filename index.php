<?php
include 'db.php';

// Fetch all books
$result = $conn->query("SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Library Management</h1>
    <a href="create.php" class="btn">Add New Book</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= htmlspecialchars($row['author']) ?></td>
                <td><?= htmlspecialchars($row['genre']) ?></td>
                <td><?= $row['published_year'] ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id'] ?>" class="btn-update">Update</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
