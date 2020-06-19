<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ---------importo i model che mi servono---------
use App\Apartament;
use App\Feature;
use App\Photo;
use App\Service;
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
      // -----equivalente di Laravel per "$address = $_GET['address']"-----

      // --------li filtro in base alla ricerca fatta dal guest--------
      $apartaments = Apartament::where('address', 'like', '%' .  $address . '%')
                ->get();
      // --------li filtro in base alla ricerca fatta dal guest--------

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
