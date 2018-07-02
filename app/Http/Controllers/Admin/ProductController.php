<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Product;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class ProductController extends Controller {

	/**
	 * Display a listing of product
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $product = Product::all();

		return view('admin.product.index', compact('product'));
	}

	/**
	 * Show the form for creating a new product
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.product.create');
	}

	/**
	 * Store a newly created product in storage.
	 *
     * @param CreateProductRequest|Request $request
	 */
	public function store(CreateProductRequest $request)
	{
	    $request = $this->saveFiles($request);
		Product::create($request->all());

		return redirect()->route(config('quickadmin.route').'.product.index');
	}

	/**
	 * Show the form for editing the specified product.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$product = Product::find($id);
	    
	    
		return view('admin.product.edit', compact('product'));
	}

	/**
	 * Update the specified product in storage.
     * @param UpdateProductRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateProductRequest $request)
	{
		$product = Product::findOrFail($id);

        $request = $this->saveFiles($request);

		$product->update($request->all());

		return redirect()->route(config('quickadmin.route').'.product.index');
	}

	/**
	 * Remove the specified product from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Product::destroy($id);

		return redirect()->route(config('quickadmin.route').'.product.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Product::destroy($toDelete);
        } else {
            Product::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.product.index');
    }

}
