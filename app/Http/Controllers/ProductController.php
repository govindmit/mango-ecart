<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use App\Models\order;
use App\Models\User;
use App\Models\Shoppingcart;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = product::all();
        $result['data'] = product::paginate(4);
        return view('producttable', $result);



    }
    public function test()
    {
        $result['data'] = product::all();
        $result['data'] = product::paginate(4);
        return view('test', $result);
    }

    public function addproduct()
    {

        return view('addproduct');
    }
    public function createproduct(Request $request)
    {
        $product = new product();
        $product->name = $request->post('name');
        $product->price = $request->post('price');
        if($request->hasfile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $ext;
            $image->move('storage/media/', $image_name);
            $product->image = $image_name;
        }
        $product->description = $request->post('discription');
        echo $product;
        $product->save();
        return redirect('/admin/producttable');
    }
    public function deleteproduct($id)
    {
        product::destroy($id);
        return redirect('/admin/producttable');

    }
    public function updateproduct($id)
    {
        $result['data'] = product::find($id);
        return View('editproduct', $result);

    }
       public function editproduct(Request $request)
    {
        $data = product::find($request->id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->discription;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $image_name = time() . '.' . $ext;
            $image->move('storage/media/', $image_name);
            $data->image = $image_name;
        }

        $data->save();
        $request->session()->flash('message', 'update product successfully');
        return redirect('/admin/producttable');
    }
    
     public function users()
    {
        $user['data'] = User::all();
        $user['data'] = User::paginate(4);
        return view('users', $user);
    }

    public function edituser(Request $request)
    {
        echo "hello";
        $data = User::find($request->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->role_id = $request->role;

        $data->save();
        $request->session()->flash('message', 'update product successfully');
        return redirect('/userslist');
    }

    public function deleteuser($id)
    {
        User::destroy($id);
        return redirect('/userslist');
    }

    public function updateuser($id)
    {
        $result['data'] = User::find($id);
        return View('edituser', $result);
    }
     
     

     public function order($id)
    {

        $result['product'] = DB::table('shoppingcarts')->join('products', 'shoppingcarts.product_id', 'products.id')
            ->where('shoppingcarts.user_id', $id)->sum('products.price');
        $result['user'] = User::where('id', $id)->get();
        return View('order', $result);
    }

    public function orderplace(Request $request)
    {
        $userId = Auth::user()->id;
        $allcart = Shoppingcart::where('user_id', $userId)->get();
        $result['product'] = DB::table('shoppingcarts')->join('products', 'shoppingcarts.product_id', 'products.id')
            ->where('shoppingcarts.user_id', $userId)->sum('products.price');
        foreach ($allcart as $cart) {
            $order = new order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->address1 = $request->post('address');
            $order->address2 = $request->post('address1');
            $order->country = $request->post('country');
            $order->state = $request->post('state');
            $order->zip = $request->post('zip');
            $order->phone = $request->post('phone');
            $order->amount = $result['product'];
            $order->payment_method = $request->post('payment');
            $order->payment_status = 'pending';
            $order->save();
        }
        Shoppingcart::where('user_id', $userId)->delete();
        session()->flash('success', 'Order Created Successfully !!!');
        return redirect('/');
    }

    public function orders()
    {
        $order['data'] = Order::all();
        $order['data'] = Order::paginate(4);
        return view('orderslist', $order);
    }
}