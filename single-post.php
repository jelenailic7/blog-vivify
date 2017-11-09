<?php
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
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
?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Vivify Blog</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">

</head>

<body>

<header>
 
           <?php include('header.php') ?>
    

    <div class="blog-header">
        <div class="container">
            <h1 class="blog-title">The Bootstrap Blog</h1>
            <p class="lead blog-description">An example blog template built with Bootstrap.</p>
        </div>
    </div>
</header>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

           
            

            <?php
                if (isset($_GET['post_id'])) {

                    // pripremamo upit
                    $sql = "SELECT * FROM posts WHERE posts.id = {$_GET['post_id']}";

                    $statement = $connection->prepare($sql);

                    // izvrsavamo upit
                    $statement->execute();

                    // zelimo da se rezultat vrati kao asocijativni niz.
                    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                    $statement->setFetchMode(PDO::FETCH_ASSOC);

                    // punimo promenjivu sa rezultatom upita
                    $singlePost = $statement->fetch();

                    
                        
            ?>

                    
            <div class="blog-post">
                       
                            <h1><?php echo $singlePost['title'] ?></h1>
                            <p class="blog-post-meta"><?php echo $singlePost['created_at']." by " .$singlePost['author']?><p>
                            <p><?php echo $singlePost['body']?></p> 
                            <br>
                            <br>
                              
                            <button type="button" class="btn-default" id="btn">Hide comments</button>



                             
                                

                    


                          <form action="create-com.php" form method="post"> 
                          <label id="first"> Name:</label><br/>
                          <input type="text" name="author"><br/>

                          <label id="first">Comment:</label><br/>
                          <input type="text" name="text"><br/>

                         <button type="submit" name="save">Send</button>
                          </form> 

                    


            <br>
            <br>
            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>
            <div id="comments">

               <h4>comments</h4>
                             
            
                
                             <?php

                              
                               // pripremamo upit
                                $sql = "SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
                                $statement = $connection->prepare($sql); // salje upit ka bazi i vraca rezultat

                                // izvrsavamo upit
                                $statement->execute();

                                // zelimo da se rezultat vrati kao asocijativni niz.
                                // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
                                $statement->setFetchMode(PDO::FETCH_ASSOC);

                                // punimo promenjivu sa rezultatom upita
                                $comments = $statement->fetchAll(); // daj nam sve rezultate

                                

                              ?>


               <?php
                foreach ($comments as $comment) {
                 ?>
                            

                            <ul>

                            
                            <li><hr>
                                <p>posted by:<?php echo $comment['author']?> </p>
                                <p> <?php echo $comment['text']?> </p> </hr>
                                
                            </li>
                            </ul>

                            
                          

                     <?php
                             }
                    ?>
           


                            </div>
                     


            <?php
                } else {
                    echo('post_id nije prosledjen kroz $_GET');
                }
            ?>

        </div><!-- /.blog-main -->
        <?php include('sidebar.php') ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php include('footer.php') ?>

<script src="javascript.js" type="text/javascript"></script>



</body>
</html>