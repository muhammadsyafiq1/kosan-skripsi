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
    <div class="main-wrapper">
      @include('includes.backend.navbar')
      @include('includes.backend.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
        @include('includes.backend.footer')
    </div>
  </div>

  @include('includes.backend.scripts')
  @stack('scripts')

  <!-- Page Specific JS File -->
</body>
</html>
