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




                          		$comment_author = $_POST["author"];
                          		$comment_text = $_POST["text"];
                          		$post_id = $_POST['post_id'];

                          		if ($comment_author !="" || $comment_text !="") { 

                                $sql = "INSERT INTO comments (author, text, post_id)
                                VALUES ('$comment_author','$comment_text', $post_id)"; 
                                   


                        $statement = $connection->prepare($sql);  
                        $statement->execute();
                        

                  


                     

                      } else {
                   
                       echo('nisi napravila komentar');
                }




?>