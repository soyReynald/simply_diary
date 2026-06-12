<?php
require_once(__DIR__ . "/../API/private/conexion.php");

class InsertData {
    public $text_from_diary;
    public $con_string;
    private $sql;

    public function __construct(string $text_from_diary, mysqli $con_string) {
        $this->text_from_diary = $text_from_diary;
        $this->con_string = $con_string;
    }

    function insertData_function (string $text_from_diary, mysqli $con_string) {
        $this->sql = "INSERT INTO diary_note_space_ (`text_space_`) VALUES ('{$this->text_from_diary}')";
        if ($this->$con_string->query($this->sql) === TRUE) { 
            echo "Data inserted"; // TO TEST this part.
            // we then refresh
        } else {
            die("Error"); 
        }

        $con_string->close(); // TO FIX con_string variable in the next video
    }
}

if(isset($_POST) && isset($_POST['diary_text'])) {
    $text_to_diary = mysqli_real_escape_string($con_string, $_POST['diary_text']);

    $text_from_diary = $_POST['diary_text'];
    $insertData = new InsertData($text_from_diary, $con_string);
    $insertData->insertData_function($text_to_diary, $con_string);
}
