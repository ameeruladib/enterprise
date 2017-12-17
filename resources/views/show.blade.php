<!DOCTYPE html>
<html>
<head>
	<title>blabla</title>
</head>
<body>

	<a href="/getdata">Get applicants</a> <a href="/process">Process applicants</a>

<table>
	@foreach($applicants as $applicant)

	<tr>
		<td>{{$applicant->ic}}</td><td>{{$applicant->name}}</td><td>{{$applicant->phone}}</td><td>{{$applicant->address}}</td><td>{{$applicant->result}}</td>
	</tr>

	@endforeach
</table>


</body>
</html>