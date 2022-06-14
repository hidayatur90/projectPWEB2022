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
        background-color: yellow;
    }

    .card-header,
    .card-footer {
        opacity: 1
    }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center py-5">
        <div class="container px-4 mb-3 align-items-center">
            <h3 class="fw-bolder">
                <i class="bi bi-plus-circle-fill"></i> Add New Book
            </h3>
            <form action="data.php">
                <div class="row py-2 g-3 align-items-center">
                    <div class="col-sm-1 required">
                        <label for="Name" class="col-form-label">Name</i></label>
                    </div>
                    <div class="col-6">
                        <input type="text" id="Name" name="Name" class="form-control" required>
                    </div>
                </div>
                <div class="row py-2 g-3 align-items-start">
                    <div class="col-sm-1 required">
                        <label for="author_id" class="col-form-label">Author</label>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="author_id" name="author_id" required></input>
                    </div>
                </div>
                <div class="row py-2 g-3 align-items-center">
                    <div class="col-sm-1">
                        <label for="Rating" class="col-form-label">Rating</label>
                    </div>
                    <div class="col-6">
                        <input type="number" step="0.1" id="Rating" name="Rating" class="form-control" required>
                    </div>
                </div>
                <div class="row py-2 g-3 align-items-center">
                    <div class="col-sm-1">
                        <label for="Reviews" class="col-form-label">Reviews</label>
                    </div>
                    <div class="col-6">
                        <textarea class="form-control" id="Reviews" name="Reviews" style="height: 60px"></textarea>
                    </div>
                </div>
                <div class="row py-2 g-3 align-items-center">
                    <div class="col-sm-1 required">
                        <label for="Price" class="col-form-label">Price</label>
                    </div>
                    <div class="col-6">
                        <input type="number" step="0.01" id="Price" name="Price" class="form-control" required>
                    </div>
                </div>
                <div class="row py-2 g-3 align-items-center">
                    <div class="col-sm-1 required">
                        <label for="Year" class="col-form-label">Year</label>
                    </div>
                    <div class="col-6">
                        <input type="number" id="Year" name="Year" class="form-control" minlength="4"
                            maxlength="4">
                    </div>
                </div>
                <div class="row py-2 g-3 align-items-center">
                    <div class="col-sm-1 required">
                        <label for="genre_id" class="col-form-label">Genre</label>
                    </div>
                    <div class="col-6">
                        <select class="form-select" id="genre_id" name="genre_id">
                            <option value="" selected>-</option>
                        </select>
                    </div>
                </div>
                <div class="row py-2 g-3 mb-3">
                    <div class="offset-1 col-sm-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send-fill white"></i>
                            Submit</button>
                        <a href="main.php" class="btn btn-outline-dark"><i class="bi bi-arrow-left"></i>
                            Back</a>
                    </div>
                </div>
        </div>
        </form>
    </div>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- pooper js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $("form").submit(function(event) {
            event.preventDefault();
            var book = $(this).serialize();
            $.post("data.php?action=create", book, function(response) {
                alert("Data berhasil ditambahkan.");
            });
        });
    });
    </script>
</body>

</html>