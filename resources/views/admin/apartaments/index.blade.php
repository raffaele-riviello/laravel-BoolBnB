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
    								<th class="column100 column2" data-column="column2">Titolo</th>
    								<th class="column100 column3" data-column="column3">Dimensione</th>
    								<th class="column100 column4" data-column="column4">Numero di stanze</th>
    								<th class="column100 column5" data-column="column5">Prezzo</th>
    								<th class="column100 column6" data-column="column6">Indirizzo</th>
    								<th class="column100 column7" data-column="column7">Visible</th>
    								<th class="column100 column8" data-column="column8" colspan="3">Azioni</th>
    								<th class="column100 column8" data-column="column8">Sponsorizza</th>
    							</tr>
    						</thead>
    						<tbody>
                  @foreach ($apartaments as $apartament)
    							<tr class="row100">
    								<td class="column100s column1" data-column="column1">{{$apartament->id}}</td>
    								<td class="column100 column2" data-column="column2">{{$apartament->title}}</td>
    								<td class="column100 column3" data-column="column3">{{$apartament->size}}</td>
    								<td class="column100 column4" data-column="column4">{{$apartament->rooms_number}}</td>
    								<td class="column100 column5" data-column="column5">{{$apartament->price}}</td>
    								<td class="column100 column6" data-column="column6">{{$apartament->address}}</td>
    								<td class="column100 column7" data-column="column7">{{$apartament->visible}}</td>
    								<td class="column100 column8" data-column="column8"><a class="btn btn-primary" href="{{route('admin.apartaments.show', $apartament->id)}}">Visualizza</a></td>
    								<td class="column100 column8" data-column="column8"><a class="btn btn-secondary" href="{{route('admin.apartaments.edit', $apartament->id)}}">Modifica</a></td>
    								<td class="column100 column8" data-column="column8">
                      @if(Auth::id() == $apartament->user_id)
                      <form action="{{route('admin.apartaments.destroy', $apartament->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Elimina">
                      </form>
                      @endif
                    </td>
                    <td>
                      @if(!(\App\Cart::where(['apartament_id' => $apartament->id])->first()))
                        <a class="btn btn-success" href="{{route('admin.cart.apartament', $apartament->id)}}">Sponsorizza</a>
                      @else
                        {{-- <input disabled class="btn btn-primary" value="Sponsorizzato"> --}}
                        Sponsorizzato
                      @endif
                    </td>
    							</tr>
                  @endforeach
    						</tbody>
    					</table>
              {{$apartaments->links()}}
    				</div>
    			</div>
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
