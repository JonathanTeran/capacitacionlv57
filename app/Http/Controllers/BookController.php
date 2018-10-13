<?php

namespace App\Http\Controllers;
use App\Category;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use DB;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('books.index')
            ->with([
                'books'=>Book::when($request->filter!='',
                            function($query)use(&$request){
                                $query->where('title','LIKE',"%{$request->filter}%");
                            })
                            ->where('user_id','=',auth()->user()->id)
                            ->paginate(),
                'filter'=>$request->filter
                ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create')
                ->with([
                    'categories'=>Category::pluck('name','id')->toArray()
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        DB::transaction(function() use($request){
            $book=new Book($request->validated());
            auth()->user()->books()->save($book);
            $category=Category::find($request->category_id);
            
            getUser()->notify(new \App\Notifications\BookCategoryPush($category->name,
            route('category.book',$category->slug)));
        });

     session()->flash('msg','Proceso ejecutado correctamente');
     return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit')
        ->with([
            'categories'=>Category::pluck('name','id')->toArray(),
            'book'=>$book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
       DB::transaction(function() use($request,$book){
         $book->fill($request->validated());
         $book->save();
       });
        
        session()->flash('msg','Proceso ejecutado correctamente');
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function showComments(Book $book){
        return view('books.comments',compact('book'));
    }

    public function like(Book $book){
        $book->likeBy();
        return redirect()->back();
    }

    public function dislike(Book $book){
        $book->dislikeBy();
        return redirect()->back();
    }
}
