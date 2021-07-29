<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Employee;
use App\Store;
use App\Menus_category;
use App\Menu;
use App\Sale;

class SaleController extends Controller
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
        $stores = Store::all();
        $menus_categories = Menus_category::all();
        $sales = Sale::all();

        return view('sales.index')
            ->with('employees', $employees)
            ->with('stores', $stores)
            ->with('menus_categories', $menus_categories)
            ->with('sales', $sales);
    }

    public function ajax($menus_category)
    {
        $employees = Employee::all();
        $stores = Store::all();
        $menus_categories = Menus_category::all();

        $menus = Menu::where('menu_category_id', $menus_category)->get()->pluck("name", "id");
        return response()->json($menus);

        return view('sales.index')
            ->with('employees', $employees)
            ->with('stores', $stores)
            ->with('menus_categories', $menus_categories)
            ->with('menus', $menus);
    }

    public function store(Request $request)
    {
        //メニュー処理
        $menu_id = array();
        array_push($menu_id, $request->menu_id1, $request->menu_id2, $request->menu_id3, $request->menu_id4, $request->menu_id5);
        $menu_id = array_filter($menu_id); //空の要素を配列から消す
        $menu_id = array_unique($menu_id); //重複した値を配列から消す
        $menu_id_foreach = $menu_id;
        $menu_id = implode(',', $menu_id);

        //インシデントフラグ
        if (!empty($request->incident_date || $request->incident_content)) {
            $incident_happened = 1;
        } else {
            $incident_happened = 0;
        }

        //更新日付取得
        $updated_on = date("Y-m-d");

        //金額のカンマ除去
        $profit = str_replace(',', '', $request->profit);

        //データベースに挿入
        try {
            DB::insert('insert into sales (date, profit, memo, image1, image2, image3, image4, image5, 
                customer_id, employee_id, store_id, gender ,menu_id, incident_date, incident_content, 
                incident_happened ,updated_on) 
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,? ,? ,? ,?)', [
                $request->date, $profit, $request->memo,
                $request->image1, $request->image2, $request->image3,
                $request->image4, $request->image5, $request->customer_id,
                $request->employee_id, $request->store_id, $request->gender, $menu_id,
                $request->incident_date, $request->incident_content, $incident_happened, $updated_on
            ]);

            $last_insert_id = DB::getPdo()->lastInsertId();

            foreach ($menu_id_foreach as $menu) {
                DB::insert('insert into sales_menus (sales_id, menu_id) values (?, ?)', [
                    $last_insert_id, $menu
                ]);
            }
        } catch (\Exception $e) {
            // return redirect()->route('sales.index');
        }

        return redirect()->route('sales.index');
    }

    public function search(Request $request)
    {
        $employees = Employee::all();
        $stores = Store::all();
        $menus_categories = Menus_category::all();

        //担当者検索
        $employee_id = Employee::where('id', $request->employee_id)->value('id');

        //店舗検索
        $store_id = Store::where('id', $request->store_id)->value('id');

        //メニュー検索

        //性別検索

        //インシデント
        // if($request->filled('incident_happened')){
        //     $incident_happened = 0;
        // }else{
        //     $incident_happened = 1;
        // }
        //売上検索処理

        $sales = DB::select("SELECT sales.id, sales.date, sales.profit, employees.first_name AS first_name, 
        stores.name AS store_name, sales.store_id ,sales.updated_on
        FROM sales 
        JOIN employees ON sales.employee_id = employees.id
        JOIN stores ON sales.store_id = stores.id 
        WHERE
        (sales.date BETWEEN '$request->date1' AND '$request->date2') OR
        (sales.profit BETWEEN '$request->profit1' AND '$request->profit2') OR
        (sales.employee_id = '$employee_id') OR
        (sales.store_id = '$store_id')
        ");


        // $sql = "SELECT sales.id, sales.date, sales.profit, employees.first_name AS first_name, 
        // stores.name AS store_name, sales.store_id ,sales.updated_on
        // FROM sales 
        // JOIN employees ON sales.employee_id = employees.id
        // JOIN stores ON sales.store_id = stores.id 
        // WHERE ";
        // if (!empty($request->filled('date1') && $request->filled('date2'))) {
        //     $sql += "(sales.date BETWEEN '$request->date1' AND '$request->date2') AND ";
        // }
        // if (!empty($request->profit1 && $request->profit2)) {
        //     $sql += "(sales.profit BETWEEN '$request->profit1' AND '$request->profit2') AND ";
        // }
        // if (!empty($request->employee_id)) {
        //     $sql += "(sales.employee_id = '$employee_id') AND ";
        // }
        // if (!empty($request->store_id)) {
        //     $sql += "(sales.store_id = '$store_id') AND ";
        // }

        // $sql += "(sales.incident_happened = '$request->incident_happened')";

        // $sales = DB::select($sql);



        //全件検索
        // if (empty($sales)) {
        //     $sales = Sale::all();
        // }

        return view('sales.index')
            ->with('employees', $employees)
            ->with('stores', $stores)
            ->with('menus_categories', $menus_categories)
            ->with('sales', $sales);
    }
}
