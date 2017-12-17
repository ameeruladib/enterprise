<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Success;
use App\Fail;

class ApplicantController extends Controller
{
    public function processApplicant()
    {
    	$applicants = Applicant::all();
    	$count = 0;
    	foreach ($applicants as $applicant) {
    		if ($count<500) {
    			Success::create([

    				'ic' => $applicant->ic,
    				'name' => $applicant->name,
    				'phone' => $applicant->phone,
    				'address' => $applicant->address,
    				'result' => $applicant->result,
    				'status' => 'succeed',

    			]);
    		}else{
    			Fail::create([

    				'ic' => $applicant->ic,
    				'name' => $applicant->name,
    				'phone' => $applicant->phone,
    				'address' => $applicant->address,
    				'result' => $applicant->result,
    				'status' => 'failed',

    			]);
    		}
    		$count = $count + 1;
    	}
    	Applicant::truncate();
    	return redirect('/processed');
    }

    public function viewProcessed()
    {
    	$successes = Success::all();
    	$fails = Fail::all();

    	return view('processed',compact('successes','fails'));
    }
}
