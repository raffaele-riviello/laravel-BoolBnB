@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        <div class="col-12">
          @foreach ($errors->all() as $message)
              {{$message}}
          @endforeach
          <form action="{{route('admin.apartaments.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group">
              {{-- ricordarci il ckeditor --}}
              <label for="description">Descrizione</label>
              <input type="text" name="description" id="description" class="form-control">
            </div>
            <div class="form-group">
              <label for="cover_img">Fotografia principale</label>
              <input type="file" name="cover_img" id="cover_img">
            </div>
            <div class="form-group">
              <label for="rooms_number">Numero di stanze</label>
              <input type="number" name="rooms_number" class="form-control">
            </div>
            <div class="form-group">
              <label for="bathrooms_number">Numero di bagni</label>
              <input type="number" name="bathrooms_number" class="form-control">
            </div>
            <div class="form-group">
              <label for="beds_number">Numero di letti</label>
              <input type="number" name="beds_number" class="form-control">
            </div>
            <div class="form-group">
              <!-- Default switch -->
                {{-- <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" id="customSwitches" name="visible">
                  <label class="custom-control-label" for="customSwitches" value="1">Visible</label>
                </div> --}}
                <input type="checkbox" name="visible" class="switch-input" value="1"/>
                <label for="visible">Visible</label>
            </div>
            <div class="form-group">
              <label for="size">Dimensioni</label>
              <input type="number" name="size" class="form-control">
            </div>
            <div class="form-group">
              <label for="address">Indirizzo</label>
              <input type="text" name="address" class="form-control">
            </div>
            <div class="form-group">
              <label for="price">Prezzo</label>
              <input type="number" step="0.01" name="price" class="form-control">
            </div>
            <div class="form-group">
              <label for="latitude">Latitudine</label>
              <input type="number" step="0.01" name="latitude" class="form-control" value="335" readonly="readonly">
            </div>
            <div class="form-group">
              <label for="longitude">Longitudine</label>
              <input type="number" step="0.01" name="longitude" class="form-control" value="555" readonly="readonly">
            </div>
            {{-- <div class="form-group">
              <h3>Tags</h3>
              @foreach ($tags as $tag)
              <label for="tags-{{$tag->id}}">{{$tag->name}}</label>
              <input type="checkbox" name="tags[]" id="tags-{{$tag->id}}" value="{{$tag->id}}">
                @endforeach
            </div>
            <div class="form-group">
              <h3>Photos</h3>

              @foreach ($photos as $photo)
              <label for="photos-{{$photo->id}}">{{$photo->name}}</label>
              <input type="checkbox" name="photos[]" id="photos-{{$photo->id}}" value="{{$photo->id}}">
              @endforeach
              <label for="photo">Fotografia</label>
              <input type="file" name="photo" id="photo">
            </div> --}}
            <input type="submit" value="Salva" class="btn btn-primary">
          </form>
        </div>
      </div>
    </div>
@endsection
