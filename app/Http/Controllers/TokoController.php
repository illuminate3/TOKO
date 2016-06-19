<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\SaveCustomerRequest;
use Illuminate\Support\Facades\Session;

use App\Product;
use App\Transaction;
use App\Customer;

use Redirect;
use Illuminate\Support\Facades\Input;
use Gloudemans\Shoppingcart\Facades\Cart;

class TokoController extends Controller
{
    public function index() {
		$product = Product::orderBy('id','desc')->paginate(4);
		return view('toko.productlist')->with(compact('product'));
	}

	public function showItem($id) {
		$product = Product::find($id);
		return view('toko.detail')->with(compact('product'));
	}

	public function tambahItem($id) {
	$product = Product::find($id);

		$id          = $product->id;
		$name        = $product->name;
		$qty         = 1;
		$price       = $product->price;

		$data = ['id'         => $id, 
				'name'        => $name, 
				'qty'         => $qty, 
				'price'       => $price, 
				'options'     => ['size' => 'large']];

		Cart::add($data);
		$cart_content = Cart::content(1);
		return view('toko.productcart')->with(compact('cart_content'));
	}

	public function showCart() {
		$cart_content = Cart::content(1);
		return view('toko.productcart')->with(compact('cart_content'));
	}

	public function hapusItem($id) {
		Cart::remove($id);
		$cart_content = Cart::content(1);

		if (Cart::count() == 0) {
		 	return Redirect::to('/')->with('message', 'Batal Transaksi');
		 }
		else {
			return view('toko.productcart')->with(compact('cart_content'));
		}
	}

	public function checkout() {
		$formid       = md5(time());
		$cart_content = Cart::content(1);
		$subtotal	  = 'Rp '.Cart::total(2, ',', '.');

		foreach ($cart_content as $cart) {

			$transaction  = new Transaction();

			$product = Product::find($cart->id);

			$transaction->product_id  = $cart->id;
			$transaction->formid      = $formid;
			$transaction->tanggal     = date('Y-m-d');
			$transaction->qty         = $cart->qty;
			$transaction->total_price = $cart->price * $cart->qty;
			$transaction->status      = 'unpaid';
			$transaction->subtotal 	  = $subtotal;

			$transaction->save();

		}
		
		Cart::destroy();
		return view('toko.customer')->with(compact('formid'));
	}

	public function saveCustomer(SaveCustomerRequest $request) {
		Customer::create($request->all());
		$formid = $request->only('formid');
		//Input::get('formid');
		$notrans = Transaction::where('formid', '=', $formid )->first();
		
		$transaction = Transaction::whereHas('product', function($q) {
			  $formid = Input::get('formid');
	  		  $q->where('formid', '=', $formid);
			})->get();
		
		$customer = Customer::where('formid', '=', $formid)->first();

		Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Terima kasih telah berbelanja. Silakan kirim uang sesuai invoice, kami akan mengkonfirmasi dan memproses pengiriman."
        ]);
		
		return view('toko.invoice', compact('notrans', 'transaction', 'customer'));
	}
		
}
