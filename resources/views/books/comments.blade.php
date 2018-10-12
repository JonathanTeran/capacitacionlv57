@extends('layouts.app')
@section('content')
        <h2 class="text-center 
                text-danger">
                Comentarios del libro:
                     {{$book->title}}
        </h2>
        <hr/>

        <div id="disqus_thread"></div>
@endsection