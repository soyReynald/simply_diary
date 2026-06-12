<?php
require_once(__DIR__ . "/../API/private/conexion.php");

class InsertData {
    private $text_from_diary;

    public function __construct(string $queryVariable) {
        $this->text_from_diary = $queryVariable;
    }

    function insertData () {
        $this->string = "INSERT INTO diary_note_space_ (`text_space_`) VALUES ('{$this->text_from_diary}')";
        if ($con_string->query($this->text_from_diary) === TRUE) { // THIS COMPARISON: Is needed.
            echo "Data inserted"; // TO TEST this part
            // we then refresh
        } else {
            die("Error".$con_string->error_reporting); //! to fix the con string from this class
        }

        $con_string->close();
    }
}

?>