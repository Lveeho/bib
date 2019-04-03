<?php
namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Rental;
use App\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::with('roles')->paginate(10);

        //dd($users);
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        //

        $input=$request->all();
        $input['password']=Hash::make($request['password']);
        if(Auth::user()->roles->where('name', 'admin')->First() == true){
            Address::create($input);
            $address_id=Address::get('id')->last();
            $test=(array_merge($input,['address_id'=>$address_id->id]));
            User::create($test);
            //User::create($request->except('address_id'));
        }
        return redirect()->route('users.index');


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

        $user=User::findOrFail($id);
        $roles=Role::pluck('name','id')->all();
        $address=Address::where('id',$user->address_id)->first();
        //dd($address);


        return view('admin.users.edit',compact('user','roles','address'));
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

        $user=User::findOrFail($id);
        $address=Address::where('id',$user->address_id)->first();
        $role_id=$request->role_id;



        if(trim($request->password)==''){ /*objectmanier*/
            $input = $request->except('password'); /*je laat veldje staan en voert uit, uitgezonderd passw*/
        }else{
            $input=$request->all();
            $input['password']=Hash::make($request['password']); /*dit komt uit formulier, veldmanier*/
        }

        if(isset($role_id) ){
            $user->roles()->syncWithoutDetaching([$role_id]);
        }

        $user->update($input);
        $address->update($input);
        return redirect()->back();


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $user=User::findOrFail($id);
        $user->roles()->detach($request['role_id']);

//
        return redirect()->route('users.edit',['id'=>$id]);
    }
}
