<?php

function getCategoryAndSuscription(){
  
                if(auth()->user()){
                  return  $categorias=App\Category::leftJoin('category_suscriptions as cs',
                  function($query){
                        $query->on( 'cs.category_id','=','categories.id')
                        ->where('cs.user_id','=',getUser()->id);
                    })->select('categories.*','cs.id as suscribe')->get();
                }
    return App\Category::get();
                
}

function getUser(){
    return auth()->user();
}