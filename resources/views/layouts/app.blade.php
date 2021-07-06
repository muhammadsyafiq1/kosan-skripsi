<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  @include('includes.backend.styles')
</head>

<body>
  <div id="app">
    <section class="section">
      @yield('content')
    </section>
  </div>

    @include('includes.backend.scripts')
</body>
</html>
