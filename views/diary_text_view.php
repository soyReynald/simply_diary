<?php
        include_once("../simply_diary/controllers/php_statements_.php");

        if ($con_string->connect_error) {
            die("Connection failed: " . $con_string->connect_error);
        };

            $Sql_query = new Data();
            
            // Execute the SQL query
            $result = $con_string->query($Sql_query->return_details_("print_data"));

            // Process the result set
            if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $date_from_diary_article = new DateTime($row['date']);
                 
                echo "<section id='diary_showcase_'>
            
                        <span>Diary article date: 
                    ".
                     $date_from_diary_article->format("F d, Y")
                    ."
                        </span>
                        
                        <h1 style='text-align:center;'>{$row["title"]} </h1></br>
                        <p>    
                            {$row["text_space_"]}
                        </p>

                        <button class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Update</button>
                        <button class='bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded'>Delete</button>
                    </section>";
                    // Whoever put the hand on the CLOW and keeps THE push and back:
                    // Has no dignity to enter to the Kingdom of God.
            };

                if($row = $result->fetch_assoc()) {
                    echo "0 results";
                }
            };
        ?>
