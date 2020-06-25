<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Cart;
use App\Apartament;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post('/checkout', function(Request $request) {


    $gateway = new Braintree\Gateway([
    'environment' => config('services.braintree.environment'),
    'merchantId' => config('services.braintree.merchantId'),
    'publicKey' => config('services.braintree.publicKey'),
    'privateKey' => config('services.braintree.privateKey')
]);

    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        // 'customer' => [
        //     'firstName' => 'Luca',
        //     'lastName' => 'Marconi',
        //     'email' => 'luca@gmail.it',
        // ],
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

if ($result->success) {
    $transaction = $result->transaction;
    // header("Location: " . $baseUrl . "transaction.php?id=" . $transaction->id);
    $cart = new Cart;
    $cart->advertising_id = $request->advertisingid;
    $cart->apartament_id = $request->apartamentid;
    $cart->transaction = $transaction->id;
    $cart->start = $request->start;
    $cart->end = $request->end;

    $cart->save();
    // return back()->with('success_message', 'Transaction successful. The ID is:' . $transaction->id);
    return redirect('admin/apartaments');
} else {
    $errorString = "";

    foreach($result->errors->deepAll() as $error) {
        $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
    }

    // $_SESSION["errors"] = $errorString;
    // header("Location: " . $baseUrl . "index.php");
    return back()->withErrors('Error:' . $result->message);
}
});

// ------------rotte guests------------
Route::get('/home', function () {

    $appartamentiSponsorizzati = Apartament::has('carts')->get();

    return view('home', compact('appartamentiSponsorizzati'));
})->name('home');

Route::get('/', function () {

  $appartamentiSponsorizzati = Apartament::has('carts')->get();

    return view('home', compact('appartamentiSponsorizzati'));
})->name('home');

// ------------appartamenti------------
Route::get('/results', 'GuestApartamentController@index')->name('results');
Route::get('/apartaments/{id}', 'GuestApartamentController@show')->name('results.apartament');
// ------------appartamenti------------

// --------------messaggi--------------
Route::resource('messages', 'MessageController');
// --------------messaggi--------------

// ------------rotte guests------------

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::namespace('Admin')
->name('admin.')
->prefix('admin')
->middleware('auth')
->group(function (){
    Route::resource('apartaments', 'ApartamentController');
    // Route::resource('photos', 'PhotoController');
    // Route::resource('features', 'FeatureController');
    // Route::resource('messages', 'MessageController');
    // Route::resource('services', 'ServiceController');
    Route::get('/cart/{id}', function ($id) {

            $gateway = new Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();
        return view('admin.apartaments.cart', compact('token'));
    })->name('cart.apartament');
});
