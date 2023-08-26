<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="trialforum.css">
    <title>Discussion</title>
</head>
<body>
    <header>
        <h1>Discussion Forum</h1>
        <nav>
            <ul>
                <li><a href="forumtrial.php">Forum</a></li>
                <li><a href='index.html'>Home Page</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="discussion-content1">
            <?php
            // Fetch and display the selected discussion thread from the database
            $conn = new mysqli("localhost", "root", "root", "upcycletext");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_GET['id'])) {
                $discussionId = $_GET['id'];
                $sql = "SELECT * FROM discussions WHERE id = $discussionId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<h2>' . $row['title'] . ' (id no. '. $discussionId . ') : ' . '</h2>';
                    echo '<h3>' . $row['description'] . '</h3>';
                } else {
                    echo '<p>Discussion not found.</p>';
                }
            } else {
                echo '<p>Discussion ID not provided.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>

    <div class="container"> 
        <div class="discussion-content">
            <?php
            // Fetch and display the selected discussion thread from the database
            $conn = new mysqli("localhost", "root", "root", "upcycletext");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_GET['id'])) {
                $discussionId = $_GET['id'];
                $sql = "SELECT * FROM comments WHERE id = $discussionId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<p>' . $row['username'] . ': ' . $row['description'];
                } else {
                    echo '<p>Comments not found.</p>';
                }
            } else {
                echo '<p>Discussion ID not provided.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div> 

    <div class="container"> 
    <div class="new-discussion">
            <h2>Join the Discussion!</h2>
            <form action="createcomment.php" method="post">
                <input type="text" name="id" placeholder="Id_number"required>
                <input type="text" name="dusername" placeholder="Username"required>
                <input type="text" name="dtitle" placeholder="Discussion Title" required>
                <textarea name="ddescription" placeholder="Comments" rows="4" required></textarea>
                <button type="submit">Create comment</button>
            </form>
    </div>
    </div>


    <footer>
        <p>&copy; <?php echo date("Y"); ?> Discussion Forum</p>
    </footer>
</body>
</html>
