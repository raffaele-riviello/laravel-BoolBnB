<form action="{{route('results')}}">
    <div class="form-group">
        {{-- <label for="address">Indirizzo</label> --}}
        <input type="search" class="form-control" id="form-address" placeholder="Dove vuoi andare?" aria-label="Search" />
    </div>
    <div class="form-group">
        {{-- <label for="form-address2">Nome Strada</label> --}}
        <input type="hidden" class="form-control" id="form-address2" placeholder="Inserisci il nome della strada. Esempio: Via Roma" />
    </div>
    <div class="form-group">
        {{-- <label for="form-city">Città</label> --}}
        <input type="hidden" class="form-control" id="form-city" placeholder="Città" />
    </div>
    <div class="form-group">
      {{-- <label for="address">Indirizzo Completo</label> --}}
      <input type="text" name="address" id="full-address-search" class="form-control" readonly="readonly">
    </div>
    <div class="form-group">
      <input type="hidden" id="form-lat" name="latitude" class="form-control">
    </div>
    <div class="form-group">
      <input type="hidden" id="form-lng"name="longitude" class="form-control">
    </div>
    <div class="form-group">
      {{-- <label for="form-zip">Codice Postale</label> --}}
      <input type="hidden" class="form-control" id="form-zip" placeholder="Codice Postale" />
    </div>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
    </form>
