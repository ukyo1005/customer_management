<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Menu;
use App\Menus_category;

class StoreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::all();
        $menus = Menu::all();
        $menus_categories = Menus_category::all();

        return view('stores.index', compact('employees', 'menus', 'menus_categories'));
    }

    public function ajax()
    {
        $menus_categories = Menus_category::all()->pluck("name", "id");

        return response()->json($menus_categories);
    }
}
