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
            background-color: white;
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
            background-color: white;
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
        h4, h2 a {
            color:#012970;
        }
        #books:hover{
            transform: scale(1.02);
        }
    </style>
</head>
<body> 
    <div class="container">
        <div class="container-fluid">
            <div class="row g-2 g-lg-3 mt-4"> 
                <div class="col-lg-10 px-5">
                    <strong><h2 class="fw-bolder"><a href="index.html">Best & Popular Books</a></h2></strong> 
                </div>
                <div class="col-lg-2 gx-5 px-4 ml-4 mb-3">
                <a href="form.php" class="btn btn-primary">
                    <i class="bi bi-plus-circle-fill white"></i>
                    Create
                </a>
                </div>
            </div>
        </div>
        <div class="container-fluid justify-content-center align-self-center mg-3 px-5">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="fw-bolder">
                                <i class="bi bi-search"></i>
                                Cari
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="search"
                                    placeholder="Search by Title" />
                                <label for="title">Cari Judul Buku</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <form action="" method="get" id="searchMovie">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="fw-bolder">
                                    <i class="bi bi-sort-alpha-down"></i>
                                    Filter
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="sorting" aria-label="Floating label select">
                                            <option selected hidden>-</option>
                                            <option value="ASC">A ~ Z</option>
                                            <option value="DESC">Z ~ A</option>
                                        </select>
                                        <label for="movieYear">Sort Result by</label>
                                    </div>
                                    <div class="form-floating">
                                        <select class="form-select" id="genre" aria-label="Floating label select"
                                            name="genre">
                                            <option value="" disabled selected>Sort by Genre</option>
                                            <option value="0">All Genre</option>
                                            <option value="1">Fiction</option>
                                            <option value="2">Non Foction</option>
                                        </select>
                                        <label for="movieYear">Sort by Genre</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="button" id="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-9">
                    <div class="row" id="data"></div>
                    <div class="row g-4 mt-2">
                        <div class="col-12 d-grid">
                            <button class="btn btn-primary" id="load"><i class="bi bi-arrow-bar-down me-2"></i></i>Load More</button>
                        </div>
                    </div>
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
    <script src="title22.js"></script>
    <script src="sorting.js"></script>
    <script>
        var page = 0;
        var search = document.getElementById("search");
        var sorting = document.getElementById("sorting");
        var genre = document.getElementById("genre");
        $(document).ready(function(){
            $("#load").click(function (){
                $(this).html("Loading...").attr("disabled", "disabled")
                $.post("data.php?action=read&order="+sorting.value+"&genre="+genre.value+"&search="+search.value+"&begin="+page, function(response){
                    $.each(response, function (key,value){
                        $("#data").append(
                        `<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-7 col-sm-9 mx-0.5 my-1">
                            <div class="card" id="books" data-aos="fade-up">
                                <img src='` + value.img +`' class="card-img-top" alt="` + value.Name + `">
                                <div class="card-body">
                                    <a href="bookDetail.php?id=` + value.id + `">
                                    <h4 class="card-title">
                                        <strong>` + 
                                            value.Name + 
                                        `</strong>
                                    </h4></a>
                                    <p class="card-text">Genre: ` + value.genre + `</p>
                                    <div class="icon">
                                        <a href="form.php?action=update&id=` + value.id + `" class="edit-icon">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="data.php?action=delete&id=` + value.id + `" class="trash-icon">
                                            <i class="bi bi-trash3-fill red"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>`);
                    });
                    AOS.init();
                    page += 4;
                    $("#load").html("<i class='bi bi-arrow-bar-down me-2'></i>Load More").removeAttr("disabled")
                });
            }).trigger('click');
        });
    </script>
</body>
</html>