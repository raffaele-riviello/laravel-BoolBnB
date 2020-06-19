@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="nav justify-content-center">
            <li class="nav-item">
               <a class="nav-link active" href="{{route('dashboard')}}">Torna alla dashboard</a>
            </li>
          </ul>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Nome Mittente</th>
                <th>Email</th>
                <th colspan="3">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($messages as $message)
                  <tr>
                    <td>{{$message->id}}</td>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td><a class="btn btn-primary" href="{{route('messages.show', $message->id)}}">Visualizza</a></td>
                    <td>
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
    </div>
@endsection
