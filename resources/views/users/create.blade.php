<x-style title="S'inscrire">
   <body class="d-flex flex-column h-100">
   <nav class="w-100 text-center py-3">
      <a class="" href="/">
         <img src="{{asset('images/logo/logo-svg.svg')}}" alt="logo" width="50">
      </a>
   </nav>
  <section class="d-flex justify-content-center align-items-center flex-grow-1">
  <div class="container w-md-50">
    <h1 class="text-center my-4 text-success fw-bold fs-4 fs-md-5">S'inscrire</h1>
    <hr>
    <form action="/register" method="post">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="name" class="form-label">Nom et Prenom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom et Prenom" value="{{old('name')}}" required>
            @error('name')
            <p class="text-danger text-xs">{{$message}}</p>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
            @error('email')
            <p class="text-danger text-xs">{{$message}}</p>
            @enderror
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="password" class="form-label">Mot de pass</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de pass" required>
            @error('password')
            <p class="text-danger text-xs">{{$message}}</p>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer Mot de pass</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmer Mot de pass" required>
            @error('password_confirmation')
            <p class="text-danger text-xs">{{$message}}</p>
            @enderror
          </div>
        </div>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-success form-control">S'inscrire</button>
         </form>
         <div class="mt-2">
            <p>
               Vous avez déjà un compte ?
               <a href="/login" class="text-primary">Se connecter</a>
            </p>
          </div>
      </div>
   </section>

</body>
</x-style>
