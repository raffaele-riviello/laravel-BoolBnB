






@section('title')
    Home
@endsection

@extends('layouts.layout')

@section('mainContent')
    <form class="form-inline" action="{{route('results')}}">
      <input name="address" class="form-control mr-sm-2" type="search" placeholder="Dove vuoi andare?" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
    </form>
@endsection
