@extends('layouts.app')

@section('content')
<div class="">
    <div style="height:200px"></div>

    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="imageTitle">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <center><img id="placeholder" src=""></center>
            </div>
          </div>
        </div>
      </div>

    <div class="row justify-content-center">
        <div>
            <div class="my-4">
                <h1 class='display-1 text-danger my-2 text-center px-3' style="font-family: 'Rubik', sans-serif; font-weight:500;">YungMalinaw.com</h1>
                <p class="text-center fs-4 text-black-50 px-3">Wala ka bang mapagkuhanan ng malinaw na picture?</p>
                <div style="height:50px"></div>
                <div class="input-group mb-3 w-75 m-auto">
                    <input type="text" id="searchInput" class="form-control" placeholder="search for high-resolution photos" aria-label="Recipient's username" aria-describedby="basic-addon2"
                    style="height: 70px; font-size: 35px; padding-left:25px;">
                    <div class="input-group-append">
                      <button class="btn bg-danger text-white" onclick="searchPhotos();" style="height: 70px; width: 150px; font-size: 35px;">Search</button>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div style="height:200px"></div>
    <center>
        <div class="result"></div>
    </center>
</div>
<script src='http://code.jquery.com/jquery-2.1.3.js'></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script>
    let page_num = 1;
    // when reaching the bottom of result, appends another set of images
    $(window).bind('scroll', function() {
        if($(window).scrollTop() >= $('.result').offset().top + $('.result').outerHeight() - window.innerHeight) {
            showPage();
        }
    });
    function showImageModal(url, name, date){
        console.log('tite');
        $('#imageModal').modal('show');
        $('#placeholder').attr("src", url);
        $('#imageTitle').text('Published on '+date+' by '+name);
    }
    function showPage(){
        fetch("https://api.unsplash.com/photos?page="+page_num+"&client_id=nm_EGxUFnktlV15-WPx6u1v69BQKsQRfO1ixuQ0iM6A")
        .then(data=>data.json())
            .then(data=>data
                .forEach(element => {
                    $('.result').append(`<div class='item mb-2'><img class='unsplash-images' src='${element.urls.small}' onclick='showImageModal("${element.urls.regular}", "${element.user.name}", "${element.created_at}" )'></div>`);
                    var $grid = $('.result').imagesLoaded( function() {
                            // init Masonry after all images have loaded
                            $grid.masonry({
                                gutter: 10,
                                itemSelector: '.item',
                                isFitWidth: true
                            });
                        });
                    $grid.masonry('reloadItems');
                }));
                page_num += 1;
    }
    showPage();
</script>
<script>
    function searchPhotos(){
        console.log('working');
        let clientId = "nm_EGxUFnktlV15-WPx6u1v69BQKsQRfO1ixuQ0iM6A";
        let query = document.getElementById("searchInput").value;
        let url = "https://api.unsplash.com/search/photos?client_id="+clientId+"&query="+query;
        fetch(url)
            .then(data=>data.json())
                .then(data=>data.results
                    .forEach(element => {
                        var $result = $(`<div class='item mb-2'><img src='${element.urls.small}'></div>`);
                        $('.result').prepend($result).masonry('reloadItems');
                        var $grid = $('.result').imagesLoaded( function() {
                            // init Masonry after all images have loaded
                            $grid.masonry({
                                gutter: 10,
                                itemSelector: '.item',
                                isFitWidth: true
                            });
                        });
                    }));
    }
</script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    $('.result').masonry({
        gutter: 10,
        itemSelector: '.item',
        isFitWidth: true
    });
</script>
@endsection
