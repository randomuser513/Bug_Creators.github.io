<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade Item Form</title>
    <link rel="stylesheet" href="trading_page2.css">
</head>
<body>
    <header>
        <h1>Upcycle Text</h1>
        <nav>
            <ul>
                <li><a href='trading_page1.php'>Browse</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="form-feature">
            <h2>Submit Item for Trade</h2>
            <form action="tradingform_process.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="item_name">Name of Item:</label>
                    <input type="text" id="item_name" name="item_name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description of Item:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="size">Size (if any):</label>
                    <input type="text" id="size" name="size">
                </div>
                <div class="form-group">
                    <label for="item_image">Picture of Item:</label>
                    <input type="file" id="item_image" name="item_image" accept="image/*" required>
                </div>
                <button type="submit">Submit</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Upcycle Text</p>
    </footer>
</body>
</html>





