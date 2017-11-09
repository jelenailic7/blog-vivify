 <?php
                          if(isset($_POST['save'])){
                                $sql = "INSERT INTO comments (author, text)
                                VALUES ('".$_POST["author"]."','".$_POST["text"]."') WHERE post_id = {$_GET['post_id']}"; 
                                   }


                        $statement = $connection->prepare($sql);  
                        $statement->execute();
                        $statement->setFetchMode(PDO::FETCH_ASSOC);
                        $comments = $statement->fetchAll()

                         ?>