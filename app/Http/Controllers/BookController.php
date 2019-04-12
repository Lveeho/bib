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
        $books=Book::paginate(10);



        //dd($test);
        return view('admin.books.index',compact('books'));
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
        $check=Auth::user()->roles->where('name', 'admin')->First() == true;
        if($check){
           Book::create($input);
           $book_id=Book::get('id')->last();
           $test=(array_merge($input,['book_id'=>$book_id->id]));
           Barcode::create($test);

        }

        if($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Book::create(['photo_id'=>$name]);
            $input['photo_id']=$photo;

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
        //$barcodes=Barcode::where('id',$book->book_id)->first();
       // dd($barcodes);


        return view('admin.books.edit',compact('book'));
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

        if(!empty($request->barcode)){
            for ($i=0;$i<count($request->barcode);$i++){
                DB::table('barcodes')
                    ->where('id',$barcodesId[$i]->id)
                    ->update([
                        'barcode'=>$request->barcode[$i]
                    ]);
            }
        }
        $book->update($input);
        //dd($input);
//        if($file=$request->file('photo_id')){
//            $name=time().$file->getClientOriginalName();
//            $file->move('images',$name);
//            $photo=Book::create(['photo_id'=>$name]);
//            $input['photo_id']=$photo;
//        }

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
    }
}
