<x-layout title="Modifier le post">
   <section class="container">
      <hr>
      <a href="/" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Retour</a>
      <hr>
      <h1 class="text-center my-4 text-success fw-bold">Modifier le post</h1>
      <hr>
      <form action="/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="{{$post->title}}" required>
            @error('title')
                  <p class="text-danger text-xs">{{$message}}</p>
            @enderror
         </div>
         <div class="mb-3">
            <label for="body" class="form-label">Contenu</label>
            <textarea class="form-control" id="body" name="body" rows="3" required>{{$post->content}}</textarea>
            @error('content')
                  <p class="text-danger text-xs">{{$message}}</p>
            @enderror
         </div>
         <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" type="file" id="image" name="image" accept=".png, .jpg, .jpeg">
            @error('image')
                  <p class="text-danger text-xs">{{$message}}</p>
            @enderror
         </div>
         <p class="text-center mb-3">
            <img src="{{asset($post->image)}}" alt="..." class="img-fluid rounded" width="150px">
         </p>
         <button type=" submit" name="submit" class="btn btn-info form-control">Modifier</button>
      </form>
   </section>
</x-layout>
