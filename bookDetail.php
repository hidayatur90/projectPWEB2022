<?php

require_once('db.php');

$book_id = $_GET['id'];
 
$result = mysqli_query($db, "SELECT * FROM bestsellers_with_categories WHERE id=$book_id");
 
while($row = mysqli_fetch_array($result))
{
	$name = $row['Name'];
	$author = $row['Author'];
	$year = $row['Year'];
	$rating = $row['Rating'];
	$reviews = $row['Reviews'];
	$price = $row['Price'];
	$genre = $row['Genre'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title><?= $name; ?></title>
    <style>        
        body {
            font-family: "Open Sans", sans-serif;
            width: 100%;
            height: 100vh;
            background: url(assets/img/hero-bg.png);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }  
        img {
            float: left;
        }
        .card { 
            background-color: rgba(245, 245, 245, 0.8); 
        }
        .card-header, .card-footer { 
            opacity: 1
        }
        .customBadge {
            margin-top: 3px;
            margin-right: 5px;
            font-weight: 600;
            font-size: 0.7rem;
            text-transform: uppercase;
            border: 1px solid rgb(110, 110, 110);
            padding: 1px 5px;
            border-radius: 4px;
        }
        .btn-primary {
            margin-top: 30px;
            line-height: 0;
            padding: 15px 20px;
            border-radius: 4px;
            transition: 0.5s;
            color: #fff;
            background: #4154f1;
            box-shadow: 0px 5px 30px rgba(65, 84, 241, 0.4);
        }
    </style>
</head>
<body>
<section class="my-5">
    <div class="container px-4">
        <div class="row">
            <div class="card mt-3 col-12 col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" data-aos="fade-up">
                <div class="card-body ms-2">
                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 text-center text-sm-start">
                        <img src="assets/img/no-image.png" alt="<?= $name; ?>" width="250" height="400" class="me-4">    
                    </div>
                    <div class="mt-3 mt-sm-0 col text-center text-sm-start">
                        <h3><strong><?= $name; ?></strong> (<?= $year; ?>)</h3>
                        <div class="d-flex">
                            <p class="me-2">Author : <?= $author; ?>  </p>
                            <div class="customBadge align-self-start"><?= $rating; ?></div>
                        </div>
                        <p class="me-2">Genre : <?= $genre; ?>  </p>
                    </div>
                    <div class="row my-4 mx-3">
                        <table class="table table-light table-bordered">
                            <thead class="col-6 col-md-3">
                                <tr>
                                    <th scope="col">Read Reviews</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody class="col-6 col-md-3">
                                <tr>
                                    <td><?= $reviews; ?></td>
                                    <td><?= $price; ?></td>
                                </tr>
                            </tbody>
                        </table>        
                    </div>
                    <div class="col-12">
                        <a href="main.php" class="btn btn-primary w-100 my-3">
                            <i class="bi-arrow-left-short"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- pooper js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
    <script src="title.js"></script>
    <script src="rating.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>