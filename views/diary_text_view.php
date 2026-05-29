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
                 
                echo "<section id='diary_showcase_'>
            
                        <span>Current Date: 
                    ".
                     date("F d, Y")
                    ."
                        </span>
                        
                        <h1 style='text-align:center;'>{$row["title"]} </h1></br>
                        <p>    
                            {$row["text_space_"]}
                        </p>
                    </section>";
                    // Whoever put the hand on the CLOW and keeps THE push and back:
                                                        // Has no dignity to enter to the Kingdom of God.
            };

                if($row = $result->fetch_assoc()) {
                    echo "0 results";
                }
            };
        ?>
