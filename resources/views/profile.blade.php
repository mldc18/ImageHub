@extends('layouts.app')

@section('content')

<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container position-absolute top-0 end-0 p-3">
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <img src="{{url('/images/ym.jpg')}}" height=30 width=30 class="rounded me-2">
          <strong class="me-auto">YungMalinaw</strong>
          <small class="text-muted">just now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Successfully added a new Album!
        </div>
      </div>
    </div>
</div>

<h1 class='display-1 text-danger my-2 text-center px-3' style="font-family: 'Rubik', sans-serif; font-weight:500;">My Gallery</h1>
<center><button style="height: 100px; width: 100px;" class="btn btn-danger" id="createAlbum">Add Album</button></center>
<div class="album-container">
    @foreach ($albums as $album)
        <div class="gallery">
            <a target="_blank" href="{{url('/images/ym.jpg')}}">
                <img src="{{url('/images/ym.jpg')}}">
            </a>
            <div class="desc">{{ $album['album_title'] }}</div>
        </div>
    @endforeach
</div>

<div class="modal fade" id="createAlbumModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create new Album</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" id="createAlbumForm" action="{{ route('create-album') }}">
            @csrf
            <input type="hidden" value={{ auth()->user()->id }} name="album_user_id">
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input id="album-title" type="text" class="form-control" name="album_title" required>
                    <label for="album-title" class="col-form-label text-md-right">{{ __('Album Title') }}</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
        </form>
      </div>
    </div>
</div>
<script src="{{ asset('js/profile.js') }}"></script>
@endsection
