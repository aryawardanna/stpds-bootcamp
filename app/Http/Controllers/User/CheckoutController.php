<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Checkout\Store;
use Illuminate\Support\Facades\Mail;
use App\Mail\Checkout\AfterCheckout;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Camp $camp, Request $request)
    {
		if($camp->isRegistered){
			$request->session()->flash('error', "You are already registred on {$camp->title} camp");
			return redirect(route('user.dashboard'));
		}
        return view('checkout.create', [
			'camp' => $camp
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Camp $camp)
    {

		//mapping req data
		$data = $request->all();
		$data['user_id'] = Auth::id();
		$data['camp_id'] = $camp->id;

		// update user data
		$user = Auth::user();
		$user->email = $data['email'];
		$user->name = $data['name'];
		$user->occupation = $data['occupation'];
		$user->save();

		//create checkout
		$checkout = Checkout::create($data);

		//send email
		Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));

		return redirect(route("checkout.success"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

	public function success(){
		return view('checkout.success');
	}

	public function invoice(Checkout $checkout)
	{
		return $checkout;
	}
}
