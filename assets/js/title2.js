var search = document.getElementById("search");
search.addEventListener("keyup", function () {
  $("#data").html("");
  $.get("data.php?action=read&order=&search=" + search.value +"&begin=0",  function (response) {
    var panjang = response.length;
    if (panjang == 0) {
      const card = document.createElement('div');
      card.classList.add('col');
      card.innerHTML = `
      <div class="text-center" style="color:#012970;">
        <h2>Nama Buku Tidak Ditemukan</h2>
      </div>`; 
      $("#data").html(card);
      
    } else {
      for (var i = 0; i < panjang; i++) {
        $("#data").append(
        `<div class="col-12 col-xxl-6 col-xl-6 col-lg-6 col-md-7 col-sm-9 mx-0.5 my-1">
            <div class="card" id="books" data-aos="fade-up">
                <img src="`+ response[i]["img"] +`" class="card-img-top" alt="` + response[i]["Name"] + `">
                <div class="card-body">
                    <a href="bookDetail.php?id=` + response[i]["id"] + `">
                    <h4 class="card-title">
                        <strong>` + 
                            response[i]["Name"] + 
                        `</strong>
                    </h4></a>
                    <p class="card-text">Genre: ` + response[i]["genre"] + `</p>
                    <div class="icon">
                        <a href="form.php?action=update&id=`+ response[i]["id"] +`" class="edit-icon">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="data.php?action=delete&id=`+ response[i]["id"] +`" class="trash-icon">
                            <i class="bi bi-trash3-fill red"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>`);
        AOS.init();
      }
    }
  });
}); 
