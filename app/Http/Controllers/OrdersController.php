<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\User;
use Illuminate\Http\Request;
use Exception;

class OrdersController extends Controller
{

    /**
     * Display a listing of the orders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $ordersObjects = orders::with('user')->paginate(25);

        return view('orders.index', compact('ordersObjects'));
    }

    /**
     * Show the form for creating a new orders.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $users = User::pluck('id','id')->all();
        
        return view('orders.create', compact('users'));
    }

    /**
     * Store a new orders in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            orders::create($data);

            return redirect()->route('orders.orders.index')
                ->with('success_message', 'Orders was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified orders.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $orders = orders::with('user')->findOrFail($id);

        return view('orders.show', compact('orders'));
    }

    /**
     * Show the form for editing the specified orders.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $orders = orders::findOrFail($id);
        $users = User::pluck('id','id')->all();

        return view('orders.edit', compact('orders','users'));
    }

    /**
     * Update the specified orders in the storage.
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
            
            $orders = orders::findOrFail($id);
            $orders->update($data);

            return redirect()->route('orders.orders.index')
                ->with('success_message', 'Orders was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified orders from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $orders = orders::findOrFail($id);
            $orders->delete();

            return redirect()->route('orders.orders.index')
                ->with('success_message', 'Orders was successfully deleted.');
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
                'user_id' => 'nullable',
            'is_active' => 'boolean|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_active'] = $request->has('is_active');

        return $data;
    }

}
