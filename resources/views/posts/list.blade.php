
@extends('layouts.app')


@section('content')

<div class="container">
  <a href="/posts/create" class="btn btn-outline-success btn-lg active m-9" role="button" aria-pressed="true">Publicar</a>
</div>

<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           @foreach ($posts as $post)

               <div class="card mt-4">

                   <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                   <div class="card-body">{{$post->description}}</div>

                   <p> Likes: {{$post->likes}}</p>
               </div>  
            <a href="/like/{{$post->id}}" class="btn btn-success"> Like </a>
            <a href="/deslike/{{$post->id}}" class="btn btn-success"> Deslike </a>
            @if (isset($comments))
              @foreach ($comments as $comment)
              @if ($post->id==$comment->post_id)

              <p> {{$comment->comment}} </p>
              <a href="/comment/delete/{{$comment->id}}" class="btn btn-success"> Excluir Comentário </a>
            @endif
            @endforeach
            @endif
               <form action="/comment/{{$post->id}}" method="POST">

                  @csrf

                  <div class="form-group">
                  <textarea class="form-control" name="comment" rows="3" placeholder="Adicione um comentário" style="width: 550px; height: 60px;position:relative;left:5px;top:10px;"></textarea>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-success" type="submit" > Comentar </button>
                  </div>
                </form> 

           @endforeach

       </div>

   </div>

</div>

@endsection