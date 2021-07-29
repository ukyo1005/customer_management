<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

use Validator;

class EmployeeController extends Controller
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

        return view('employee.index', compact('employees'));
    }

    // public function create()
    // {
    //     return view('employee.create');
    // }

    public function store(Request $request)
    {
        Employee::create($request->all());

        return redirect()->route('stores.index');
    }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     $employee = Employee::find($id);
    //     return view('employee.edit', compact('employee'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $update = [
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'first_name_kana' => $request->first_name_kana,
    //         'last_name_kana' => $request->last_name_kana,
    //         'birthday' => $request->birthday,
    //         'gender' => $request->gender
    //     ];
    //     Employee::where('id', $id)->update($update);
    //     return redirect()->route('employee.index');
    // }

    public function destroy($id)
    {
        Employee::where('id', $id)->delete();
        return redirect()->route('stores.index');
    }

    public function ajax(Request $request, $employee_id)
    {
        $rules = [
            'inputEmp_first_name' => 'required | max:10',
            'inputEmp_last_name' => 'required | max:10',
            'inputEmp_first_name_kana' => 'required | max:20',
            'inputEmp_last_name_kana' => 'required | max:20',
            'inputEmp_gender' => 'required'
        ];

        $message = [
            'inputEmp_first_name.required' => '*「姓」は必須です',
            'inputEmp_first_name.max' => '*「姓」の文字数は10文字以内です',
            'inputEmp_last_name.required' => '*「名」は必須です',
            'inputEmp_last_name.max' => '*「名」の文字数は10文字以内です',
            'inputEmp_first_name_kana.required' => '*「姓/カナ」は必須です',
            'inputEmp_first_name_kana.max' => '*「姓/カナ」の文字数は20文字以内です',
            'inputEmp_last_name_kana.required' => '*「名/カナ」は必須です',
            'inputEmp_last_name_kana.max' => '*「名/カナ」の文字数は20文字以内です',
            'inputEmp_gender.required' => '*「性別」は必須です'
        ];

        $validate = Validator::make($request->all(), $rules, $message);

        if ($validate->fails()) {

            $return = ["result" => "false", "msg" => $validate->getMessageBag()];
            return $return;
        } else {

            $update = [
                'first_name' => $request->inputEmp_first_name,
                'last_name' => $request->inputEmp_last_name,
                'first_name_kana' => $request->inputEmp_first_name_kana,
                'last_name_kana' => $request->inputEmp_last_name_kana,
                'gender' => $request->inputEmp_gender,
                'birthday' => $request->inputEmp_birthday
            ];
            Employee::where('id', $employee_id)->update($update);

            $employees = Employee::where('id', $employee_id)->get();

            $return = ["result" => "true", "msg" => $employees];
            return $return;
        }
    }
}
