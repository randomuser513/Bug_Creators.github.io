<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="trialforum.css">
    <title>Discussion Forum</title>
</head>
<body>
    <header>
        <h1>Discussion Forum</h1>
        <nav>
            <ul>
                <li><a href='index.html'>Home Page</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="discussion-list">
            <h2>Discussions</h2>
            <ul class="discussion-items">
                <?php
                // Fetch and display discussions from the database
                $conn = new mysqli("localhost", "root", "root", "upcycletext");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM discussions";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="discussion-item">';
                        echo '<a href="discussion.php?id=' . $row['id'] . '"><h3>' . $row['title'] . '</h3></a>';
                        echo '</li>';
                    }
                } else {
                    echo '<p><br> No discussions found. </br></p>';
                }

                $conn->close();
                ?>
            </ul>
        </div>
        <div class="new-discussion">
            <h2>Create a New Discussion</h2>
            <form action="create_discussion.php" method="post">
                <input type="text" name="username" placeholder="Username"required>
                <input type="text" name="title" placeholder="Discussion Title" required>
                <textarea name="description" placeholder="Discussion Description" rows="4" required></textarea>
                <button type="submit">Create Discussion</button>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Discussion Forum</p>
    </footer>
</body>
</html>

