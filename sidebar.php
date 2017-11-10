<?php
   
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password  ); //veze bazy i php 
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Latest posts</h4>

        <?php

                // pripremamo upit
                $sql = "SELECT * FROM posts ORDER BY posts.created_at";
                $statement = $connection->prepare($sql); // salje upit ka bazi i vraca rezultat

                // izvrsavamo upit
                $statement->execute();

                // zelimo da se rezultat vrati kao asocijativni niz.
                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                $statement->setFetchMode(PDO::FETCH_ASSOC);

                // punimo promenjivu sa rezultatom upita
                $posts = $statement->fetchAll(); // daj nam sve rezultate

                // koristite var_dump kada god treba da proverite sadrzaj neke promenjive
                    echo '<pre>';
                    echo '</pre>';

            ?>
            


            <?php
                foreach ($posts as $post) {
            ?>

                <p><a href="single-post.php?post_id=<?php echo($post['id'])?>"><?php echo($post['title'])?></a></p> 
                  <?php
                }
            ?>

            <div class="sidebar-module">
             
            </div>
        </aside><!-- /.blog-sidebar -->


