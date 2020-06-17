<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// ------------gli elementi che mi servono------------
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// ------------gli elementi che mi servono------------

// ---------importo i model che mi servono---------
use App\Apartament;
use App\Feature;
use App\Photo;
use App\Service;
// ---------importo i model che mi servono---------

class ApartamentController extends Controller
{

  // middleware personalizzato per filtrare gli appartamenti in base all'utente loggato
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
  // middleware personalizzato per filtrare gli appartamenti in base all'utente loggato

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();

        // --------li filtro in base allo user autenticato--------
        $apartaments = Apartament::where('user_id', $user)->paginate(10);
        // --------li filtro in base allo user autenticato--------

        // dd($apartaments);

        return view('admin.apartaments.index', compact('apartaments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::all();
        $photos = Photo::all();
        $services = Service::all();

        return view('admin.apartaments.create', compact('features', 'photos', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Posso anche scegliere di non mettere i dati della request in una variabile
        $data = $request->all();
        // Posso anche scegliere di non mettere i dati della request in una variabile

        // ----qui andrà messa la validazione----
          // code...
        // ----qui andrà messa la validazione----

        $path = Storage::disk('public')->put('images', $data['cover_img']);


        // Instanzio, "fillo" e salvo la nuova instanza con i dati della request
        $apartament = new Apartament;
        $data['user_id'] = Auth::id();
        $data['cover_img'] = $path;
        $apartament->fill($data);
        $saved = $apartament->save();
        // Instanzio, "fillo" e salvo la nuova instanza con i dati della request

        if (!$saved) {
          dd('Qualcosa è andato storto!');
        }

        // Ricordarci di compilare anche le tabelle pivot, ma sempre dopo aver "fillato"
        $apartament->features()->attach($data['features']);
        // $apartament->photos()->attach($data['photos']);
        $apartament->services()->attach($data['services']);
        // Ricordarci di compilare anche le tabelle pivot, ma sempre dopo aver "fillato"

        return redirect()->route('admin.apartaments.show', $apartament->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Con FindOrFail gestisce da solo la 404 senza doverlo fare a mano
        $apartament = Apartament::findOrFail($id);
        // Con FindOrFail gestisce da solo la 404 senza doverlo fare a mano

        return view('admin.apartaments.show', compact('apartament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $apartament = Apartament::findOrFail($id);
      $features = Feature::all();
      $photos = Photo::all();
      $services = Service::all();

      return view('admin.apartaments.edit', compact('apartament', 'features', 'photos', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $apartament = Apartament::findOrFail($id);
        $data = $request->all();
        $userId = Auth::id();
        $owner = $apartament->user_id;


        // Controllo se l'utente loggato ha l'autorizzazione per modificare l'appartamento in questione
        if ($userId != $owner) {
          dd('Non sei autorizzato a modificare questo appartamento');
        }
        // Controllo se l'utente loggato ha l'autorizzazione per modificare l'appartamento in questione

        $apartament->fill($data);
        $updated = $apartament->update();
        if (!$updated) {
           return redirect()->back();
        }

        //----------Sincronizzo la tabella pivot----------
        $apartament->features()->sync($data['features']);
        // $apartament->photos()->sync($data['photos']);
        $apartament->services()->sync($data['services']);
        //----------Sincronizzo la tabella pivot----------
                              // ^ //
                              // | //
                              // | //
        // -------Posso però sincrinizzare anche così facendo manualmente-------
        //$apartament->features()->detach();
        //$apartament->features()->attach($data['features']);
        // -------Posso però sincrinizzare anche così facendo manualmente-------

        return redirect()->route('admin.apartaments.show', $apartament->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartament = Apartament::findOrFail($id);

        // vado a cancellare anche tutti i collegamenti nelle tabelle pivot
        // $apartament->features()->detach();
        // $apartament->photos()->detach();
        // $apartament->services()->detach();
        // vado a cancellare anche tutti i collegamenti nelle tabelle pivot

        $deleted = $apartament->delete();

        if(!$deleted){
            return redirect()->back();
        }

        return redirect()->route('admin.apartaments.index');

    }
}
