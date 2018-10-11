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
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            </div>
            @endforeach
        </div>
@endsection