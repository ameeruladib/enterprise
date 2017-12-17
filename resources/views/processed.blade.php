<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<a href="/sendmessage">Send results</a>

<h2>Success Applicants</h2>

<table>
	<tr>
		<th>IC</th><th>Name</th><th>Phone</th><th>Address</th><th>Result</th>
	</tr>
	@foreach($successes as $success)

	<tr>
		<td>{{$success->ic}}</td><td>{{$success->name}}</td><td>{{$success->phone}}</td><td>{{$success->address}}</td><td>{{$success->result}}</td>
	</tr>

	@endforeach
</table>

<h2>Fail Applicants</h2>

<table>
	<tr>
		<th>IC</th><th>Name</th><th>Phone</th><th>Address</th><th>Result</th>
	</tr>
	@foreach($fails as $fail)

	<tr>
		<td>{{$fail->ic}}</td><td>{{$fail->name}}</td><td>{{$fail->phone}}</td><td>{{$fail->address}}</td><td>{{$fail->result}}</td>
	</tr>

	@endforeach
</table>


</body>
</html>