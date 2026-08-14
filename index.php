<?php
// Requesting the conexion
require_once('API/private/conexion.php');

?>
<!DOCTYPE html>
<html lang="en" version="5">
<!-- Commentary to place the date of every update: Up today: 4/15/2026; Had to reset the computer. -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary to save texts</title>
    <link rel="icon" type="image/x-icon" href="">
    <link rel="stylesheet" href="main.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <header>
        <span>
            <span id="date"><?=  date("F j, Y"); ?></span>
        </span>
        <img src="public/img/logo_design.png" />
    </header>
    <main>
        <!-- Section to insert text -->
        <section id="text_saver">
            <form action="./controllers/InsertDataClass.php" method="POST"> <!-- Done: 6/10/2026 -->
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                            <div class="col-span-full">
                                <label for="diary_title" class="block text-sm/6 font-medium text-white-900">Diary title:</label>                                
                                <div class="mt-2">
                                    <input type="text" name="diary_title" id="diary_title"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-white-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-white-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                    
                            </div>
                            <div class="col-span-full">
                                <label for="diary_text" class="block text-sm/6 font-medium text-white-900">Diary text:</label>                                
                                <div class="mt-2">
                                    <textarea id="diary_text" name="diary_text" rows="3"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                        
                                    </textarea>
                                </div>
                               
                                <p class="mt-3 text-sm/6 text-gray-600">
                                        
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>

        </section>
         <?php

         include_once("views/diary_text_view.php");

         ?>

    </main>
    
    
</body>

<script type="text/javascript">
    function activate_editable () {
        // ES: Php, C.

        // EN: Python, Java.

        // Hindi: JS, C++ [extra liked language: PHP].

        // Portuguese: Pascal, Cobol, Go, ...
        
        // Chinese/Japan: JS, SQL, ...

        // TO UPDATE.
        document.querySelector("#diary_showcase_ p").setAttribute("contenteditable", true);
        document.querySelector("#diary_showcase_ h1").setAttribute("contenteditable", true);

        document.querySelector("#diary_showcase_").setAttribute("style", "color: #000; background-color: #fff");
        document.querySelector("#diary_showcase_ span").setAttribute("style", "color: #fff;");
        document.querySelector("#delete_btn").setAttribute("aria-disabled", "true");
        document.querySelector("#delete_btn").setAttribute("href", "javascript:void(0)");

        document.querySelector("#diary_showcase_").classList.add("text_being_edited");

        // AFTER the edition
        document.querySelector("#update_btn").setAttribute("onclick", "javascript:editate_text()");
        
    }

    function editate_text () {
        var testVar = document.querySelector("#diary_showcase_").classList.contains("text_being_edited");

        if (testVar) {
            var id_to_update = parseInt(document.querySelector("#update_id_text").innerHTML);
            var text_to_update = document.querySelector("#text_to_update").innerHTML;

            // update button option
            /// To test HERE...
            window.location.href= './controllers/php_statements_.php?update_id='+id_to_update+'&text_to_update='+text_to_update;
        }
       
    }
</script>

</html>
<?php
    // Conexion got RESULTS successfully.
    mysqli_close($con_string); // Is a good practice to close the conexion.
?>
