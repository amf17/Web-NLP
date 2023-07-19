# Web-NLP

## First file Robot_control

```
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title> Control Panel</title>

        <style>
            body {
                background-color: #000000;
                font-family: Arial, sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                }

                form {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    grid-gap: 10px;
                    justify-items: center;
                    align-items: center;
                }

                input[type="submit"] {
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    background-color: #007BFF;
                    color: rgb(182, 183, 224);
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }

                input[type="submit"]:hover {
                    background-color: #1d3650;
                }

                input[value="forward"] {
                    grid-column: 2;
                    grid-row: 1;
                }

                input[value="left"] {
                    grid-column: 1;
                    grid-row: 2;
                }

                input[value="stop"] {
                    grid-column: 2;
                    grid-row: 2;
                }

                input[value="right"] {
                    grid-column: 3;
                    grid-row: 2;
                }

                input[value="backward"] {
                    grid-column: 2;
                    grid-row: 3;
                }
        </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

<body>

    <form  method="post" action="savingfile.php" >

        <input type="submit" name="button" value="right">
        <input type="submit" name="button" value="left"> 
        <input type="submit" name="button" value="forward">
        <input type="submit" name="button" value="backward">
        <input type="submit" name="button" value="stop">
    </form>
    
</body>
</html>
```
The provided code is an HTML document that represents a control panel. It consists of a form with directional buttons (forward, left, stop, right, backward) used to control some device or system. When a button is clicked, the form will be submitted to a PHP script called "savingfile.php" using the POST method.

The CSS styles in the `<style>` tags define the appearance of the control panel. It sets a black background color for the body, uses the Arial font, and centers the content vertically and horizontally. The form is displayed as a grid with three columns and several rows. The buttons are styled with background colors, and a hover effect is added to the submit button.

The control panel is designed to be visually appealing and functional, but without the PHP script ("savingfile.php") and the corresponding server-side code, the form submission will not perform any action. To make the control panel functional, you would need to implement the server-side logic in "savingfile.php" to handle the form submission and perform the desired actions based on the button clicked.

![image](https://github.com/amf17/Web-NLP/assets/139582388/92b0f6e3-2776-4972-a5a7-a9f77125ffa5)

## second file savingfile.php

```
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "robot_control";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $data = $_POST['button'];

    $sql = "INSERT INTO robot_movement (direction_robot) VALUES ('$data')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "SELECT robot_movement FROM robot_movement ORDER BY id DESC LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION["lastInsertedValue"] = $row["robot_movement"];
        }
    } else {
        echo "No results";
    }

    $conn->close();

    header("Location: Display_12.php");
?>
```

The provided code is a PHP script that handles the form submission from the HTML control panel and interacts with a MySQL database.

php code to store directions on the database when one of the five buttons is clicked. Image showing the database after clicking on the buttons:

![image](https://github.com/amf17/Web-NLP/assets/139582388/5c8f0704-fa1e-4a6a-a6ee-13b810d8efc7)

## third file Display_12
```
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
```
The provided code is a PHP script that starts a session and displays the last inserted value from the `$_SESSION["lastInsertedValue"]` variable in an HTML page.

To use this code, make sure that the previous script has been executed and the `$_SESSION["lastInsertedValue"]` variable is set correctly. When you access the "Display Page," it will show the value stored in the session variable.

php code that retrieves the last direction stored in the database.
![image](https://github.com/amf17/Web-NLP/assets/139582388/1bab8b74-8cc0-4993-8b72-5c17c57c5706)




