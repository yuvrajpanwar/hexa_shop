<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\TryCatch;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders()
    {
        $orders = Order::all();
        // return $orders;
        return view('auth\orders');
    }

    public function allOrders(Request $request)
    {

        // Page Length
        $pageNumber = ($request->start / $request->length) + 1;
        $pageLength = $request->length;
        $skip       = ($pageNumber - 1) * $pageLength;

        // Page Order
        $orderColumnIndex = $request->order[0]['column'] ?? '0';
        $orderBy = $request->order[0]['dir'] ?? 'desc';

        // get data from table
        $query = Order::select('*');

        // Search
        $search = $request->search;
        $query = $query->where(function ($query) use ($search) {
            $query->orWhere('id', 'like', "%" . $search . "%");
            $query->orWhere('razorpay_order_id', 'like', "%" . $search . "%");
            $query->orWhere('total_amount', 'like', "%" . $search . "%");
            $query->orWhere('name', 'like', "%" . $search . "%");
            $query->orWhere('email', 'like', "%" . $search . "%");
            $query->orWhere('payment_status', 'like', "%" . $search . "%");
            $query->orWhere('order_status', 'like', "%" . $search . "%");
        });

        $orderByName = 'id';
        switch ($orderColumnIndex) {
            case '0':
                $orderByName = 'id';
                break;
            case '1':
                $orderByName = 'razorpay_order_id';
                break;
            case '2':
                $orderByName = 'total_amount';
                break;
            case '3':
                $orderByName = 'name';
                break;
            case '4':
                $orderByName = 'email';
                break;
            case '5':
                $orderByName = 'payment_status';
                break;
            case '6':
                $orderByName = 'order_status';
                break;
        }
        $query = $query->orderBy($orderByName, $orderBy);
        $recordsFiltered = $recordsTotal = $query->count();
        $orders = $query->skip($skip)->take($pageLength)->get();

        return response()->json(["draw" => $request->draw, "recordsTotal" => $recordsTotal, "recordsFiltered" => $recordsFiltered, 'data' => $orders], 200);
    }

    function update_order_status(Request $request)
    {
        $id = $request->id;
        $order_stauts = $request->order_status;
        $order = Order::where('id', $id)->first();
        $order->order_status = $order_stauts;
        $order->save();
        return response()->json(['message' => 'updated successfully'], 200);
    }
}
