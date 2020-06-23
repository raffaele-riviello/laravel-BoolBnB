@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="nav justify-content-center">
            <li class="nav-item">
               <a class="nav-link active" href="{{route('dashboard')}}">Torna alla dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.apartaments.create')}}">Aggiungi Appartamento</a>
            </li>
          </ul>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Titolo</th>
                <th>Dimensione</th>
                <th>Numero di stanze</th>
                <th>Numero di letti</th>
                <th>Prezzo</th>
                <th>Indirizzo</th>
                <th>Visible</th>
                <th colspan="4">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($apartaments as $apartament)
                  <tr>
                    <td>{{$apartament->id}}</td>
                    <td>{{$apartament->title}}</td>
                    <td>{{$apartament->size}}</td>
                    <td>{{$apartament->rooms_number}}</td>
                    <td>{{$apartament->beds_number}}</td>
                    <td>{{$apartament->price}}</td>
                    <td>{{$apartament->address}}</td>
                    <td>{{$apartament->visible}}</td>
                    <td><a class="btn btn-primary" href="{{route('admin.apartaments.show', $apartament->id)}}">Visualizza</a></td>
                    <td><a class="btn btn-secondary" href="{{route('admin.apartaments.edit', $apartament->id)}}">Modifica</a></td>
                    <td>
                      @if(Auth::id() == $apartament->user_id)
                      <form action="{{route('admin.apartaments.destroy', $apartament->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Elimina">
                      </form>
                      @endif
                    </td>
                    {{-- parte sponsorizzazione --}}
                    <td>
                      @if(!(\App\Cart::where(['apartament_id' => $apartament->id])->first()))
                        <input class="btn btn-success" value="Sponsorizza">
                      @else
                        <input disabled class="btn btn-success" value="Sponsorizzato">
                      @endif
                    </td>
                    {{-- parte sponsorizzazione --}}
                  </tr>
              @endforeach
            </tbody>
          </table>
          {{$apartaments->links()}}
        </div>
      </div>
    </div>
@endsection
