@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-8">
          
            <div class="card">
            <div class="card-header">
                CREAR LIBROS
            </div>
            <div class="card-body">
                <h5 class="card-title">New Libro</h5>
                {!! Form::open(['route'=>'books.store','method'=>'POST','files'=>true]) !!}
                         {!! Field::text('title',null,['label'=>'Titulo','required'=>true]) !!}
                         {!! Field::textarea('description',null,['label'=>'Descripcion','required'=>true]) !!}
                        {!! Field::select('category_id',$categories,null,
                                ['label'=>'Categoria','empty'=>'SELECCIONE','required'=>true]
                        )!!}
                        {!! Field::file('vpath',['label'=>'Portada del libro'])!!}
                        {!! Field::text('price',null,['label'=>'Precio','required'=>true]) !!}
                        
                        <a href="{{route('books.index')}}" class="btn btn-danger btn-sm">REGRESAR</a>
                        <button class="btn btn-primary btn-sm" type="submit">GUARDAR</button>
                {!! Form::close() !!}
                </div>
            </div>

        </div>
</div>
@endsection

