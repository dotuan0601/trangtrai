<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\FrMenu;
use App\Http\Requests\CreateFrMenuRequest;
use App\Http\Requests\UpdateFrMenuRequest;
use Illuminate\Http\Request;



class HomepageController extends Controller {

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

        $arr_menu = [];
        foreach ($frmenu as $key => $each_menu) {
            if (!$each_menu->parent_id && !array_key_exists($each_menu->name, $arr_menu)) {
                $arr_menu[$each_menu->name] = [
                    'name' => $each_menu->name
                ];

                if ($key == 0) {
                    $arr_menu[$each_menu->name]['is_active'] = true;
                }
                else {
                    $arr_menu[$each_menu->name]['is_active'] = false;
                }
            }
            if ($each_menu->parent_id) {
                if (array_key_exists($each_menu->parent_id, $arr_menu)) {
                    $arr_menu[$each_menu->parent_id]['children'][] = $each_menu->name;
                }
            }
        }

		return view('welcome', compact('arr_menu'));
	}
}
