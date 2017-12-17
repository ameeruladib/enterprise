<!DOCTYPE html>
<html>
<head>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<title></title>
</head>
<body>
<p>processing...<br>
please wait until we redirect you</p>
<script type="text/javascript">
	
	axios({method:'get',url: '/getamqp',timeout: 1000000})
	.then(response=>{
		console.log(response);
		return response.data;
	}).catch(e=>{
		console.log(e);
		window.location.replace('/getdata');
	}).then(link=>{
		window.location.replace('/show');
	});

</script>
</body>
</html>