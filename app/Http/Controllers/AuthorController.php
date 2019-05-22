<?php

namespace App\Http\Controllers;

use App\Author;
use App\Barcode;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $authors=Author::select(DB::raw('authors.*'))
            ->orderBy('author_lastname','asc')
            ->paginate(10);

        return view('admin.authors.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input=$request->all();
        Author::create($input);
        $authors=Author::paginate(10);

        return view('admin.authors.index',compact('authors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $author=Author::findOrFail($id);
        return view('admin.authors.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input=$request->all();
        $author=Author::findOrFail($id);
        $author->update($input);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $author=Author::where('id',$id)->first();
        $author->delete();
        $books=Book::where('author_id',$id)->get();
        foreach($books as $book){
            $book->delete();
            $barcodes=Barcode::where('book_id',$book->id)->get();
            foreach($barcodes as $barcode){
                $barcode->delete();
            }
        }
        return back();
    }
}
