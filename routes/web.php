<?php

ini_set('max_execution_time', 180);

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

Route::get('/', function () {
    return view('home');
});

// Route::get('/getmessage', 'MessageController@getmessage');
//show the applicants list
Route::get('/show', 'MessageController@show');

//getting the data
Route::get('/getdata',function(){
	return view('getting');
});

Route::get('/test', function(){

	Amqp::consume('upm-result', function ($message, $resolver) {
    		
       // $messageBody = json_decode($message->body);

       echo $message->body."<br><br><br><br><br><br>";

	   // $resolver->acknowledge($message);

	   $resolver->stopWhenProcessed();
	        
	});
	echo "<br><br><br><br><br><br>";

	// Amqp::consume('upm-fail', function ($message, $resolver) {
    		
 //       // $messageBody = json_decode($message->body);

 //       echo $message->body."<br><br><br><br><br><br>";

	//    $resolver->acknowledge($message);

	//    $resolver->stopWhenProcessed();
	        
	// });
});

Route::get('/getamqp', function(){

	$count = 1;
	Amqp::consume('upm-applicant', function ($message, $resolver) {
    		
       $messageBody = json_decode($message->body);
	   
	   App\Applicant::create([
	   		'ic' => $messageBody->ic,
	   		'name' => $messageBody->name,
	   		'phone' => $messageBody->phone,
		    'address' => $messageBody->address,
		    'result' => $messageBody->result,
		    'status' => 'Applying'
	   ]);

	   $resolver->acknowledge($message);

	   $resolver->stopWhenProcessed();
	        
	});
	
	return '/show';
});

//process data from above
Route::get('/process', 'ApplicantController@processApplicant');
Route::get('/processed', 'ApplicantController@viewProcessed');



// Route::get('/counter',function(){
// 	$count = App\Employee::all()->count();
// 	return $count;
// });


Route::get('/sendmessagesuccess', function(){
	return view('sendmessagesuccess');
});
Route::get('/sendmessagefail', function(){
	return view('sendmessagefail');
});

Route::get('/sendmessage',function()
{
	echo "Sending...<br>Please wait until we redirect you.";
	$successes = App\Success::all();
	$messageBody = json_encode($successes);
	Amqp::publish('', $messageBody , ['queue' => 'upm-result']);
	$fails = App\Fail::all();
	$messageBody = json_encode($fails);
	Amqp::publish('', $messageBody , ['queue' => 'upm-result']);
	return redirect('/messagesent');
});

// Route::get('/sendfail',function()
// {
// 	echo "Sending...<br>Please wait until we redirect you.";
// 	$fails = App\Fail::all();
// 	// foreach ($fails as $fail) {
// 		// $messageBody = json_encode($fail);
// 		$messageBody = json_encode($fails);
// 		Amqp::publish('', $messageBody , ['queue' => 'upm-result']);
// 	// }
// 	return redirect('messagesent');
// });

Route::get('/messagesent',function(){
	return view('messagesent');
});