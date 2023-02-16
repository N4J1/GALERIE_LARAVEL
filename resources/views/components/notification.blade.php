@if(session()->has('message'))
<style>
   .alert-dismissible{
      position: fixed;
      bottom: 10px;
      right: 10px;
   }
</style>
<div class="alert alert-primary alert-dismissible fade show" role="alert" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
   {{session('message')}}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
@endif