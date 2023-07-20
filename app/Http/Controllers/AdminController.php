<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Blade;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::count();
        $order = Order::count();
        return view('admin.index', compact('user', 'order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //
        $user = User::all();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect(route('pelanggan'))->with('success','berhasil masuk data yang diinputkan!!');;

    }
    //     $request->validate
    //     (
    //     [
    //         'name' => 'required|max:255',
    //         'email' => 'required|unique:users',
    //         'password' => 'required'Hash::make($request->password)
    //     ]
    //     )
    //     ;
 
    //     $data=[
    //         'name'=>$request->input('name'),
    //         'email'=>$request->input('email'),
    //         'alamat'=>$request->input('alamat'),
    //         'phone' => $request->input('phone'),
    //         'role' => $request->input('role'),
    //         'password' => $request->input('password'),
    //     ];

    // User::create($data);
    // return redirect(route('pelanggan'))->with('success','berhasil masuk data yang diinputkan!!');
    // }

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

    public function tambahPelanggan(){
        return view('admin.tpelanggan');
    }

    public function listorder(){
        $order = Order::with(['OrderDetail', 'OrderDetail.Paket', 'user'])->get();
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        // foreach ($order as $data){
        //     foreach($data->OrderDetail as $item){
        //         return $order;
        //     }
        // }

        return view('admin.listorder', compact('order'));
    }

    public function proses($id){
        $order = Order::find($id)->update([
            'status' => 'Proses'
        ]);
        return redirect(route('listorder'));

    }

    public function selesai($id){
        $order = Order::find($id)->update([
            'status' => 'Selesai'
        ]);
        return redirect(route('listorder'));
    }

}
