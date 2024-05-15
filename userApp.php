<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="userApp.css"> -->
    <title>Notification Button</title>
    
    <style>

        body {
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.block {
    width: 60%;
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s;
    position: relative; /* Add position relative to enable absolute positioning within */
}

.block:hover {
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
}

.block h3 {
    margin-top: 0;
}

.view-more {
    position: absolute;
    bottom: 10px;
    right: 10px;
}

.view-more a {
    background-color: #007bff;
    color: #fff;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 3px;
}

.view-more a:hover {
    background-color: #0056b3;
}


        .notification-button {
            position: absolute;
            top: 20px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .notification-button:hover {
            background-color: #e0e0e0;
        }

        .notification-button svg {
            width: 30px;
            height: 30px;
        }


        .notification-list {
            position: absolute;
            top: 80px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
            width: 200px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            z-index: 1000;
            display: <?php echo isset($_GET['showNotifications']) ? 'block' : 'none'; ?>;
        }

        .notification-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .notification-list li {
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }

        .notification-list li:last-child {
            border-bottom: none;
        }

        .welcome-message {
            position: absolute;
            top: 20px; /* Adjust as needed */
            left: 20px; /* Adjust as needed */
            font-size: 1.5em;
            color: #333;
        }
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 320px;


        }

        .btn-group {
            display: flex;
        }

        .btn {
            width: 200px;
            height: 60px;
            font-size: 20px;
            margin: 200 10px; 
        }

        

    </style>
</head>
<body>
    <?php
    // Count the number of notifications
    $notificationCount = 0;
    if (file_exists('notification.txt')) {
        $file = fopen('notification.txt', 'r');
        while (($line = fgets($file)) !== false) {
            $notificationCount++;
        }
        fclose($file);
    }
    ?>

    <div class="notification-button">
        <a href="?<?php if(isset($_GET['showNotifications'])) echo ''; else echo 'showNotifications=1'; ?><?php if(isset($_GET['Username'])) echo '&Username=' . urlencode($_GET['Username']); ?>">
            <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 24C10.8954 24 10 23.1046 10 22H14C14 23.1046 13.1046 24 12 24ZM18 17H6C5.44772 17 5 16.5523 5 16C5 15.4477 5.44772 15 6 15H7V10C7 6.13401 9.13401 3 12 3C14.866 3 17 6.13401 17 10V15H18C18.5523 15 19 15.4477 19 16C19 16.5523 18.5523 17 18 17ZM12 1C8.13401 1 5 4.13401 5 8V13H3C2.44772 13 2 13.4477 2 14C2 14.5523 2.44772 15 3 15H21C21.5523 15 22 14.5523 22 14C22 13.4477 21.5523 13 21 13H19V8C19 4.13401 15.866 1 12 1Z" fill="black"/>
            </svg>
            <?php if ($notificationCount > 0 && !isset($_GET['showNotifications'])): ?>
                <span style="position: absolute; top: 10px; right: 10px; background-color: red; color: white; border-radius: 50%; padding: 2px 4px;"><?php echo $notificationCount; ?></span>

            <?php endif; ?>
        </a>
    </div>

    <?php
    // Display the list of notifications if the showNotifications parameter is set
    if (isset($_GET['showNotifications'])) {
        $notifications = [];
        if (file_exists('notification.txt')) {
            $file = fopen('notification.txt', 'r');
            while (($line = fgets($file)) !== false) {
                $notifications[] = trim($line);
            }
            fclose($file);
        }
        echo "<div class='notification-list'>";
        echo "<ul>";
        foreach ($notifications as $notification) {
            echo "<li>$notification</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
    ?>

    <div class="welcome-message">
        <?php
        // Display the welcome message with the user's name if provided
        if (isset($_GET['Username'])) {
            $userName = htmlspecialchars($_GET['Username']);
            echo "Welcome, $userName!";
        }
        ?>
        <br>
    <div class="container">
        <div class="block">
            <h3>Donations</h3>
            <p>Description of Donations block.</p>
            <div class="view-more">
                <a href="donations.php">View More</a>
            </div>
        </div>
        <div class="block">
            <h3>Volunteering Opportunities</h3>
            <p>Description of Volunteering Opportunities block.</p>
            <div class="view-more">
                <a href="volunteering_opportunities.php">View More</a>
            </div>
        </div>
        <div class="block">
            <h3>Events</h3>
            <p>Description of Events block.</p>
            <div class="view-more">
                <a href="events.php">View More</a>
            </div>
        </div>
        <div class="block">
            <h3>Articles</h3>
            <p>Description of Articles block.</p>
            <div class="view-more">
                <a href="articles.php">View More</a>
            </div>
        </div>
    </div>
</body>
</html>

<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <style>
        body {
            margin: 0;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: space-between;
            width: 90%;
            height: 60%;
        }

        .block {
            position: relative;
            width: 23%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .block:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .block h3 {
            margin-top: 0;
        }

        .view-more {
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

        .view-more a {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }

        .view-more a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="block">
            <h3>Donations</h3>
            <p>Description of Donations block.</p>
            <div class="view-more">
                <a href="donations.php">View More</a>
            </div>
        </div>
        <div class="block">
            <h3>Volunteering Opportunities</h3>
            <p>Description of Volunteering Opportunities block.</p>
            <div class="view-more">
                <a href="volunteering_opportunities.php">View More</a>
            </div>
        </div>
        <div class="block">
            <h3>Events</h3>
            <p>Description of Events block.</p>
            <div class="view-more">
                <a href="events.php">View More</a>
            </div>
        </div>
        <div class="block">
            <h3>Articles</h3>
            <p>Description of Articles block.</p>
            <div class="view-more">
                <a href="articles.php">View More</a>
            </div>
        </div>
    </div>
</body>
</html> --> 
