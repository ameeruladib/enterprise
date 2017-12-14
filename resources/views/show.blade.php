<!DOCTYPE html>
<html>
<head>
	<title>blabla</title>
</head>
<body>

<table>
	@foreach($employees as $employee)

	<tr>
		<td>{{$employee->name}}</td><td>{{$employee->email}}</td><td>{{$employee->city}}</td><td>{{$employee->website}}</td><td>{{$employee->avatar}}</td>
	</tr>

	@endforeach
</table>


</body>
</html>