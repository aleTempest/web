<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
<nav>
    <a href="/">Main page</a>
    <a href="/students">Students</a>
    <a href="/teachers">Teachers</a>
</nav>
<h1 class="text-3xl font-bold underline">
    @yield('title')
</h1>
<hr>
<h3>@yield('content')</h3>
</body>
</html>
