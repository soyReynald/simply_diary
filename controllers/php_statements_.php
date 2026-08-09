<?php
require_once(__DIR__ . "/../API/private/conexion.php");
// header('Content-Type: application/json');

/// THIS FILE SHOULD BE CALLED: DataController.php.

class Data {
    public string $string;
    public $con_string;
    protected string $result;

    function __construct($con_string) {
        $this->con_string = $con_string;
    }

    function selectData () {
        return $this->string = "SELECT * FROM diary_note_space_";
    }

    function return_details_(string $functionality) {
        if($this->selectData() && $functionality == "print_data") {
            return $this->selectData();
        }
    }

    function deleteData (int $id, mysqli $con_string) {
        $id = mysqli_real_escape_string($con_string, $_GET['delete_id'] ?? null);

        $this->result = "DELETE from diary_note_space_ WHERE id = '{$id}'";

        $sql_query = $this->con_string->query($this->result);
        if ($sql_query === TRUE) { 
            echo "Data deleted"; 
            // we then refresh ✨
        } else {
            die("Error"); 
        }

        $this->con_string->close(); // TO FIX con_string variable in the next video
    }

    function updateData (int $id, mysqli $con_string, string $text_string_) {
        $id = mysqli_real_escape_string($con_string, $_GET['update_data_id'] ?? null);
        $text_string_ = mysqli_real_escape_string($con_string, $_GET['update_data_text'] ?? null);
        // To-do: to study the UPDATE statement in SQL and implement it here.
        $this->result = <<<INPUT
        UPDATE diary_note_space_
        SET text_space_ = '{$text_string_}'
        WHERE id = '{$id}'
        INPUT;

        $sql_query = $this->con_string->query($this->result);
        if ($sql_query === TRUE) { 
            echo "Data updated"; // TO TEST this part.
            // we then refresh ✨
        } else {
            die("Error"); 
        }

        $this->con_string->close(); // TO FIX con_string variable in the next video
    }
}

// DELETE section
// UPDATE section - IN progress 50% of 100% done.

if(isset($_GET['delete_id'])){ 

    $id = mysqli_real_escape_string($con_string, $_GET['delete_id']);

    $data = new Data($con_string);
    $data->deleteData($id, $con_string);

    // return json_encode($testing_statement, JSON_PRETTY_PRINT );

}

// END of DELETE section.

?>