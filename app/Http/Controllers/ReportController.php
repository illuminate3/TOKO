<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use App\Transaction;

class ReportController extends Controller
{
	public function index() {
		return view('report.index');
	}

	public function getPeriode(Request $request) {
		$this->validate($request, [
			'begin' => 'required',
			'end' => 'required',
		]);

		$from = date('Y-m-d', strtotime(Input::get('begin')));
		$to = date('Y-m-d', strtotime(Input::get('end')));

		$transaction = Transaction::whereHas('product', function($q) {
			$from = date('Y-m-d', strtotime(Input::get('begin')));
			$to = date('Y-m-d', strtotime(Input::get('end')));

			$q->whereBetween('tanggal', [$from,$to]);
		})->get();

		return view('report.getPeriode', compact('transaction', 'from', 'to'));
	}
}
