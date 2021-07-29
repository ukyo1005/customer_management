<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menus_category;

use Validator;

class Menus_categoryController extends Controller
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
        Menus_category::create(['name' => $request->category_name]);
        return redirect()->route('stores.index')->with('status', '1');
    }

    public function destroy($id)
    {
        Menus_category::where('id', $id)->delete();
        return redirect()->route('stores.index')->with('status', '1');
    }

    public function ajax(Request $request, $menus_category_id)
    {
        $rules = [
            'inputTitle_category' => 'required | max:20'
        ];

        $message = [
            'inputTitle_category.required' => '*「カテゴリ名」は必須です',
            'inputTitle_category.max' => '*「カテゴリ名」の文字数は20文字以内です'
        ];

        $validate = Validator::make($request->all(), $rules, $message);

        if ($validate->fails()) {

            $return = ["result" => "false", "msg" => $validate->getMessageBag()];
            return $return;
        } else {

            $update = [
                'name' => $request->inputTitle_category
            ];
            Menus_category::where('id', $menus_category_id)->update($update);

            $categories = Menus_category::where('id', $menus_category_id)->get()->pluck("name");

            $return = ["result" => "true", "msg" => $categories];
            return $return;
        }
    }
}
