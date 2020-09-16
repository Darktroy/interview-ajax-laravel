<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Items;
use Illuminate\Http\Request;
use Exception;

class ItemsController extends Controller
{

    /**
     * Display a listing of the items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $itemsObjects = Items::with('category')->paginate(25);

        return view('items.index', compact('itemsObjects'));
    }

    /**
     * Show the form for creating a new items.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        
        return view('items.create', compact('categories'));
    }

    /**
     * Store a new items in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Items::create($data);

            return redirect()->route('items.items.index')
                ->with('success_message', 'Items was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }
    
    public function jssession(Request $request)
    {
        dd(15);
        try {
            
            $data = $this->getData($request);
            
            Items::create($data);

            return redirect()->route('items.items.index')
                ->with('success_message', 'Items was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $items = Items::with('category')->findOrFail($id);

        return view('items.show', compact('items'));
    }

    /**
     * Show the form for editing the specified items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $items = Items::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('items.edit', compact('items','categories'));
    }

    /**
     * Update the specified items in the storage.
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
            
            $items = Items::findOrFail($id);
            $items->update($data);

            return redirect()->route('items.items.index')
                ->with('success_message', 'Items was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified items from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $items = Items::findOrFail($id);
            $items->delete();

            return redirect()->route('items.items.index')
                ->with('success_message', 'Items was successfully deleted.');
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
                'category_id' => 'nullable',
            'price_per_one' => 'string|min:1|nullable',
            'title' => 'string|min:1|max:255|nullable',
            'details' => 'string|min:1|max:1000|nullable',
            'image' => 'numeric|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
