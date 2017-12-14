<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require dirname(__DIR__) . '\..\..\vendor\autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

use App\Employee;

class MessageController extends Controller
{

    function process_message($message)
    {
    	$messageBody = json_decode($message->body);
    	$employee = Employee::create([
    		'name' => $messageBody->name,
		    'email' => $messageBody->email,
		    'city' => $messageBody->city,
		    'website' => $messageBody->website,
		    'avatar' => $messageBody->avatar,

    	]);

    	if ($message->body === 'quit') {
         $ $message->delivery_info['channel']->basic_cancel($message->delivery_info['consumer_tag']);
     }
    }

	public function getmessage()
	{
		$host = 'mosquito.rmq.cloudamqp.com';
	    $port = 5672;
	    $user = 'bcoocfcv';
	    $pass = '4s4ROw5Zeqy_QhtNKQ5uXtDz2SVj3DBG';
	    $vhost = 'bcoocfcv';
	    $exchange = 'subscriber';
		$queue = 'enterprise_subscriber';
	    $connection = new AMQPStreamConnection($host, $port, $user, $pass, $vhost);
		$channel = $connection->channel();
		$channel->queue_declare($queue, false, true, false, false);
		$channel->exchange_declare($exchange, 'direct', false, true, false);
		$channel->queue_bind($queue, $exchange);
		
		$consumerTag = 'enterprise_consumer';
		$channel->basic_consume($queue, $consumerTag, false, false, false, false, 'process_message');


		register_shutdown_function('shutdown',$channel, $connection);
		// Loop as long as the channel has callbacks registered
		while (count($channel->callbacks)) {
		    $channel->wait();
		}

		return redirect('/show');
	}

	function shutdown($channel, $connection)
	{
	    $channel->close();
	    $connection->close();
	}

	public function show()
	{
		$employees = Employee::all();

		return view('show',compact('employees'));
	}
}
