<?php
require_once(__DIR__ . "/../API/private/conexion.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


class InsertData {
    public $title;
    public $text_from_diary;
    public $con_string;
    private $smtp;

    private $sample_user = '1';

    public function __construct($text_from_diary, $title, $con_string) {
        $this->title = $title;
        $this->text_from_diary = $text_from_diary;
        $this->con_string = $con_string;
    }

    function insertData_function (string $text_from_diary, string $title, mysqli $con_string) {
        try {
            $sql = "INSERT INTO `diary_note_space_` (`text_space_`, `user_id_related`, `date`, `title`) VALUES (?, ?, current_timestamp(), ?)";
            /* bind parameters for markers */
            $smtp = $con_string->prepare($sql);

            //🙅‍♂️📌🫷Three is sign: STREGTH.
            $smtp->bind_param("sss", $this->text_from_diary, $this->sample_user, $this->title);

            /* execute query */
            $smtp->execute();

            echo "User text is inserted";

    
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        

        $this->con_string->close(); // TO FIX con_string variable in the next video
    }
}

// GETTING THE DATA and INSERTING in the database TROUGH the call of the method insertData_function() of the class InsertData.
if(isset($_POST) && isset($_POST['diary_text']) && isset($_POST['diary_title'])) {
    // Sometimes the POST global data is lost after some refreshes (which is normal).

    $text_to_diary = mysqli_real_escape_string($con_string, $_POST['diary_text']);
    $title_to_diary = mysqli_real_escape_string($con_string, $_POST['diary_title']);

    // $text_from_diary = $_POST['diary_text'];
    // $title_from_diary = $_POST['diary_title'];
    $insertData = new InsertData($text_to_diary, $title_to_diary,  $con_string);
    $insertData->insertData_function($text_to_diary, $title_to_diary, $con_string);
}
