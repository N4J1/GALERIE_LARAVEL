<x-style title="Se Connecter">
   <body class="d-flex flex-column h-100">
   <nav class="w-100 text-center py-3">
      <a class="" href="/">
         <img src="{{asset('images/logo/logo-svg.svg')}}" alt="logo" width="50">
      </a>
   </nav>
   <section class="d-flex justify-content-center align-items-center flex-grow-1">
      <div class="container w-25">
         <h1 class="text-center my-4 text-success fw-bold">Se Connecter</h1>
         <hr>
         <form action="/login" method="post">
            @csrf
            
            <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}" required>
               @error('email')
                  <p class="text-danger text-xs">{{$message}}</p>
               @enderror
            </div>
               <label for="password" class="form-label">Mot de pass</label>
            <div class="mb-3">
               <input type="password" class="form-control" id="password" name="password" placeholder="Mot de pass" required>
               @error('password')
                  <p class="text-danger text-xs">{{$message}}</p>
               @enderror
            </div>
            {{-- SUBMIT --}}
            <button type="submit" class="btn btn-success form-control">Se Connecter</button>
         </form>
         <div class="mt-2">
            <p>
               Vous n'avez pas de compte ?
              <a href="/register" class="text-primary">S'inscrire</a>
            </p>
          </div>
      </div>
   </section>
</body>
</x-style>