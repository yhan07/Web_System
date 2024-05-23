<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookWormer Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header {
            background-color: #d2a478;
            color: #ffffff;
            padding: 20px;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header img {
            height: 50px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .navbar {
            background-color: #d2a478;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            width: 100%;
            max-width: 1200px;
        }
        .book-item {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 10px;
        }
        .book-item img {
            max-width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }
        .sidebar {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }
        .search-section {
            width: 200px;
            margin-bottom: 20px;
        }
        .search-section select,
        .search-section input,
        .search-section button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .categories {
            margin: 20px 0;
        }
        .footer {
            background-color: #1a3c40;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .footer a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="images/logo.svg" alt="BookWormer Logo">
        <div class="navbar">
        <a href="index.php">Home</a>
    </div>
    </div>
  
    <div class="content">
        <div class="book-grid">
            <div class="book-item">
                <img src="images/book1.jpg" alt="The Great Indian Novel">
                <p>The Great Indian Novel</p>
            </div>
            <div class="book-item">
                <img src="images/book2.jpg" alt="Epic">
                <p>Epic</p>
            </div>
            <div class="book-item">
                <img src="images/book3.jpg" alt="The Lightning Thief">
                <p>The Lightning Thief</p>
            </div>
            <div class="book-item">
                <img src="images/book4.jpg" alt="The Imposter">
                <p>The Imposter</p>
            </div>
            <div class="book-item">
                <img src="images/book5.jpg" alt="Magic and Mayhem">
                <p>Magic and Mayhem</p>
            </div>
            <div class="book-item">
                <img src="images/book6.jpg" alt="The Red Tent">
                <p>The Red Tent</p>
            </div>
            <div class="book-item">
                <img src="images/book7.jpg" alt="Fitness & Health">
                <p>Fitness & Health</p>
            </div>
            <div class="book-item">
                <img src="images/book8.jpg" alt="Steve Jobs">
                <p>Steve Jobs</p>
            </div>
            <div class="book-item">
                <img src="images/book9.jpg" alt="Bedtime Stories">
                <p>Bedtime Stories</p>
            </div>
            <div class="book-item">
                <img src="images/book10.jpg" alt="Traditional Tales Collections">
                <p>Traditional Tales Collections</p>
            </div>
        </div>
        <div class="sidebar">
            <div class="search-section">
                <h3>Search</h3>
                <select>
                    <option>Select Category</option>
                </select>
                <select>
                    <option>Select Author</option>
                </select>
                <select>
                    <option>Select Language</option>
                </select>
                <input type="text" placeholder="Title">
                <button>Search</button>
            </div>
            <div class="categories">
                <h3>Categories</h3>
                <p>Fantasy</p>
                <p>Research</p>
                <p>Graphic Novel</p>
                <p>Historical Fiction</p>
                <p>Fitness and Health</p>
                <p>Biography / Memoirs</p>
                <p>Anthology / Short Stories</p>
            </div>
        </div>
    </div>
    <div class="footer">
        <div>BookWormer</div>
        <div>
            <a href="#">Facebook</a> | <a href="#">Instagram</a>
        </div>
        <div>Contact Us: bcnp.admin@gmail.com</div>
    </div>
</body>
</html>
