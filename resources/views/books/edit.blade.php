@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-lg-8">
          
            <div class="card">
            <div class="card-header">
                EDITAR LIBROS
            </div>
            <div class="card-body">
                <h5 class="card-title">Editar Libro</h5>
                {!! Form::open(['route'=>['books.update',$book->slug],'method'=>'PUT','files'=>true]) !!}
                         {!! Field::text('title',$book->title,['label'=>'Titulo','required'=>true]) !!}
                         {!! Field::textarea('description',$book->description,['label'=>'Descripcion','required'=>true]) !!}
                        {!! Field::select('category_id',$categories,$book->category_id,
                                ['label'=>'Categoria','empty'=>'SELECCIONE','required'=>true]
                        )!!}
                        {!! Field::file('vpath',['label'=>'Portada del libro'])!!}
                        {!! Field::text('price',$book->price,['label'=>'Precio','required'=>true]) !!}
                        
                        <a href="{{route('books.index')}}" class="btn btn-danger btn-sm">REGRESAR</a>
                        <button class="btn btn-primary btn-sm" type="submit">GUARDAR</button>
                {!! Form::close() !!}
                </div>
            </div>

        </div>
</div>
@endsection

