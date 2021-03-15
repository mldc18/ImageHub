@extends('layouts.app')

@section('content')

<div class="">
    <div style="height:200px"></div>
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header bg-danger">   
              <h6 class="modal-title text-capitalize mx-2 text-light" id="imageDesc"></h6>
              <h6 class="modal-title text-light" id="imageTitle"></h6>
              <div class="position-absolute" style="right:50px;" id="imageAddAlbum"></div>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <center><img id="placeholder" src=""></center>
            </div>
            <div class="modal-footer" style="padding: 1rem 2rem; display:none;" id="imageFooter">
              <div>
                  <h2>My Photo Albums</h2>
              </div>
              <div aria-live="polite" aria-atomic="true" class="position-relative">
                <div class="toast-container position-absolute bottom-0 start-50 translate-middle-x">
                  <div class="toast" id="toastHome" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                      <img src="{{url('/images/ym.jpg')}}" height=30 width=30 class="rounded me-2">
                      <input type="hidden" id="hidden_input" disabled>
                      <strong class="me-auto">YungMalinaw</strong>
                      <small class="text-muted">just now</small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                      
                    </div>
                  </div>
                </div>
              </div>
              <form method="POST" id="chooseAlbumForm">
                @csrf
                @method('PATCH')
                @foreach ($albums as $album)
                  <div class="form-check my-4">
                    <div id="imageInput"></div>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios{{ $album['id'] }}" value="{{ $album['id'] }}" required>
                    <h4 class="form-check-label mx-2" for="exampleRadios{{ $album['id'] }}">
                      {{ $album['album_title'] }}
                    </h4>
                  </div>
                @endforeach
                <button type="submit" class="btn btn-danger mt-3">Add to Album</button>
              </form>
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
