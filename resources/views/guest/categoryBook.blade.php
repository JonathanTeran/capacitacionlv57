@extends('layouts.app')
@section('content')
        <h2 class="text-center 
                text-danger">
                Categoria de libros:
                     {{$category->name}}
        </h2>
        <hr/>

        <div class="row">
            @foreach($category->books as $book)
            <div class="col-lg-4">
            <div class="card" >
            <img class="card-img-top" 
                    src="{{route('portadas',$book->vpath)}}" 
                    width="100%" height="180px">
                <div class="card-body">
                <h5 class="card-title">{{$book->title}}</h5>
                <p class="card-text">{{$book->description}}</p>
                <span><i class="fas fa-clock"></i> 
                        {{$book->created_at->diffForHumans()}}</span> 
                       &nbsp;
                <span><i class="fas fa-user"></i> 
                            {{optional($book->user)->name}}</span>    
                            <br/>
                @auth
                    <a href="{{route('books.comments',$book->slug)}}" class="btn btn-info btn-sm text-white">
                        COMENTARIOS</a>

                    <br/>
                    <a href="{{route('books.like',$book->slug)}}" 
                        class="btn btn-sm">{{$book->likesCount}}  
                        <i class="fas fa-thumbs-up"></i></a> &nbsp;

                    <a class="btn btn-sm"  
                        href="{{route('books.dislike',$book->slug)}}" >
                        {{$book->dislikesCount}}  
                        <i class="fas fa-thumbs-down"></i></a>
                @endauth
                </div>
            </div>
            </div>
            @endforeach
        </div>
@endsection