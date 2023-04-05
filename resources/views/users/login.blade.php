<x-style title="Se Connecter">
   <body class="d-flex flex-column h-100">
   <nav class="w-100 text-center py-3">
      <a class="" href="/">
         <img src="{{asset('images/logo/logo-svg.svg')}}" alt="logo" width="50">
      </a>
   </nav>
   <section class="d-flex justify-content-center align-items-center flex-grow-1">
  <div class="container w-md-50">
    <h1 class="text-center my-4 text-success fw-bold fs-4 fs-md-5">Se Connecter</h1>
    <hr>
    <form action="/login" method="post">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
            @error('email')
            <p class="text-danger text-xs">{{$message}}</p>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="password" class="form-label">Mot de pass</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de pass" required>
            @error('password')
            <p class="text-danger text-xs">{{$message}}</p>
            @enderror
          </div>
        </div>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-success form-control col-md-12">Se Connecter</button>
      </div>
    </form>
    <div class="mt-2 text-center">
      <p>
        Vous n'avez pas de compte ?
        <a href="/register" class="text-primary">S'inscrire</a>
      </p>
    </div>
  </div>
</section>

</body>
</x-style>
