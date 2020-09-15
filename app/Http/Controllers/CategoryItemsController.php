<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\category_items;
use Illuminate\Http\Request;
use Exception;

class CategoryItemsController extends Controller
{

    /**
     * Display a listing of the category items.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $categoryItemsObjects = category_items::with('category')->paginate(25);

        return view('category_items.index', compact('categoryItemsObjects'));
    }

    /**
     * Show the form for creating a new category items.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name','id')->all();
        
        return view('category_items.create', compact('categories'));
    }

    /**
     * Store a new category items in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            category_items::create($data);

            return redirect()->route('category_items.category_items.index')
                ->with('success_message', 'Category Items was successfully added.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    /**
     * Display the specified category items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $categoryItems = category_items::with('category')->findOrFail($id);

        return view('category_items.show', compact('categoryItems'));
    }

    /**
     * Show the form for editing the specified category items.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $categoryItems = category_items::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('category_items.edit', compact('categoryItems','categories'));
    }

    /**
     * Update the specified category items in the storage.
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
            
            $categoryItems = category_items::findOrFail($id);
            $categoryItems->update($data);

            return redirect()->route('category_items.category_items.index')
                ->with('success_message', 'Category Items was successfully updated.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }        
    }

    /**
     * Remove the specified category items from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $categoryItems = category_items::findOrFail($id);
            $categoryItems->delete();

            return redirect()->route('category_items.category_items.index')
                ->with('success_message', 'Category Items was successfully deleted.');
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
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
