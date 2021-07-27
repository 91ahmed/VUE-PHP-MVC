<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
	</head>
	<body>
		<div id="app">
			<h1>Hello</h1>
			<router-link to="/home/omar">Go to Home</router-link>
    		<router-view></router-view>
		</div>

		<ul>
			@foreach($users as $user)
				<li>{{ $user['username'] }}</li>
			@endforeach
		</ul>

		<script type="module" src="./public/dist/main.js"></script>
	</body>
</html>