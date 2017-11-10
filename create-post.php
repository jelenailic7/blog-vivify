<?php


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

            <div class="blog-post">

                  

                          <form action="new-post.php" form method="post"> 
                          <label id="first"> Title: </label><br>
                          <input type="text" name="title"><br>

                          <label id="first"> Text: </label><br/>
                          <textarea name="body" rows="10" cols="70"></textarea> <br> 

                          <label id="first"> Author: </label><br>
                          <input type="text" name="author"><br> 

                          <label id="date"> Date: </label><br>
                          <input type="date" name="created_at" value="2017-11-10"><br>    

                          
                          <input type="submit" class="button" value="Save">
                          <input type="hidden" name="action" value="submit">






          </div>


            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        <?php include('sidebar.php') ?>

    </div><!-- /.row -->

</main><!-- /.container -->


     <?php include('footer.php') ?>

</body>
</html>