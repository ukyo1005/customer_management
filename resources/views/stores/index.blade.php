@extends('common.flame')

@section('cssStyle')
<link rel="stylesheet" href="{{ asset('css/store.css') }}">
@endsection

@section('content')

<div class="tab_wrap">
    <input id="tab1" type="radio" name="tab_btn" @if (Session::has('status')) @else checked @endif>
    <input id="tab2" type="radio" name="tab_btn" @if (Session::has('status')) checked @endif>

    <div class="tab_area">
        <label class="tab1_label" for="tab1">担当者情報</label>
        <label class="tab2_label" for="tab2">メニュー情報</label>
    </div>
    <div class="panel_area">
        <div id="panel1" class="tab_panel">
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
                                <li class="form-item">
                                    <div class="form-item-title">
                                        <label for="start">実務開始月</label>
                                    </div>
                                    <input type="month" class="text-box" name="start" id="start" value="{{old('start')}}" autocomplete="off">
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
                        <div class="catalog-employee-exp-title">実務年数</div>
                        <div class="catalog-employee-start-title">実務開始月</div>
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

                        <?php
                        $now = date("Ym");
                        if ($employee->start) {
                            $exp = $employee->start;
                        } else {
                            $exp = date("Ym");
                        }

                        $exp = str_replace("-", "", $exp);
                        $year = substr($exp, 0, 4);
                        $month = substr($exp, 4, 2);
                        $year_now = substr($now, 0, 4);
                        $month_now = substr($now, 4, 2);

                        $exp = $year_now - $year;
                        if ($month > $month_now) {
                            $exp = $exp - 1;
                        }

                        if ($employee->start) {
                        } else {
                            $exp = "";
                        }
                        ?>

                        <div class="catalog-employee-exp">{{ $exp }}</div>
                        <div class="catalog-employee-start">{{ $employee->start }}</div>
                        <div class="catalog-employee-gender">{{ $employee->gender }}</div>
                        <div class="catalog-button1">
                            <button type="button" style="color:#fff;" class="employee-btn" value="{{ $employee->id }}">
                                編&ensp;&ensp;集</a>
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
        </div>
        <div id="panel2" class="tab_panel">
            <div class="registration-title">
                <label for="aaa">
                    &ensp;メニューカテゴリ登録&ensp;<button class="aaa" id="aaa">▼</button>
                </label>
            </div>

            <div class="registration-outer1">
                <div class="registration-wrapper">
                    <form action="{{ route('menus_categories.store')}}" method="POST" id="createForm2">
                        @csrf
                        <ul>
                            <div class="list1">
                                <li class="form-item">
                                    <div class="form-item-title">
                                        <label for="category_name">カテゴリ名</label>
                                        <span class="required">必須</span>
                                    </div>
                                    <input type="text" class="text-box" name="category_name" id="category_name" value="{{old('category_name')}}" autocomplete="off">
                                </li>
                                <button type="submit" class="create-btn2" id="createButton2">カテゴリ新規登録</button>
                            </div>
                        </ul>
                    </form>
                </div>
            </div>

            <div class="registration-title">
                &ensp;メニュー登録
            </div>

            <div class="registration-outer2">
                <div class="registration-wrapper">
                    <form action="{{ route('menus.store')}}" method="POST" id="createForm3">
                        @csrf
                        <ul>
                            <div class="list1">
                                <li class="form-item">
                                    <div class="form-item-title">
                                        <label for="menu_category_id">カテゴリ名</label>
                                    </div>
                                    <select class="drop-box" name="menu_category_id" id="menu_category_id">
                                        @foreach($menus_categories as $menus_category)
                                        <option value='{{ $menus_category->id }}'>{{ $menus_category->name }}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li class="form-item">
                                    <div class="form-item-title">
                                        <label for="name">メニュー名</label>
                                        <span class="required">必須</span>
                                    </div>
                                    <input type="text" class="text-box" name="name" id="name" value="{{old('name')}}" autocomplete="off">
                                </li>
                                <button type="submit" class="create-btn2" id="createButton3">メニュー新規登録</button>
                            </div>
                        </ul>
                    </form>
                </div>
            </div>

            <div class="catalog-title">
                &ensp;メニュー情報一覧
            </div>

            <div class="catalog-outer2">
                <div class="catalog-wrapper2">
                    @foreach ($menus_categories as $menus_category)
                    <div class="column1">
                        <div class="catalog-category-name"><span style="margin-left:10px;">{{ $menus_category->name }}</span></div>
                        <div class="space"></div>
                        <div class="catalog-button1">
                            <button type="button" style="color:#fff;" class="category-btn" value="{{ $menus_category->id }}">
                                編&ensp;&ensp;集
                            </button>
                        </div>
                        <div class="catalog-button2">
                            <form name="deleteForm2" action="{{ route('menus_categories.destroy', $menus_category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="submit-btn">削&ensp;&ensp;除</button>
                            </form>
                        </div>
                    </div>
                    @foreach ($menus as $menu)
                    @if ($menus_category->id === $menu->menu_category_id)
                    <div class="column2">
                        <div class="catalog-menu-name"><span style="margin-left:30px;">{{ $menu->name }}</span></div>
                        <div class="catalog-button1">
                            <button type="button" style="color:#fff;" class="menu-btn" value="{{ $menu->id }}">
                                編&ensp;&ensp;集</a>
                        </div>
                        <div class="catalog-button2">
                            <form name="deleteForm" action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="submit-btn">削&ensp;&ensp;除</button>
                            </form>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal-category">
    <div>
        <p class="modal-title">メニューカテゴリ編集</p>
    </div>
    <div class="modal-input">
        <li>
            <label for="inputTitle_category">カテゴリ名 (20文字以内) <span class="red">*必須&ensp;<span class="errorMsg"></span></label>
            <input id="inputTitle_category" type="text" class="edit-box" autocomplete="off">
        </li>
    </div>
    <div class="modal-btn">
        <button type="button" class="btn-cancel-category">キャンセル</button>
        <button id="category_saver" type="button">保存する</button>
    </div>
</div>

<div class="modal-menu">
    <div>
        <p class="modal-title">メニュー編集</p>
    </div>
    <div class="modal-input">
        <li>
            <label for="inputTitle_menu">メニュー名 (20文字以内) <span class="red">*必須&ensp;<span class="errorMsg"></span></label>
            <input id="inputTitle_menu" type="text" class="edit-box" autocomplete="off">
        </li>
    </div>
    <div class="modal-btn">
        <button type="button" class="btn-cancel-menu">キャンセル</button>
        <button id="menu_saver" type="button">保存する</button>
    </div>
</div>

<div class="modal-employee">
    <div>
        <p class="modal-title">担当者編集</p>
    </div>
    <div class="modal-input">
        <div class="empModal-list">
            <li>
                <label for="inputEmp_first_name">姓 (10文字以内) <span class="red">*必須</span>&ensp;<span class="errorMsg_first_name red"></span></label>
                <input id="inputEmp_first_name" type="text" class="edit-box" autocomplete="off">
            </li>
        </div>
        <div class="empModal-list">
            <li>
                <label for="inputEmp_last_name">名 (10文字以内) <span class="red">*必須</span>&ensp;<span class="errorMsg_last_name red"></span></label>
                <input id="inputEmp_last_name" type="text" class="edit-box" autocomplete="off">
            </li>
        </div>
        <div class="empModal-list">
            <li>
                <label for="inputEmp_first_name_kana">姓/カナ (20文字以内) <span class="red">*必須</span>&ensp;<span class="errorMsg_first_name_kana red"></span></label>
                <input id="inputEmp_first_name_kana" type="text" class="edit-box" autocomplete="off">
            </li>
        </div>
        <div class="empModal-list">
            <li>
                <label for="inputEmp_last_name_kana">名/カナ (20文字以内) <span class="red">*必須</span>&ensp;<span class="errorMsg_last_name_kana red"></span></label>
                <input id="inputEmp_last_name_kana" type="text" class="edit-box" autocomplete="off">
            </li>
        </div>
        <div class="empModal-list">
            <li>
                <label for="inputEmp_gender">性別 <span class="red">*必須</span>&ensp;<span class="errorMsg_gender red"></span></label><br>
                <select class="drop-box" id="inputEmp_gender">
                    <option value='男'>男</option>
                    <option value='女'>女</option>
                </select>
            </li><br>
        </div>
        <div class="empModal-list">
            <li>
                <label for="inputEmp_birthday">生年月日&ensp;<span class="errorMsg_birthday"></span></label><br>
                <input type="date" class="text-box" id="inputEmp_birthday">
            </li>
        </div>
        <div class="empModal-list">
            <li>
                <label for="inputEmp_birthday">実務開始月&ensp;<span class="errorMsg_birthday"></span></label><br>
                <input type="date" class="text-box" id="inputEmp_birthday">
            </li>
        </div>
        <div class="modal-btn">
            <button type="button" class="btn-cancel-employee">キャンセル</button>
            <button id="employee_saver" type="button">保存する</button>
        </div>
    </div>

    @endsection

    @section('js')
    <script src="{{ asset('/js/stores.js') }}"></script>
    @endsection