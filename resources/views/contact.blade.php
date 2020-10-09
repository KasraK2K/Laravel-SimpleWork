<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="/css/tailwind.css" rel="stylesheet">
{{--	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">--}}
	<title>Contact</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<form class="bg-white p-6 rounded shadow-md" style="width: 300px" method="POST" action="/contact">

	@csrf

	<div>

		<label for="email" class="block text-xs uppercase font-semibold mb-1">Email Address</label>

		<input type="text" id="email" name="email" class="border px-2 py-1 text-sm w-full @error('email') border-red-500 @enderror">
		@error('email')
			<span class="text-red-500 text-sm">{{ $message }}</span>
		@enderror

		@if(session('message'))
			<span class="text-green-500 text-sm">{{ session('message') }}</span>
		@endif

		<button type="submit" class="bg-blue-500 py-2 text-white rounded-full text-sm w-full mt-3">Email Me</button>

	</div>

</form>

</body>
</html>
