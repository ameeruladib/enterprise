<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require dirname(__DIR__) . '\..\..\vendor\autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

use App\Applicant;

class MessageController extends Controller
{

	public function show()
	{
		$applicants = Applicant::all();

		return view('show',compact('applicants'));
	}
}
