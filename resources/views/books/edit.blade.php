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
        @if($book->vpath!=null)
        <div class="col-lg-4">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        VER PORTADA
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Portada</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <img width="100%" src="{{route('portadas',$book->vpath)}}"/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>



            
        </div>
        @endif
</div>
@endsection

