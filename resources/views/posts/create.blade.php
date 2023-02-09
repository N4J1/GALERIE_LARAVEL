<x-layout title="Ajouter un post">
   <main class="container">
         <h1 class="text-left my-4 text-success fw-bold">Poster Nouvelle Image</h1>
         <hr>
         <form action="/posts/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
               <label for="title" class="form-label">Titre</label>
               <input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="{{old('title')}}" required>
               @error('title')
                     <p class="text-danger text-xs">{{$message}}</p>
               @enderror
            </div>
            <div class="mb-3">
               <label for="content" class="form-label">Contenu</label>
               <textarea class="form-control" id="content" name="content" rows="3" value="{{old('content')}}" required></textarea>
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
            <button type="submit" name="submit" class="btn btn-primary form-control">Publier!</button>
         </form>
   </main>
</x-layout>