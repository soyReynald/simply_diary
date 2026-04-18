<?php
// Requesting the conexion
require_once('../conexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: #c03e3e; font-family: Arial, sans-serif;">
<?php

if ($con_string->connect_error) {
    die("Connection failed: " . $con_string->connect_error);
    exit();
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


<h1>
    <?php echo $row["title"]; ?>
</h1>

<main>
    <p><?php echo $row["text_space_"]; ?></p>
</main>

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



