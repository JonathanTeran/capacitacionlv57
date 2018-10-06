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
                            {!!Form::open([
                                'route'=>['books.destroy',$book->slug],
                                'method'=>'DELETE'
                            ])!!}
                            <a href="{{route('books.edit',$book->slug)}}"
                                 class="btn btn-outline-info">
                                    <i class="fas fa-edit"></i></a>
                                    
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            {!!Form::close()!!}
                            
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

@section('form-search')
<form class="form-inline my-2 my-lg-0"
 action="{{route('books.index')}}">
<input name="filter" value='{{$filter}}' class="form-control mr-sm-2" 
        type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0"
             type="submit">Buscar</button>
</form>
@endsection

