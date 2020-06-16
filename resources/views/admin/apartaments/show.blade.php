@extends('layouts.app')

@section('content')
  <h1>{{$apartament->title}}</h1>
  <p>{!!$apartament->description!!}</p>
  <p>{{$apartament->cover_img}}</p>
  <p>{{$apartament->rooms_number}}</p>
  <p>{{$apartament->beds_number}}</p>
  <p>{{$apartament->bathrooms_number}}</p>
  <p>{{$apartament->visible}}</p>
  <p>{{$apartament->size}}</p>
  <p>{{$apartament->address}}</p>
  <p>{{$apartament->price}}</p>
@endsection
