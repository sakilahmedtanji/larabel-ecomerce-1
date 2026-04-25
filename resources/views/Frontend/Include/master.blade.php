<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-commerce Website</title>
	<!-- Pavicon ICon -->

	@include('Frontend.Include.style')
    @stack('css')
</head>
<body>
	@include('Frontend.Include.header')

	@yield('content')

	@include('Frontend.Include.footer')


	@include('Frontend.Include.script')
    @stack('script')
</body>
</html>