@props([
   'title' => "",
])
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/lib/libs.bundle.css') }}">
   <link rel="stylesheet" href="{{ asset('css/lib/theme.bundle.css') }}">
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
   <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/x-icon">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
   <title>Galerie {{ $title ? "-" : "" }}  {{ $title }}</title>
</head>
{{-- Navbar --}}
<nav class="navbar navbar-expand-xl navbar-dark navbar-vibrant px-3" style="border: none;">
   <div class="container-fluid">
      <!-- Brand -->
      <a class="navbar-brand" href="/">
         <img src="{{asset('images/logo/logo-svg.svg')}}" alt="..." class="navbar-brand-img" style="margin-top :-1px;" width="100">
         Galerie
      </a>
      
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Collapse -->
      <div class="collapse navbar-collapse m-0" id="navbarSupportedContent2">
         <!-- Nav -->
         <ul class="navbar-nav me-auto">
            <li class="nav-item mx-2">
               <a href="/about" class="nav-link" target="_blank">À propos</a>
            </li>
            @auth
            <li class="nav-item active mx-2">
               <a class="nav-link d-flex align-items-center gap-3" href="/profile/{{auth()->user()->id}}">
                  <div class="avatar-xs">
                     <img src="{{asset('images/avatars/avatar_dog.jpg')}}" alt="..." class="avatar-img rounded-circle">
                   </div>
                  <b><u>@ {{auth()->user()->name}}</u></b><span class="visually-hidden">(current)</span>
               </a>
            </li>
            <li class="nav-item active">
               <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="btn btn-outline-danger">logout</button>
               </form>
            </li>
            @else
            <li class="nav-item active">
               <a class="nav-link" href="/login" target="">Se connecter<span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item active">
               <a class="nav-link" href="/register" target="">S'inscrire<span class="visually-hidden">(current)</span></a>
            </li>
            @endauth
         </ul>
      </div>
   </div>
</nav>
{{-- Body --}}
<body>
   {{ $slot }}
</body>


</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>