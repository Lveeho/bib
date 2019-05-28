<?php

namespace App\Http\Controllers;


use App\Author;
use App\Barcode;
use App\Book;
use App\Logs;
use App\Rental;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FrontController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        return view('search', compact('books'));
    }

    public function searchAuthor(){
            $barcodes=Barcode::all();
            $q = Input::get ( 'q' );
            if(!empty($q)){
                $author = Author::where('author_lastname','LIKE','%'.$q.'%')->orWhere('author_firstname','LIKE','%'.$q.'%')
                    ->get()
                    ->map(function ($row) use ($q) {
                        $row->author_lastname = preg_replace('/(' . $q . ')/i', "<span style='font-weight:bold;'>$1</span>",
                            $row->author_lastname);
                        $row->author_firstname = preg_replace('/(' . $q . ')/i', "<span style='font-weight:bold;'>$1</span>",
                            $row->author_firstname);
                        return $row;
                    });
                $books=Book::all();
                if(count($author) > 0)
                    return view('search',compact('books','barcodes'))->withDetails($author)->withQuery ( $q );
                else return view ('search',compact('books'))->withMessage('No Details found. Try to search again !');
            }
            $p=Input::get('p');
            if(!empty($p)){
                $book=Book::where('booktitle','LIKE','%'.$p.'%')
                    ->get()
                    ->map(function ($row) use ($p) {
                        $row->booktitle = preg_replace('/(' . $p . ')/i', "<span style='font-weight:bold;'>$1</span>",
                            $row->booktitle);
                        return $row;
                    });
                $authors=Author::all();
                if(count($book) > 0)
                    return view('search',compact('authors','barcodes'))->withOthers($book)->withQuery ( $q );
                else return view ('search',compact('authors'))->withMessage('No Details found. Try to search again !');
            }
            $z=Input::get('z');
            if(!empty($z)){
                $description=Book::where('description','LIKE','%'.$z.'%')
                    ->get()
                    ->map(function ($row) use ($z) {
                        $row->description = preg_replace('/(' . $z . ')/i', "<span style='font-weight:bold;'>$1</span>", $row->description);
                        return $row;
                    });
                $authors=Author::all();
                if(count($description) > 0)
                    return view('search',compact('authors','barcodes'))->withDescriptions($description)->withQuery (
                        $q );
                else return view ('search',compact('authors'))->withMessage('No Details found. Try to search again !');
            }
    }


    public function rentBook(Request $request ){
        $bookID=$request->input('id');
        $barcodeIDs=Barcode::where('book_id',$bookID)
            ->where('status',1)
            ->get();
        $user=auth()->user();
        $amountRentals=Rental::where('user_id',$user->id)->get();
        $rentalDates=Rental::select('rentaldate')->get();
        $late=NULL;
        foreach($rentalDates as $rentalDate){
            $endDate=Carbon::createFromFormat('Y-m-d',$rentalDate->rentaldate,
                'Europe/Brussels');
            $endDate->addDays(14);
            $end=$endDate->format('Y-m-d');
            $thisTime=Carbon::now();
            if($thisTime>$end){
                $late=1;
            }
        }
        if($user===null){
            return redirect('login');
        }elseif ((count($barcodeIDs)>0) and (count($amountRentals)<=6) and empty($late)){
            $rental= new Rental();
            $rental->user_id=$user->id;
            $barcodeID=$barcodeIDs[0]->id;
            $rental->barcode_id=$barcodeID;
            $rental->rentaldate=Carbon::now();
            $rental->save();
            $barcodeIDs[0]->status=0;
            $barcodeIDs[0]->save();
            return redirect('/')->with('succes','Boek werd toegevoegd!');
        }elseif(count($amountRentals)>6){
            return redirect('/')->with('status','Meer dan 7 ontleningen zijn niet mogelijk.');
        }elseif(!empty($late)){
            return redirect('/')->with('status','Ontlenen is niet mogelijk, een boek is te laat.');
        }else {
            return redirect('/')->with('status','Het boek is momenteel niet beschikbaar!');
        }




    }

    public function returnBook(Request $request){
        $log=new Logs();
        $log->user_id=$request->input('userId');
        $log->barcode_id=$request->input('barcodeId');;
        $log->rentaldate=$request->input('rentalDate');;
        $log->returndate=Carbon::now();
        $log->save();

        Rental::where('id',$request->input('rentalId'))->delete();

        return back();

    }
}

