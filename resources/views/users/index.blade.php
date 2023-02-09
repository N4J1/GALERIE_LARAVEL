<x-layout title="{{ucfirst($user->name)}}">
   <main class="container">
      <div class="card text-center w-100">
         <img class="card-img-top card-image" src="{{ asset('images/avatars/avatar_dog.jpg') }}" alt="Post Image">
         <div class="card-body">
            <div class="avatar avatar-xl card-avatar card-avatar-top">
                  <img src="{{ asset('images/avatars/avatar_dog.jpg') }}" alt="..." class="avatar-img rounded-circle border border-4 border-card" height="50">
            </div>
               <h3 class="card-title">@ {{$user->name}}</h3>
            <p class="card-text small text-muted">
               A rejoint <time datetime="{{$user->created_at}}">{{date_format($user->created_at, 'd/m/Y')}}</time>
            </p>
         </div>
      </div>
      <hr>
      <div class="d-flex justify-content-end"><a href="/posts/create" class="btn btn-success fw-bold align-items-center"><i class="fa-sharp fa-solid fa-plus"></i>&nbsp;&nbsp; Ajouter Une Image</a></div>
      <hr>
      <h1 class="text-success">Posts: {{count($user->posts)}}</h1>

      @foreach ($user->posts as $post)
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
                  <i class="fa-regular fa-clock"></i> <time datetime="{{$post->created_at}}">{{$post->created_at}}</time>
               </p>
               <h1 class="card-title text-primary"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
               <p class="card-text post__body">{{$post->content}}</p>
               <div class="d-md-flex gap-2">
                  <a href="/posts/{{$post->id}}" class="btn btn-primary flex-grow-1">Aller à le Post</a>
                  <a href="/{{$post->image}}" class="btn btn-success flex-grow-2" download>Télécharger <i class="fa-solid fa-cloud-arrow-down"></i></a>
               </div>
            </div>
         </div>
      </div>
      @endforeach
      <hr>
   </main>
</x-layout>