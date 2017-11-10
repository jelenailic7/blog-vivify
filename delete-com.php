<?php
header("Location: single-post.php?post_id={$_POST['post_id']}");
   
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //veze bazy i php 
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();

    }


                    $deleteid = $_POST['id'];
                    $post_id = $_POST['post_id'];


                    

                     $sql = "DELETE FROM comments WHERE id=$deleteid LIMIT 1";
                    

    
                        $statement = $connection->prepare($sql);  
                        $statement->execute();

                     

              



?>