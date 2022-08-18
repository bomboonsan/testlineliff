<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderCRUDController extends Controller
{
    // Create Index []
    public function index()
    {
        # code...
        // $date['orders'] = Order::orderBy('id','desc');
        // return view('order.index',$data);
        return view('order.index');
    }

    public function show()
    {
        // $date['orders'] = Order::orderBy('id','desc');
        $data['orders'] = Order::latest()->paginate(100);
        return view('order.show',$data);
        // return view('order.show');
    }

    public function store(Request $request)
    {
        $request->validate([
            'line_displayName'=>'required',
            'line_userId'=>'required',
            'line_thumbnailUrl'=>'required',
            'name'=>'required',
            'order_name'=>'required',
            'sweet_level'=>'required',
            'order_note'=>'required',
        ]);

        $order = new Order;
        $order->line_displayName = $request->line_displayName;
        $order->line_userId = $request->line_userId;
        $order->line_thumbnailUrl = $request->line_thumbnailUrl;
        $order->name = $request->name;
        $order->order_name = $request->order_name;
        $order->sweet_level = $request->sweet_level;
        $order->order_note = $request->order_note;

        $order->save();
        return redirect()->route('order.index');
    }

    // public function print(Order $order)
    // {
    //     return view('order.print', compact('order'));
    // }

    public function print(Order $id)
    {
        //
        // $order = Order::find($id);
        $data['order'] = Order::find($id);
        // return view('posts.show',compact('post'));
        return view('order.print',$data);
    }
    
}
