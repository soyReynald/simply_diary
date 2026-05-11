<?php

class data {
    public string $string;

    function selectData () {
        return $this->string = "SELECT * FROM diary_note_space_";
    }

    function return_details_(string $functionality) {
        if($this->selectData() & $functionality == "print_data") {
            $this->selectData();
        }
    }
}

?>