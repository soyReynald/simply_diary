<?php

        if ($con_string->connect_error) {
            die("Connection failed: " . $con_string->connect_error);
        };
            //echo '<h1 style="color: black; margin: 15% auto; text-align: center; font-weight: 20px;">Connected succesfully</h1>';
            //! Conexion was FULLY tested ...

            $sql = "SELECT * FROM diary_note_space_";
            // Execute the SQL query
            $result = $con_string->query($sql);

            // Process the result set
            if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<section id='diary_showcase_'>
            
                        <span>
                            March 15, 2026
                        </span>
                        
                        <h1 style='text-align:center;'>{$row["title"]} </h1></br>
                        <p>    
                            {$row["text_space_"]}
                        </p>
                    </section>";
            };

                if($row = $result->fetch_assoc()) {
                    echo "0 results";
                }
            };
        ?>
