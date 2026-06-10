<?php

/// THIS FILE SHOULD BE CALLED: DataController.php
// To be updated: 6/14/2026.

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

?>