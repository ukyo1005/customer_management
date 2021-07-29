@extends('common.flame')

@section('cssStyle')
<link rel="stylesheet" href="{{ asset('css/employee.css') }}">
@endsection

@section('content')

<div class="registration-title">
    &ensp;担当者情報登録
</div>

<div class="registration-outer">
    <div class="registration-wrapper">
        <form action="{{ route('employee.store')}}" method="POST" id="createForm">
            @csrf
            <ul>
                <div class="list1">
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="first_name">姓</label>
                            <span class="required">必須</span>
                        </div>
                        <input type="text" class="text-box" name="first_name" id="first_name" value="{{old('first_name')}}" autocomplete="off">
                    </li>
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="last_name">名</label>
                            <span class="required">必須</span>
                        </div>
                        <input type="text" class="text-box" name="last_name" id="last_name" value="{{old('last_name')}}" autocomplete="off">
                    </li>
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="first_name_kana">姓(カナ)</label>
                            <span class="required">必須</span>
                        </div>
                        <input type="text" class="text-box" name="first_name_kana" id="first_name_kana" value="{{old('first_name_kana')}}" autocomplete="off">
                    </li>
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="last_name_kana">名(カナ)</label>
                            <span class="required">必須</span>
                        </div>
                        <input type="text" class="text-box" name="last_name_kana" id="last_name_kana" value="{{old('last_name_kana')}}" autocomplete="off">
                    </li>
                </div>
                <div class="list2">
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="gender">性別</label>
                            <span class="required">必須</span>
                        </div>
                        <select class="drop-box" name="gender" id="gender">
                            <option value='男'>男</option>
                            <option value='女'>女</option>
                        </select>
                    </li>
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="birthday">生年月日</label>
                        </div>
                        <input type="date" class="text-box" name="birthday" id="birthday" value="{{old('birthday')}}" autocomplete="off">
                    </li>
                    <button type="submit" class="create-btn" id="createButton">新規登録</button>
                </div>
            </ul>
        </form>
    </div>
</div>

<div class="catalog-title">
    &ensp;担当者情報一覧
</div>

<div class="catalog-outer1">
    <div class="catalog-wrapper1">
        <div class="catalog-item-list">
            <div class="catalog-employee-first-name-title">姓</div>
            <div class="catalog-employee-last-name-title">名</div>
            <div class="catalog-employee-first-name-kana-title">姓(カナ)</div>
            <div class="catalog-employee-last-name-kana-title">名(カナ)</div>
            <div class="catalog-employee-age-title">年齢</div>
            <div class="catalog-employee-birthday-title">生年月日</div>
            <div class="catalog-employee-gender-title">性別</div>
        </div>
    </div>
</div>
<div class="catalog-outer2">
    <div class="catalog-wrapper2">
        @foreach ($employees as $employee)
        <div class="column">
            <div class="catalog-employee-first-name">{{ $employee->first_name }}</div>
            <div class="catalog-employee-last-name">{{ $employee->last_name }}</div>
            <div class="catalog-employee-first-name-kana">{{ $employee->first_name_kana }}</div>
            <div class="catalog-employee-last-name-kana">{{ $employee->last_name_kana }}</div>
            <?php
            $now = date("Ymd");
            if ($employee->birthday) {
                $age = $employee->birthday;
            } else {
                $age = date("Ymd");
            }
            $age = str_replace("-", "", $age);
            $age = floor(($now - $age) / 10000);
            if ($employee->birthday) {
            } else {
                $age = "";
            }
            ?>
            <div class="catalog-employee-age">{{ $age }}</div>
            <div class="catalog-employee-birthday">{{ $employee->birthday }}</div>
            <div class="catalog-employee-gender">{{ $employee->gender }}</div>
            <div class="catalog-button1">
                <a href="{{ route('employee.edit',$employee->id) }}">編&ensp;&ensp;集</a>
            </div>
            <div class="catalog-button2">
                <form name="deleteForm" action="{{ route('employee.destroy', $employee->id) }}" method="POST" id="{{ $employee->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="submit-btn" form="{{ $employee->id }}">削&ensp;&ensp;除</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('/js/employees.js') }}"></script>
@endsection