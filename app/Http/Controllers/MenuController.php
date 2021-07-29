<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Menus_category;
use App\Menu;

use Validator;

class MenuController extends Controller
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

    public function store(Request $request)
    {
        $menu_category_id = (int)($request->menu_category_id);
        Menu::create(['name' => $request->name, 'menu_category_id' => $menu_category_id]);
        return redirect()->route('stores.index')->with('status', '1');
    }

    public function destroy($id)
    {
        Menu::where('id', $id)->delete();
        return redirect()->route('stores.index')->with('status', '1');
    }

    public function ajax(Request $request, $menu_id)
    {
        $rules = [
            'inputTitle_menu' => 'required | max:20'
        ];

        $message = [
            'inputTitle_menu.required' => '*「メニュー名」は必須です',
            'inputTitle_menu.max' => '*「メニュー名」の文字数は20文字以内です'
        ];

        $validate = Validator::make($request->all(), $rules, $message);

        if ($validate->fails()) {

            $return = ["result" => "false", "msg" => $validate->getMessageBag()];
            return $return;
        } else {

            $update = [
                'name' => $request->inputTitle_menu
            ];
            Menu::where('id', $menu_id)->update($update);

            $menus = Menu::where('id', $menu_id)->get()->pluck("name");

            $return = ["result" => "true", "msg" => $menus];
            return $return;
        }
    }
}
