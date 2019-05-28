<?php

namespace App\Http\Controllers;

use App\Address;
use App\Author;
use App\Book;
use App\Barcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books=Book::select(DB::raw('books.*'))
            ->join('authors','authors.id','=','books.author_id')
            ->orderBy('author_lastname','asc')
            ->orderBy('year','asc')
            ->orderBy('edition','asc')
              ->paginate(10);
        $authors=Author::all();

        return view('admin.books.index',compact('books','authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $authors=Author::select(
            DB::raw("CONCAT(author_firstname,' ',author_lastname) AS name"),'id')
            ->orderBy('author_firstname','asc')->get()
            ->pluck('name','id')
            ->prepend('Choose options','default');


        return view('admin.books.create',compact('authors'));
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
         $file=$request->file('photo_id');

         //dd($request->file('photo_id'));
        $check=Auth::user()->roles->where('name', 'admin')->First() == true;
        if($check){
           $book=Book::create($input);
           $book->addMediaFromRequest('photo_id')->toMediaCollection('avatar');
           $book_id=Book::get('id')->last();
           $test=(array_merge($input,['book_id'=>$book_id->id]));
           Barcode::create($test);

        }

        return redirect()->route('books.index',compact('authors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book=Book::findOrFail($id);
        $pictures=$book->getMedia('avatar');
        $authors=Author::select(
            DB::raw("CONCAT(author_firstname,' ',author_lastname) AS name"),'id')
            ->orderBy('author_firstname','asc')->get()
            ->pluck('name','id')
            ->prepend('Choose options','default');

        return view('admin.books.edit',compact('book','pictures','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $input=$request->all();
        $book=Book::findOrFail($id);
        $barcodesId=Barcode::where('book_id',$book->id)->get("id");

        if(isset($input['photo_id'])){
            $book->addMediaFromRequest('photo_id')->toMediaCollection('avatar');
        }

        $book->update($input);

        if(!empty($request->barcode)){
            for ($i=0;$i<count($request->barcode);$i++){

                DB::table('barcodes')
                    ->where('id',$barcodesId[$i]->id)
                    ->update([
                        'barcode'=>$request->barcode[$i]
                    ]);
            }
        }



        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bookId=Book::where('id',$id)->first();
        $bookId->delete();
        $barcodeDel=Barcode::where('book_id',$id)->first();
        $barcodeDel->delete();
        return back();

    }
}
