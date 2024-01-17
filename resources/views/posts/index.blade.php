<x-layout>
   <main class="container">
   <section class="my-5">
      <div class="d-flex justify-content-end"><a href="/posts/create" class="btn btn-success fw-bold align-items-center"><i class="fa-sharp fa-solid fa-plus"></i>&nbsp;&nbsp; Ajouter Une Image</a></div>
      <hr>
      <h2 class="text-primary">Rechercher</h2>
      <hr>
      <form action="/" class="d-flex gap-2">
         <input type="text" class="form-control" placeholder="Rechercher..." name="search" value="" required>
         <button type="submit" class="btn btn-primary rounded"><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
      <hr>
      <h1 class="text-success my-3">Posts</h1>
      <hr>
   </section>
   <section class="posts">
      @foreach ($posts as $post)
      <div class="col-xs-12">
         <div class="card text-center">
            <img class="card-img-top card-image" src="{{ asset($post->image) }}" alt="Post Image">
            <div class="card-body">
               <div class="avatar avatar-xl card-avatar card-avatar-top">
                  <a href="/profile/{{$post->user->id}}">
                     <img src="{{ asset('images/avatars/avatar_dog.jpg') }}" alt="..." class="avatar-img rounded-circle border border-4 border-card" height="50">
                  </a>
               </div>
               <a href="/profile/{{$post->user->id}}">
                  <h3 class="card-title">@ {{$post->user->name}}</h3>
               </a>
               <p class="card-text small text-muted">
                  <i class="fa-regular fa-clock"></i> <time datetime="{{$post->created_at->diffForHumans()}}">{{$post->created_at->diffForHumans()}}</time>
               </p>
               <h1 class="card-title text-primary"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
               <p class="card-text post__body">{{$post->content}}</p>
               <div class="d-md-flex gap-2">
                  <a href="/posts/{{$post->id}}" class="btn btn-primary flex-grow-1">Aller à le Post</a>
                  <a href="{{$post->image}}" class="btn btn-success flex-grow-2" download>Télécharger <i class="fa-solid fa-cloud-arrow-down"></i></a>
               </div>
            </div>
         </div>
      </div>
      @endforeach
      <div class="mt-6 p-4">
         {{$posts->links()}}
       </div>
   </section>
   </main>
</x-layout>
