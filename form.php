<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Tambah Buku Baru</title>
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
    .btn-primary {
        line-height: 0;
        padding: 15px 20px;
        border-radius: 4px;
        transition: 0.5s;
        color: #fff;
        background: #4154f1;
        box-shadow: 0px 5px 30px rgba(65, 84, 241, 0.4);
    }
    .btn-light {
        line-height: 0;
        padding: 15px 20px;
        border-radius: 4px;
        transition: 0.5s;
        box-shadow: 0px 5px 30px rgba(65, 84, 241, 0.4);
    }
    </style>
</head>

<body>
    <div class="container my-4 py-2">
        <div class="row">
        <div class="col-6 col-lg-6 col-md-12 col-sm-12">
            <div class="header">
                <h3 class="h2 mb-3">
                    <i class="bi bi-plus-circle-fill"></i> <strong>Add New Book</strong>
                </h3>
            </div>
            <form action="data.php">
                <input type="hidden" id="id" name="id">
                <div class="row mb-3">
                    <label for="img" class="col-form-label col-sm-4 col-md-3 col-xl-2">Thumbnail</i></label>
                    <div class="col-sm-8 col-md-9 col-xl-10">
                        <input type="file" id="img" name="img" class="form-control" accept="image/jpg" onchange="readURL(this);" value="assets/img/1.jpg">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Name" class="col-form-label col-sm-4 col-md-3 col-xl-2">Name</i></label>
                    <div class="col-sm-8 col-md-9 col-xl-10">
                        <input type="text" id="Name" name="Name" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="author_id" class="col-form-label col-sm-4 col-md-3 col-xl-2">Author</label>
                    <div class="col-sm-8 col-md-9 col-xl-10">
                        <input type="text" class="form-control" id="author_id" name="author_id" required></input>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Rating" class="col-form-label col-sm-4 col-md-3 col-xl-2">Rating</label>
                    <div class="col-sm-8 col-md-9 col-xl-10">
                        <input type="number" step="0.1" id="Rating" name="Rating" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Reviews" class="col-form-label col-sm-4 col-md-3 col-xl-2">Reviews</label>
                    <div class="col-sm-8 col-md-9 col-xl-10">
                        <input type="number" id="Reviews" name="Reviews" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Price" class="col-form-label col-sm-4 col-md-3 col-xl-2">Price</label>
                    <div class="col-sm-8 col-md-9 col-xl-10">
                        <input type="number" step="0.01" id="Price" name="Price" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Year" class="col-form-label col-sm-4 col-md-3 col-xl-2">Year</label>
                    <div class="col-sm-8 col-md-9 col-xl-10">
                        <input type="number" id="Year" name="Year" class="form-control" minlength="4"
                            maxlength="4">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="genre_id" class="col-form-label col-sm-4 col-md-3 col-xl-2">Genre</label>
                    <div class="col-sm-8 col-md-9 col-xl-10">
                        <select class="form-select" aria-label="Default select example" name="genre_id" id="genre_id" aria-placeholder="Language" required>
                            <option selected>-</option>
                        </select>
                    </div>
                </div>
                <!-- Button -->
                <div class="row mb-3 justify-content-end">
                    <div class="col-sm-8 col-md-9 col-xl-10">
                      <button type="submit" class="btn btn-primary">
                          <span class="bi bi-send-fill me-2"></span>
                          Submit
                        </button>
                      <a href="main.php" class="btn btn-light border">
                          <span class="bi bi-arrow-left me-2"></span>
                          Back
                        </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
            <img id="display-thm" src="assets/img/no-image.png" alt="Thumbnail" />
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- pooper js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#display-thm').attr('src', e.target.result).width(350).height(400);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    var file = document.getElementById("img");
    console.log(file.value);
    $(document).ready(function() {
        $.get("genre.php", function(response){
            $.each(response, function(key,value){
                $("#genre_id").append("<option value='" + value.id + "'>" + value.genre + "</option>");
            });

            var params = window.location.search.substr(1).split('&');
            for(var i = 0; i < params.length; i++){
                params[i] = params[i].split('=');
            }
            if(params[0][0] == "action" && params[0][1] == "update"){
                $.get("data.php?action=detail&id=" + params[1][1], function(response){
                    $("form #id").val(response.id_book);
                    // $("form #img").val(response."assets/img/"+id_book+".jpg");
                    $("form #Name").val(response.Name);
                    $("form #author_id").val(response.Author);
                    $("form #Rating").val(response.Rating);
                    $("form #Reviews").val(response.Reviews);
                    $("form #Price").val(response.Price);
                    $("form #Year").val(response.Year);
                    $("form #genre_id").val(response.genre_id);
                });
            }
            $("form").submit(function(event) {
                event.preventDefault();
                var book = new FormData(this);
                if(params[0][0] == "action" && params[0][1] == "update"){
                    // $.post("data.php?action=update", book, function(response) {
                    //     alert("Data berhasil diubah.");
                    // });
                    $.ajax({
                        url: "data.php?action=update",
                        type: "POST",
                        data: book,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response){
                            alert("Data berhasil diubah.");
                            localtion.replace("main.php");
                        }
                    });
                } else{
                    // $.post("data.php?action=create", book, function(response) {
                    //     alert("Data berhasil ditambahkan.");
                    // });
                    $.ajax({
                        url: "data.php?action=create",
                        type: "POST",
                        data: book,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response){
                            alert("Data berhasil ditambahkan.");
                            localtion.replace("main.php");
                        }
                    });
                }
            });
        });
    });
    </script>
</body>

</html>