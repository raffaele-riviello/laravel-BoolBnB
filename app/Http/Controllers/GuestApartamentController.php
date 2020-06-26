<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ---------importo i model che mi servono---------
use App\Apartament;
use App\Feature;
use App\Photo;
use App\Service;
use Illuminate\Support\Facades\DB;
// ---------importo i model che mi servono---------

class GuestApartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // -----equivalente di Laravel per "$address = $_GET['address']"-----
      $address = request()->get('address');
      $lat= request()->get('latitude'); //your latitude
      $lng= request()->get('longitude');//your longitude
      $km = 20; //your search radius
      $haversineSQL='( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat .') ) * sin( radians(latitude) ) ) )';
      $apartaments = DB::table('apartaments')
          ->select(DB::raw('id, title, description, cover_img, address, rooms_number, beds_number, bathrooms_number, size, latitude, longitude, '. $haversineSQL .' as distance'))
          ->where('visible', '=', 1)
          ->havingRaw('distance < ?' , [$km])
          ->get();
        // risposta dal db in formato json
        // $response = response()->json($sortByDistance);
        return view('index', compact('apartaments', 'address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

      return view('show', compact('apartament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
