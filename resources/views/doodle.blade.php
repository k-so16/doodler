<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doodler -- @yield('title') --</title>
    @yield('res')
  </head>

  <body>
    <header>
      <h1><a href="{{ url('/') }}">Doodler</a></h1>
      <div class="draw"><a href="{{ url('/draw') }}">Let's draw!</a></div>
    </header>

    @yield('content')

    <hr>

    <footer>
      <div class="copyright">
        Copyright &copy; 2018 Soichiro Kato All Rights Reserved.
      </div>
    </footer>
  </body>
</html>
