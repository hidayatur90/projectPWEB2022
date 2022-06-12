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
    <title>Yuk! Cari Buku</title>
    <link href="assets/css/style.css" rel="stylesheet">
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
        .card {
            margin-top: 20px;
            height: auto;
            width: auto;
            transition: transform .2s;
            background-color: rgb(236, 236, 236);
        }
        .card:hover{
            transform: scale(1.1);
        }
        .card-img-top {
            margin: 10px;
            min-height: 17rem;
            max-height: auto;
            width: auto;
        }
        .red {
            color: red;
        }
        .card-body {
            font-family: Arial, Helvetica, sans-serif;
            /* font-weight: bold; */
        }
        .card-title {
            font-size : 20px;
        }
        .icon {
            display: flex;
            justify-content: right;
            flex-direction: row;
            transition: transform .2s;
            margin-top: -40px;
        }
        .trash-icon:hover{
            transform: scale(1.5);
        }
        .edit-icon:hover{
            transform: scale(1.5);
        }
        footer {
            font-family: Arial, Helvetica, sans-serif;
            margin: 40px 40px;
            color: white;
        }
        button{
            border:none;
            color: blue;
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
        a {
            text-decoration: none !important; 
            color:black;
        }
        h2 a {
            color:#012970;
        }
    </style>
</head>
<body> 
    <div class="container">
        <div class="container-fluid">
            <div class="row g-2 g-lg-3 mt-4"> 
                <div class="col-lg-10 px-5">
                    <h2 class="fw-bolder"><a href="index.html">Best & Popular Books</a></h2>
                </div>
                <div class="col-lg-2 gx-5 px-4 ml-4">
                    <button type="button" class="btn btn-primary">
                        <i class="bi bi-plus-circle-fill white"></i>
                        Create
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid justify-content-center align-self-center mg-3 px-5">
            <div class="row">
                <div class="col-lg-3">
                    <form action="" method="get" id="sorting">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="fw-bolder">
                                    <i class="bi bi-sort-alpha-down"></i>
                                    Sorting
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-floating">
                                    <select class="form-select" id="sorting" aria-label="Floating label select">
                                        <option selected>-</option>
                                        <option value="ASC">A ~ Z</option>
                                        <option value="DESC">Z ~ A</option>
                                    </select>
                                    <label for="movieYear">Sort Result by</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form action="" method="get" id="searchMovie">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="fw-bolder">
                                    <i class="bi bi-funnel-fill"></i>
                                    Filter
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="search"
                                        placeholder="Search by Title" />
                                    <label for="title">Search by Title</label>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <select class="form-select" id="rating" aria-label="Floating label select"
                                            name="rating">
                                            <option value="" disabled selected>Search by Movie Rating</option>
                                            <option value="">All Rating</option>
                                            <option value="PG">PG</option>
                                            <option value="G">G</option>
                                            <option value="NC-17">NC-17</option>
                                            <option value="PG-13">PG-13</option>
                                            <option value="R">R</option>
                                        </select>
                                        <label for="movieYear">Search by Genre</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-primary" type="button" id="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div class="row" id="data">
                    <?php
                        require_once ("./db.php");
                        $sql = "SELECT * FROM bestsellers_with_categories LIMIT 12";
                        $result = $db->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>

                        <div class="col-12 col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mx-0.5 my-1">
                            <a href="detailFilm.php?id=<?=$row['id']?>">
                            <div class="card" data-aos="fade-up">
                                <img src="assets/img/no-image.png" class="card-img-top" alt="<?= $row["Name"]; ?>">
                                <div class="card-body">
                                    <marquee><h4 class="card-title"><?= $row["Name"]; ?></h4></marquee>
                                    <p class="card-text">Rating: <?= $row["User Rating"]; ?></p>
                                    <div class="icon">
                                        <button type="button" class="edit-icon">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="trash-icon">
                                            <i class="bi bi-trash3-fill red"></i>
                                        </button>
                                    </div>
                                </div>
                            </div></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>&#169; 202410101057-Muhammad Hidayatur Rahman</p>
    </footer>

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