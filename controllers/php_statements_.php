<?php
require_once(__DIR__ . "/../API/private/conexion.php");
// header('Content-Type: application/json'); 

class Data {
    public string $string;
    public $con_string;
    protected string $result;

    function __construct($con_string) {
        $this->con_string = $con_string;
    }

    function selectData () {
        return $this->string = "SELECT * FROM diary_note_space_"; //🙏🪶😇 to remove the * from here.
    }

    function return_details_(string $functionality) {
        if($this->selectData() && $functionality == "print_data") {
            return $this->selectData();
        }
    }

    function deleteData (int $id, mysqli $con_string) {
        $id = mysqli_real_escape_string($con_string, $_GET['delete_id'] ?? null);
        
        // testing encriptations
        if (urlencode($id)) {
            $id_encoded = 0; // IS NOT corrupted
        } else {
            $id_coded = 1; // IS corrupted
        } // IS ALMOST EQUAL: $id_encoded !== urlencode($_GET['delete_id']) ? 0 : 1;

        if ($id_encoded === 0) { // 0: means 0 errors.
            $this->result = "DELETE from diary_note_space_ WHERE id = '{$id}'";
        } else {
            echo "Sorry, we catched you.";
            exit();
        }


        $sql_query = $this->con_string->query($this->result);
        if ($sql_query === TRUE) { 
            echo "Data deleted"; 
            sleep(5);
            header("Location: ../index.php");
            // we then refresh ✨
        } else {
            die("Error"); 
        }

        $this->con_string->close();
    }

    // make this function and CLASS above more secure with the security standards.
    function updateData (int $id, mysqli $con_string, string $text_string_, string $title) {
        $id = mysqli_real_escape_string($con_string, $_GET['update_id'] ?? null);
        $text_string_ = trim(mysqli_real_escape_string($con_string, $_GET['diary_text'] ?? null)); // To check this string.
        $text_string_title = mysqli_real_escape_string($con_string, $_GET['title_'] ?? null);

        $diary_title = urlencode($text_string_title);
        
        //👍😊 TO test here AND to ensure the DATA trough the method to clean the variables and the query.
        $this->result = "UPDATE diary_note_space_ SET text_space_ = '{$text_string_}', title = '{$text_string_title}' WHERE id = '{$id}'";

        $sql_query = null;

        $security_test = $diary_title !== urlencode($_GET['title_']) ? 0 : 1;
        
        if (isset($diary_title) && $security_test && $sql_query == null) { // The operator !== means: NOT CHANGED.
            
            if ($sql_query == null) {
                $sql_query = $this->con_string->query($this->result);
            }

            if($sql_query == null) {
                echo "Sorry, we got you";
                exit();
            }
            
        }
        
        if  ($sql_query === TRUE) { 
            echo "Data updated"; // TO TEST this part.
            sleep(5);
            header("Location: ../index.php");
            // we then refresh ✨
        } else {
            die("Error"); 
        }

        $this->con_string->close();
    }
};

// LAW of importancy:
// 1. Urgently and important ===  usually first.
// 2. Urgently not important (sometimes is MORE than important) === usually first.
// 3. Not urgent yet: Important - more strictly important.
// 4. Important and not urgent - could be placed in pause...

// DELETE section
if(isset($_GET['delete_id'])){ 

    $id = mysqli_real_escape_string($con_string, $_GET['delete_id']);

    $data = new Data($con_string);
    $data->deleteData($id, $con_string);

    // return json_encode($testing_statement, JSON_PRETTY_PRINT );

}
// END of DELETE section.

// ----
// UPDATE section - IN progress HERE...
if(isset($_GET['update_id']) && isset($_GET['diary_text']) && isset($_GET['title_'])) { // ! To correct this to be POST in a future. 

    $id = mysqli_real_escape_string($con_string, $_GET['update_id']);
    $text = mysqli_real_escape_string($con_string, $_GET['diary_text']);
    $title = mysqli_real_escape_string($con_string, $_GET['title_']);

    $data = new Data($con_string);
    $data->updateData($id, $con_string, $text, $title);

    // return json_encode($testing_statement, JSON_PRETTY_PRINT );

};
// ----

?>