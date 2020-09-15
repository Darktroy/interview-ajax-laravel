<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\order_items;
use Illuminate\Http\Request;
use Exception;

class OrderItemsController extends Controller
{

    /**
     * Display a listing of the order items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $orderItemsObjects = order_items::with('order','item')->paginate(25);

        return view('order_items.index', compact('orderItemsObjects'));
    }

    /**
     * Show the form for creating a new order items.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $orders = Order::pluck('is_active','id')->all();
$items = Item::pluck('id','id')->all();
        
        return view('order_items.create', compact('orders','items'));
    }

    /**
     * Store a new order items in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            order_items::create($data);

            return redirect()->route('order_items.order_items.index')
                ->with('success_message', 'Order Items was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified order items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $orderItems = order_items::with('order','item')->findOrFail($id);

        return view('order_items.show', compact('orderItems'));
    }

    /**
     * Show the form for editing the specified order items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $orderItems = order_items::findOrFail($id);
        $orders = Order::pluck('is_active','id')->all();
$items = Item::pluck('id','id')->all();

        return view('order_items.edit', compact('orderItems','orders','items'));
    }

    /**
     * Update the specified order items in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $orderItems = order_items::findOrFail($id);
            $orderItems->update($data);

            return redirect()->route('order_items.order_items.index')
                ->with('success_message', 'Order Items was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified order items from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $orderItems = order_items::findOrFail($id);
            $orderItems->delete();

            return redirect()->route('order_items.order_items.index')
                ->with('success_message', 'Order Items was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'order_id' => 'nullable',
            'item_id' => 'nullable',
            'price_per_one' => 'string|min:1|nullable',
            'quantity' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
