<?php
require_once(__DIR__ . "/../API/private/conexion.php");

class InsertData {
    public $text_from_diary;
    public $con_string;
    private $sql;

    private $sample_user = '1';
    private $title = "Sample Title FROM front-end";

    public function __construct($text_from_diary, $con_string) {
        $this->text_from_diary = $text_from_diary;
        $this->con_string = $con_string;
    }

    function insertData_function ($text_from_diary, $con_string) {
        $this->sql = "INSERT INTO `diary_note_space_` (`text_space_`, `user_id_related`, `date`, `title`) VALUES ('{$this->text_from_diary}', $this->sample_user, current_timestamp(), '{$this->title}')";
        $result = $this->con_string->query($this->sql);
        if ($result === TRUE) { 
            echo "Data inserted"; // TO TEST this part.
            // we then refresh
        } else {
            die("Error"); 
        }

        $this->con_string->close(); // TO FIX con_string variable in the next video
    }
}

if(isset($_POST) && isset($_POST['diary_text'])) {
    $text_to_diary = mysqli_real_escape_string($con_string, $_POST['diary_text']);

    $text_from_diary = $_POST['diary_text'];
    $insertData = new InsertData($text_from_diary, $con_string);
    $insertData->insertData_function($text_to_diary, $con_string);
}
