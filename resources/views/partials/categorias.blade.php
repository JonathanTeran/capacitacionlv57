
<h2 class="text-primary text-center">CATEGORIAS</h2>
<ul class="list-group">
  @forelse($allCategories as $item)
    <li class="list-group-item">
    <a href="{{route('category.book',$item->slug)}}">
            {{$item->name}} </a>
      <span class="badge badge-primary badge-pill">
        {{$item->books()->count()}}
      </span>
      @auth
    <suscripciones :suscrito='@if($item->suscribe!=null) 0 @else 1 @endif' :categoria='{{$item->id}}'></suscripciones>   
      @endauth
    </li>
  @empty
    No Hay Categorias
  @endforelse  
</ul>