<?php
require_once("./API/private/conexion.php");

/// THIS FILE SHOULD BE CALLED: DataController.php.

class Data {
    public string $string;

    function selectData () {
        return $this->string = "SELECT * FROM diary_note_space_";
    }

    function return_details_(string $functionality) {
        if($this->selectData() && $functionality == "print_data") {
            return $this->selectData();
        }
    }
}


if(isset($_GET['delete_id'])){ 

    $id = mysqli_real_escape_string($con_string, $_GET['delete_id'] ?? null);

    $testing_statement = <<<SQL_STATEMENT
    "DELETE from diary_note_space_ WHERE id = '{$id}'"
    SQL_STATEMENT;

    echo $testing_statement;

}


?>