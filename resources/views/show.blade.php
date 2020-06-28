{{-- <style>
        #map {
          height: 500px;
          width: 500px;
      }
</style> --}}
@extends('layouts.app')

@section('style')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('header')
  @include('partials.headerBassoFisso')
@endsection

@section('main')
  <div class="mybody">
    <div class="container">
      <div class="about-section">
            <div class="inner-container">
                <h1>{{$apartament->title}}</h1>
                <small>{{$apartament->address}}</small>
                <p class="text">
                  {!!$apartament->description!!}
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque.
                </p>
                <div class="skills">
                  <div> <p>Numero stanze: {{$apartament->rooms_number}}</p>  </div>
                  <div> <p>Numero di bagni: {{$apartament->bathrooms_number}}</p>  </div>
                  <div> <p>Numero letti: {{$apartament->beds_number}}</p>  </div>
                  <div> <p>Dimensioni: {{$apartament->size}}mq</p>  </div>
                  <div> <p>Prezzo: {{$apartament->price}}€</p>  </div>
                </div>
                {{-- <div class="skills">
                  <div> <p>Numero stanze: {{$apartament->rooms_number}}</p>  </div>
                  <div> <p>Numero di bagni: {{$apartament->bathrooms_number}}</p>  </div>
                  <div> <p>Numero letti: {{$apartament->beds_number}}</p>  </div>
                  <div> <p>Dimensioni: {{$apartament->size}}mq</p>  </div>
                  <div> <p>Prezzo: {{$apartament->price}}€</p>  </div>
                </div> --}}
                <div class="apartament-map">
                  <div id="map" data-long="{{$apartament->longitude}}" data-lat="{{$apartament->latitude}}"></div>
                </div>
            </div>
        </div>

    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="message-form">
        <div class="container form">
          <form action="{{route('messages.store')}}" method="POST">
            @method('POST')
            @csrf
            <h1>Contattami per questo appartamento</h1>

            <div class="txtb">
              <label for="name">Nome</label>
              <input name="name" type="text" class="inputdk" id="name" placeholder="Mario Rossi">
            </div>

            <div class="txtb">
              <label for="name">Indirizzo email</label>
              <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
            </div>

            <div class="txtb">
              <label for="name">Messaggio</label>
              <textarea name="message" class="form-control" id="message" rows="3"></textarea>
            </div>

            <div class="form-group">
                <input name="apartamentid" type="hidden" class="form-control" id="apartamentid" value="{{$apartament->id}}">
            </div>
            <input type="submit" class="logbtn inputdk" value="Invia">
          </form>
        </div>
      </div>
    </div>
  </div>

    <style media="screen">

    .mybody{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  /* background-color: #f1f1f1; */
}

.about-section{
  background: url('{{asset('storage/'  . $apartament->cover_img)}}') no-repeat left;
  object-fit: cover;
  background-size: 55%;
  background-color: #fdfdfd;
  overflow: hidden;
  padding: 100px 0;
  position: relative;
}

.apartament-map{
  width: 360px;
  height: 160px;
  margin-top: 50px;
}

.inner-container{
  width: 55%;
  float: right;
  background-color: #ecf0f1;
  padding: 150px;
  border-radius: 10px;
}

.inner-container h1{
  /* margin-bottom: 30px; */
  font-size: 30px;
  font-weight: 900;
}

.text{
  font-size: 13px;
  color: #545454;
  line-height: 30px;
  text-align: justify;
  margin-top: 30px;
  margin-bottom: 40px;
}

.skills{
  display: flex;
  justify-content: space-between;
  font-weight: 700;
  font-size: 13px;
  margin-top: 20px;
}

@media screen and (max-width:1200px){
  .inner-container{
      padding: 80px;
  }
}

@media screen and (max-width:1000px){
  .about-section{
      background-size: 100%;
      padding: 100px 40px;
  }
  .inner-container{
      width: 100%;
  }
}

@media screen and (max-width:600px){
  .about-section{
      padding: 0;
  }
  .inner-container{
      padding: 60px;
  }
}

/* form */
.login-form.formdk{
  width: 300px;
  background: #f1f1f1;
  height: 450px;
  padding: 80px 40px;
  border-radius: 10px;
  overflow: hidden;
}

.login-form.formdk h1{
  text-align: center;
  margin-bottom: 30px;
}

.txtb{
  position: relative;
  z-index: 2;
  margin: 15px 0;
  background: none;
  border: none;
  border-radius: 0;
  border-bottom: 1px solid #fe5b5f 0%;
}

.txtb input.inputdk{
  font-size: 14px;
  color: #333;
  border: none;
  // width: 100%;
  outline: none;
  background: none;
  padding: 0 5px;
  // height: 40px;
}

.txtb span::before{
  content: attr(data-placeholder);
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  z-index: -1;
  transition: .5s;
}

.txtb span::after{
  content: '';
  position: absolute;
  width: 0%;
  height: 2px;
  background: linear-gradient(120deg,#fe5b5f,#fe5b5f60,#fe5b5f);
  transition: .5s;
}

.focus + span::before{
  top: -5px;
}
.focus + span::after{
  width: 50%;
}

.logbtn.inputdk{
  display: block;
  width: 100%;
  height: 50px;
  border: none;
  background: linear-gradient(120deg,#fe5b5f,#fe5b5f60,#fe5b5f);
  background-size: 200%;
  color: #fff;
  outline: none;
  cursor: pointer;
  transition: .5s;
}

.logbtn.inputdk:hover{
  background-position: right;
}

.bottom-text{
  margin-top: 5px;
  text-align: center;
  font-size: 13px;
  a{
    padding: 0;
    margin: 0;
    background: none;
  }
}

.acaso{
  font-size: 12px;
  float: right;
  margin-right: 60px;
  margin-bottom: 30px;
}
    </style>
@endsection

@section('footer')
  @include('partials.footer')
@endsection

@section('svg')
  @include('partials.svg_logo')
@endsection
