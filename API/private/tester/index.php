<?php
// Requesting the conexion
require_once('../conexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        article {
            width: 80vw;
            margin: 10% auto;
            border-radius: 2%;
            padding: 5px
        }
    </style>
    <title>Document</title>

</head>
<body style="background-color: #fefefe; font-family: Arial, sans-serif; color: black; text-align: center;">
<?php

if ($con_string->connect_error) {
    die("Connection failed: " . $con_string->connect_error);
};
    //echo '<h1 style="color: black; margin: 15% auto; text-align: center; font-weight: 20px;">Connected succesfully</h1>';
    //! Conexion was FULLY tested ...

    $sql = "SELECT * FROM diary_note_space_";
    // Execute the SQL query
    $result = $con_string->query($sql);

    // Process the result set
    if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()):
    
?>

<article>
<h1>
    <?php echo $row["title"]; ?>
</h1>

<aside>
    <p><?php echo $row["text_space_"]; ?></p>
</aside>
</article>
<?php
    
    endwhile;

    if($row = $result->fetch_assoc()) {
        echo "0 results";
    }
};

// Conexion got RESULTS successfully.
mysqli_close($con_string); // Is a good practice to close the conexion.
?>
</body>
</html>



