@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-8">
          
            <div class="card">
            <div class="card-header">
                LIBROS INGRESADOS
            </div>
            <div class="card-body">
                <h5 class="card-title">Listado de Libros</h5>
                <a href="{{route('books.create')}}" class="btn btn-primary">AGREGAR</a>
                <table class="table">
                    <tr>
                        <td>Titulo</td>
                        <td>Descripcion</td>
                        <td>Precio</td>
                        <td>Acciones</td>
                    </tr>
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->title}}</td>
                            <td>{{$book->description}}</td>
                            <td>{{$book->price}}</td>
                            <td>
                            <a href="{{route('books.edit',$book->slug)}}"
                                 class="btn btn-outline-info">
                                    <i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!! $books->render() !!}
            </div>
            </div>

        </div>
</div>
@endsection

