<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ---------importo i model che mi servono---------
use Illuminate\Support\Facades\Auth;
use App\Apartament;
use App\Message;
use App\User;
// ---------importo i model che mi servono---------

class MessageController extends Controller
{

  public function __construct()
  {

     $this->middleware('auth')->except('store');

  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Auth::user()->apartaments()->with('messages')->get()->pluck('messages')->flatten();

        return view('admin.messages.index', compact('messages'));
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

        // $id = $request->route('id');
        $data = $request->all();
        $message = new Message;
        $message->apartament_id = $data['apartamentid'];
        $message->name = $data['name'];
        $message->email = $data['email'];
        $message->message = $data['message'];

        $saved = $message->save();

        if($saved) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('admin.messages.show', compact('message'));
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
