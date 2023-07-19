<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Display Page</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        p {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>

<body>
    <p>Last inserted value: <?php echo $_SESSION["lastInsertedValue"]; ?></p>
</body>
</html>