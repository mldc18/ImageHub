@extends('layouts.app')

@section('content')
<div class="">
    <div style="height:200px"></div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">   
              <h6 class="modal-title text-capitalize mx-2" id="imageDesc"></h6>
              <h6 class="modal-title" id="imageTitle"></h6>
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
        <div class="result">


        </div>
    </center>
</div>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="{{ asset('js/home.js') }}"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
    $('.result').masonry({
        gutter: 10,
        itemSelector: '.item',
        isFitWidth: true
    });
</script>
@endsection
