<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\FrMenu;
use App\Http\Requests\CreateFrMenuRequest;
use App\Http\Requests\UpdateFrMenuRequest;
use Illuminate\Http\Request;



class FrMenuController extends Controller {

	/**
	 * Display a listing of frmenu
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $frmenu = FrMenu::all();

		return view('admin.frmenu.index', compact('frmenu'));
	}

	/**
	 * Show the form for creating a new frmenu
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.frmenu.create');
	}

	/**
	 * Store a newly created frmenu in storage.
	 *
     * @param CreateFrMenuRequest|Request $request
	 */
	public function store(CreateFrMenuRequest $request)
	{
	    
		FrMenu::create($request->all());

		return redirect()->route(config('quickadmin.route').'.frmenu.index');
	}

	/**
	 * Show the form for editing the specified frmenu.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$frmenu = FrMenu::find($id);
	    
	    
		return view('admin.frmenu.edit', compact('frmenu'));
	}

	/**
	 * Update the specified frmenu in storage.
     * @param UpdateFrMenuRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateFrMenuRequest $request)
	{
		$frmenu = FrMenu::findOrFail($id);

        

		$frmenu->update($request->all());

		return redirect()->route(config('quickadmin.route').'.frmenu.index');
	}

	/**
	 * Remove the specified frmenu from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		FrMenu::destroy($id);

		return redirect()->route(config('quickadmin.route').'.frmenu.index');
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
            FrMenu::destroy($toDelete);
        } else {
            FrMenu::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.frmenu.index');
    }

}
