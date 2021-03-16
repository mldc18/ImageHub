@extends('layouts.app')

@section('content')

<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container position-absolute top-0 end-0 p-3">
      <div class="toast" id="toastProfile" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <img src="{{url('/images/ym.jpg')}}" height=30 width=30 class="rounded me-2">
          <strong class="me-auto">imagehub</strong>
          <small class="text-muted">just now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Successfully added a new Album!
        </div>
      </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
  <h1 class='display-1 text-danger my-2 text-center px-3' style="font-family: 'Rubik', sans-serif; font-weight:500;">My Gallery</h1>
  <button style="height: 50px; width: 50px; font-size: 10px; font-family: 'Rubik', sans-serif; font-weight:500;" class="btn btn-danger text-center" id="createAlbum" >Add Album</button>
</div>
<div class="album-container p-5 d-flex justify-content-center row">
    @foreach ($albums as $album)
        <div class="gallery col-md-4 p-0 m-2" id="gallery{{ $album['id'] }}">
            <div onclick="clickView({{ $album['images'] }})">
                <img src="{{url('/images/ym.jpg')}}">
            </div>
            <h4 class="desc px-3 pt-3">{{ $album['album_title'] }}</h4>
            <h6 class="px-3" style="font-family: 'Rubik', sans-serif; font-weight:400"> {{ $album['images'] == null ? "0" : count(explode(',', $album['images'])) }} photos </h6>
            <div class="px-3 text-light btn btn-dark btn-sm w-100" onclick="deleteAlbum({{ $album['id'] }})">delete<i class="px-1 pb-2 fas fa-trash-alt text-light"></i></div>
        </div>
    @endforeach
</div>

<div class="modal fade" id="createAlbumModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-danger text-light">
          <h5 class="modal-title" id="exampleModalLabel">Create new Album</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" id="createAlbumForm" action="{{ route('create-album') }}">
            @csrf
            <input type="hidden" value={{ auth()->user()->id }} name="album_user_id">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input id="album_title" type="text" class="form-control" name="album_title" required>
                    <div class="alert alert-danger" style="display:none"></div>
                    <label for="album_title" class="col-form-label text-md-right">{{ __('Album Title') }}</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-danger">Create Album</button>
              </div>
        </form>
      </div>
    </div>
</div>

<div class="modal fade" id="imagesModal" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">   
        <h6 class="modal-title text-capitalize mx-2">Images</h6>
        <div class="position-absolute" style="right: 50px;">
          <span class="badge bg-light text-dark" onclick="convertImagesSmall()">Small</span>
          <span class="badge bg-light text-dark" onclick="convertImagesMedium()">Medium</span>
          <span class="badge bg-light text-dark" onclick="convertImagesRegular()">Regular</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body viewImages">
        <div class="pageContainer d-flex justify-content-center" >

        </div>
        <div class="imageContainer d-flex row justify-content-center">

        </div>
      </div>

    </div>
  </div>
</div>

<script src="{{ asset('js/profile.js') }}"></script>
@endsection
