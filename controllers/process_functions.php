<?php
require_once(__DIR__ . "/../API/private/conexion.php");

// $sample_variable = mysqli_real_escape_string();

class InsertData {
    public string $string;

    function insertData () {

        /*
            INSERT INTO diary_note_space_ (``, ``, ``) 
            VALUES (``, ``, ``)

            ## Next tutorial we exchange the STRING bellow 👇🏻
            ## from the database.
        */
        return $this->string = "";
    }

    // function return_details_(string $functionality) {
    //     if($this->insertData() && $functionality == "print_data") {
    //         return $this->insertData();
    //     }
    // }
}
/*


$title = $_POST['text_title'];
$user_name = $_SESSION['name'];


$sql = "";

if ($conexion->query($sql) === TRUE) { // THIS COMPARISON: Is needed.
    echo "Data inserted";
    // we then refresh
} else {
    die("Error".$conexion->error_reporting);
}

$conexion->close();

*/
?>