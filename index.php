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
    function activate_editable (id) {

        var id = id;
        
        // Next tutorial: document.querySelector("main").childNodes; [to get the child from main]

        // TO UPDATE.

        var direct_id = document.querySelector("main").childNodes[id].id;

        document.querySelector("#delete_btn").setAttribute("aria-disabled", "true");
        document.querySelector("#delete_btn").setAttribute("href", "javascript:void(0)");


        // AFTER the edition
        // FIX this that needs double click... 
        var idToEdit = id.toString();
        editate_text(idToEdit);
    }

    function editate_text (id) {
        var id = id.toString();
        var elementToChoose = ("diary_showcase_#_" + id).toString();
        var direct_id = document.getElementById(elementToChoose).getAttribute("id");

        const regex = /^diary_showcase_/;
        var length_of_sections = document.querySelector("main").childNodes.length;

        var count = 1;

        let elementChose;

        while (count <= length_of_sections) {
            if(regex.test(direct_id)) // Starting with: diary_showcase_ [In cycle process]
            {
                elementChose = document.getElementById(elementToChoose);
                elementChose.childNodes[5].setAttribute("contenteditable", true);
                elementChose.childNodes[8].setAttribute("contenteditable", true);

                elementChose.style.backgroundColor = "white";
                elementChose.style.color = "black";
                elementChose.childNodes[1].style.color = "white";
                elementChose.childNodes[12].style.color = "black";
                elementChose.childNodes[12].style.backgroundColor = "white";
                elementChose.childNodes[12].style.border = "black";
                elementChose.childNodes[12].style.borderRadius = "5px";

                elementChose.childNodes[12].style.borderColor = "black";
                elementChose.childNodes[12].style.borderStyle = "solid";
                elementChose.childNodes[12].style.borderWidth = "1px";

                count = length_of_sections + 1; // To break the loop
            } else {
                console.log("Is not present");
                count++;
            }
        };

        //🪶 TO send the UPDATE with an EVENT LISTENER - NEXT task.
        // sendUpdate(id, count); // TO remove later.
        var elementToChoose = ("diary_showcase_#_" + id).toString();
        var elementChoseTOchangeBTN = undefined;
        elementChoseTOchangeBTN = elementChose.querySelector("#update_btn");
        elementChoseTOchangeBTN.addEventListener("click", function() {
            sendUpdate(id, count)
        });

    }

    function sendUpdate(id, max_count) {
        var elementToChoose = ("diary_showcase_#_" + id).toString();
        elementChose = document.getElementById(elementToChoose);
        var max_count = max_count;
        
        let btn_to_update = elementChose.querySelector("#update_btn");
        
        //🪶 TO send the UPDATE with an EVENT LISTENER - NEXT task.
        
        let count = localStorage.setItem("count", "0");

        let sum = Number(localStorage.getItem("count")) + 1;
        let max_count_in_this_scope = Number(max_count) + 1;

        if (sum >= 0 && max_count < max_count_in_this_scope ) {
            max_count_in_this_scope = Number(max_count) + 1;
            window.location.href = "/test/";
        };

    };
</script>

</html>
<?php
    // Conexion got RESULTS successfully.
    mysqli_close($con_string); // Is a good practice to close the conexion.
?>
