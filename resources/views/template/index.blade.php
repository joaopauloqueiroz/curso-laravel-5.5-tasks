<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{$title or 'Projects'}}</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
      <br>
        @if($errors->any())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $erro)
              <ul>
                <li>{{$erro}}</li>
              </ul>
          @endforeach
        </div>
        @endif
      
        @if(session('success'))
          <div class="alert alert-success">
              {{session('success')}}
          </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger">
          {{session('error')}}
        </div>
        @endif
      @yield('content')
    </div>
</body>
</html>