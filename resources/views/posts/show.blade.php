<x-layout title="{{$post->title}}">
   <main class="container">
<hr>
         <div class="container">
            <div class="card">
               <div class="card-body">

                  <!-- Header -->
                  <div class="mb-3">
                     <div class="row align-items-center">
                        <div class="col-auto">

                           <!-- Avatar -->
                           <a href="/profile/{{$post->user->id}}" class="avatar">
                              <img src="{{asset('images/avatars/avatar_dog.jpg')}}" alt="..." class="avatar-img rounded-circle">
                           </a>

                        </div>
                        <div class="col ms-n2">

                           <!-- Author -->
                           <a href="/profile/{{$post->user->id}}">
                           <h4 class="mb-1">
                              <?= $post->user->name ?>
                           </h4>
                           </a>

                           <!-- Time -->
                           <p class="card-text small text-muted">
                              <i class="fa-regular fa-clock"></i> <time datetime="{{$post->created_at}}">{{$post->created_at}}</time>
                           </p>

                        </div>
                        @if($post->user_id == auth()->id())
                        <div class="col-auto">

                           <!-- Edit Buttons -->
                           <div class="buttons">
                              <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
                              <a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-outline-primary">Editer</a>
                           </div>
                           <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="exampleModalLabel">Attention !!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Êtes-vous sûr de vouloir supprimer ce post ?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <form action="/posts/{{$post->id}}" method="post">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        @endif
                     </div> <!-- / .row -->
                  </div>
                  <!-- Title -->
                  <h3 class="mb-3 text-primary fw-bold">
                     <?= $post->title  ?>
                  </h3>
                  <!-- Body -->
                  <p class="mb-3">
                     {{$post->content}}
                  </p>



                  <!-- Image -->
                  <p class="text-center mb-3">
                     <img src="{{asset($post->image)}}" alt="..." class="img-fluid rounded" width="500px">
                  </p>

                  <div class="d-flex justify-content-between text-muted my-3">
                     <small>Dernière actualisation :{{$post->updated_at}}</small><a href="{{asset($post->image)}}" class="btn btn-sm btn-outline-success flex-grow-2" download>Télécharger <i class="fa-solid fa-cloud-arrow-down"></i></a>
                  </div>
                  <!-- Divider -->
                  <h2 class="text-warning fw-bold">Commentaires:</h2>

                  <!-- Comments -->
                  @foreach ($post->comments as $comment)
                      
                  
                     <hr>
                     <div class="comment mb-1">
                        <div class="row align-items-center">
                           <div class="col-auto">

                              <!-- Avatar -->
                              <a class="avatar" href="/profile/{{$comment->user->id}}">
                                 <img src="{{asset('images/avatars/avatar_dog.jpg')}}" alt="..." class="avatar-img rounded-circle">
                              </a>

                           </div>
                           <div class="col ms-n2">

                              <!-- Body -->
                              <div class="comment-body bg-light">

                                 <div class="row">
                                    <div class="col">

                                       <!-- Author -->
                                       <a href="/profile/{{$comment->user->id}}">
                                          <h5 class="comment-title">
                                             <?= $comment->user->name ?>
                                          </h5>
                                       </a>

                                    </div>
                                    <div class="col-auto">

                                       <!-- Time -->
                                       <time class="comment-time">
                                          <?= $comment->created_at ?>
                                       </time>

                                    </div>
                                 </div> <!-- / .row -->

                                 <!-- Text -->
                                 <p class="comment-text">
                                    <?= $comment->content ?>
                                 </p>

                              </div>
                           </div>
                        </div> <!-- / .row -->
                     </div>
                     @endforeach
               </div>



               <!-- Form -->
               @auth
               <div class="row m-3 align-items-center">
                  @error('content')
                     <p class="text-danger text-xs">{{$message}}</p>
                  @enderror
                  <hr>
                  <div class="col-auto">

                     <!-- Avatar -->
                     <div class="avatar avatar-sm">
                        <img src="{{asset('images/avatars/avatar_dog.jpg')}}" alt="..." class="avatar-img rounded-circle">
                     </div>

                  </div>
                  <div class="col ms-n2">

                     <!-- Input -->
                     <form method="post" action="/posts/{{$post->id}}/comments" class="mt-1 row">
                        @csrf
                        <label class="visually-hidden">Laissez un commentaire...</label>
                        <textarea class="form-control form-control-flush" name="content" data-bs-toggle="autosize" rows="1" placeholder="Laissez un commentaire..." ></textarea>
                  </div>
                  <div class="col-auto align-self-center">

                     <!-- Icons -->
                     <button type="submit" class="btn btn-rounded btn-primary">
                        Commenter <i class="fa-solid fa-paper-plane"></i>
                     </button>

                  </div>
                  </form>
               </div> <!-- / .row -->
               @endauth
            </div>
         </div>
         </div>
<hr>
   </main>
</x-layout>