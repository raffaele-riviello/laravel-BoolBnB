@extends('layouts.app')

@section('bootstrap')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('header')
  @include('partials.headerBasso')
@endsection

@section('main')
  <div class="container tabella">
    <div class="table100 ver6 m-b-110">
              <table data-vertable="ver6">
                <thead>
                  <tr class="row100 head">
                    <th class="column100s column1" data-column="column1">Id</th>
                    <th class="column100 column2" data-column="column2">Nome Mittente</th>
                    <th class="column100 column3" data-column="column3">Email</th>
                    <th class="column100 column8" data-column="column8" colspan="3">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($messages as $message)
                  <tr class="row100">
                    <td class="column100s column1" data-column="column1">{{$message->id}}</td>
                    <td class="column100 column2" data-column="column2">{{$message->name}}</td>
                    <td class="column100 column3" data-column="column3">{{$message->email}}</td>
                    <td class="column100 column4" data-column="column4"><a class="btn btn-primary" href="{{route('messages.show', $message->id)}}">Visualizza</a></td>
                    <td class="column100 column5" data-column="column5">
                      @if(Auth::id() == $message->apartament_id)
    									<form action="{{route('messages.destroy', $message->id)}}" method="POST">
    										@csrf
    										@method('DELETE')
    										<input class="btn btn-danger" type="submit" value="Elimina">
    									</form>
    									@endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- {{$apartaments->links()}} --}}
            </div>
          </div>
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
