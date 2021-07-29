@extends('common.flame')

@section('cssStyle')
<link rel="stylesheet" href="{{ asset('css/sale.css') }}">
@endsection

@section('content')


<div class="registration-title">
    <label for="aaa">
        &ensp;売上情報登録&ensp;<button class="aaa" id="aaa">▼</button>
    </label>
</div>

<div class="registration-outer">
    <div class="registration-wrapper">
        <form action="{{ route('sales.store')}}" method="POST" id="createForm">
            @csrf

            <ul>
                <div class="list1">
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="date">売上年月日</label>
                            <span class="required">必須</span>
                        </div>
                        <input type="date" class="text-box" name="date" id="date" value="{{old('date')}}" autocomplete="off">
                    </li>
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="profit">売上金額</label>
                            <span class="required">必須</span>
                        </div>
                        <input type="text" class="text-box" name="profit" id="profit" value="{{old('profit')}}" autocomplete="off">
                        <span style="padding-left:3px">円</span>
                    </li>
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="customer_id">顧客名</label>
                        </div>
                        <input type="text" class="text-box" name="customer_id" id="customer_id" value="{{old('customer_id')}}" autocomplete="off">
                    </li>
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
                            <label for="employee_id">担当者</label>
                        </div>
                        <select class="drop-box" name="employee_id" id="employee_id">
                            <option value=''>--選択してください--</option>
                            @foreach($employees as $employee)
                            <option value='{{ $employee->id }}'>{{ $employee->first_name }}{{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="store_id">店舗名</label>
                        </div>
                        <select class="drop-box" name="store_id" id="store_id">
                            <option value=''>--選択してください--</option>
                            @foreach($stores as $store)
                            <option value='{{ $store->id }}'>{{ $store->name }}</option>
                            @endforeach
                        </select>
                    </li>
                </div>
                <div class="list2">
                    <div class="menu-display">
                        <li class="form-item">
                            <div class="form-item-title">
                                <label for="menu_category_id1">メニュー項目</label>
                            </div>
                            <select class="drop-box" name="menus_category_id1" id="menus_category_id1">
                                <option value=''>--選択してください--</option>
                                @foreach($menus_categories as $menus_category)
                                <option value='{{ $menus_category->id }}'>{{ $menus_category->name }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="form-item menu-item">
                            <div class="form-item-title">
                                <label for="menu_id1">メニュー名</label>
                            </div>
                            <select class="drop-box" name="menu_id1" id="menu_id1">
                            </select>
                        </li>
                    </div>
                    <div class="menu-display">
                        <li class="form-item">
                            <div class="form-item-title">
                                <label for="menu_category_id2">メニュー項目</label>
                            </div>
                            <select class="drop-box" name="menus_category_id2" id="menus_category_id2">
                                <option value=''>--選択してください--</option>
                                @foreach($menus_categories as $menus_category)
                                <option value='{{ $menus_category->id }}'>{{ $menus_category->name }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="form-item menu-item">
                            <div class="form-item-title">
                                <label for="menu_id2">メニュー名</label>
                            </div>
                            <select class="drop-box" name="menu_id2" id="menu_id2">
                            </select>
                        </li>
                    </div>
                    <div class="menu-display">
                        <li class="form-item">
                            <div class="form-item-title">
                                <label for="menu_category_id3">メニュー項目</label>
                            </div>
                            <select class="drop-box" name="menus_category_id3" id="menus_category_id3">
                                <option value=''>--選択してください--</option>
                                @foreach($menus_categories as $menus_category)
                                <option value='{{ $menus_category->id }}'>{{ $menus_category->name }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="form-item menu-item">
                            <div class="form-item-title">
                                <label for="menu_id3">メニュー名</label>
                            </div>
                            <select class="drop-box" name="menu_id3" id="menu_id3">
                            </select>
                        </li>
                    </div>
                </div>
                <div class="list3">
                    <div class="menu-display">
                        <li class="form-item">
                            <div class="form-item-title">
                                <label for="menu_category_id4">メニュー項目</label>
                            </div>
                            <select class="drop-box" name="menus_category_id4" id="menus_category_id4">
                                <option value=''>--選択してください--</option>
                                @foreach($menus_categories as $menus_category)
                                <option value='{{ $menus_category->id }}'>{{ $menus_category->name }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="form-item menu-item">
                            <div class="form-item-title">
                                <label for="menu_id4">メニュー名</label>
                            </div>
                            <select class="drop-box" name="menu_id4" id="menu_id4">
                            </select>
                        </li>
                    </div>
                    <div>
                        <li class="form-item">
                            <div class="form-item-title">
                                <label for="menu_category_id5">メニュー項目</label>
                            </div>
                            <select class="drop-box" name="menus_category_id5" id="menus_category_id5">
                                <option value=''>--選択してください--</option>
                                @foreach($menus_categories as $menus_category)
                                <option value='{{ $menus_category->id }}'>{{ $menus_category->name }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li class="form-item menu-item">
                            <div class="form-item-title">
                                <label for="menu_id5">メニュー名</label>
                            </div>
                            <select class="drop-box" name="menu_id5" id="menu_id5">
                            </select>
                        </li>
                    </div>
                    <div style="width:252.791px;">
                    </div>
                </div>
                <div class="list4">
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="memo">メモ (350文字以内)</label>
                        </div>
                        <textarea class="textarea-box" cols="120" rows="6" name="memo" id="memo" value="{{old('memo')}}" autocomplete="off"></textarea>
                    </li>
                </div>
                <div class="list5">
                    <li>
                        <div class="form-item-title">
                            <label>画像 (5つまで)</label>
                        </div>
                        <div class="imgUpload_display">
                            <div>
                                <label class="file-label">
                                    <input class="js-upload-file1" type="file" name="image1" id="image1" accept="image/*">ファイルを選択
                                </label>
                                <div class="js-upload-filename1">ファイル未選択</div>
                                <div class="fileclear js-upload-fileclear1">選択ファイルをクリア</div>
                                <div class="image1_display-wrapper">
                                    <img id="image1_display">
                                </div>
                            </div>
                            <div>
                                <label class="file-label">
                                    <input class="js-upload-file2" type="file" name="image2" id="image2" accept="image/*">ファイルを選択
                                </label>
                                <div class="js-upload-filename2">ファイル未選択</div>
                                <div class="fileclear js-upload-fileclear2">選択ファイルをクリア</div>
                                <div class="image2_display-wrapper">
                                    <img id="image2_display">
                                </div>
                            </div>
                            <div>
                                <label class="file-label">
                                    <input class="js-upload-file3" type="file" name="image3" id="image3" accept="image/*">ファイルを選択
                                </label>
                                <div class="js-upload-filename3">ファイル未選択</div>
                                <div class="fileclear js-upload-fileclear3">選択ファイルをクリア</div>
                                <div class="image3_display-wrapper">
                                    <img id="image3_display">
                                </div>
                            </div>
                            <div>
                                <label class="file-label">
                                    <input class="js-upload-file4" type="file" name="image4" id="image4" accept="image/*">ファイルを選択
                                </label>
                                <div class="js-upload-filename4">ファイル未選択</div>
                                <div class="fileclear js-upload-fileclear4">選択ファイルをクリア</div>
                                <div class="image4_display-wrapper">
                                    <img id="image4_display">
                                </div>
                            </div>
                            <div>
                                <label class="file-label">
                                    <input class="js-upload-file5" type="file" name="image5" id="image5" accept="image/*">ファイルを選択
                                </label>
                                <div class="js-upload-filename5">ファイル未選択</div>
                                <div class="fileclear js-upload-fileclear5">選択ファイルをクリア</div>
                                <div class="image5_display-wrapper">
                                    <img id="image5_display">
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="list6">
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="incident_date">インシデント発生日</label>
                        </div>
                        <input type="date" class="text-box" name="incident_date" id="incident_date" value="{{old('incident_date')}}" autocomplete="off">
                    </li>
                    <li class="form-item">
                        <div class="form-item-title">
                            <label for="incident_content">インシデント内容 (350文字以内)</label>
                        </div>
                        <textarea class="textarea-box" cols="105" rows="6" name="incident_content" id="incident_content" value="{{old('incident_content')}}" autocomplete="off"></textarea>
                    </li>
                </div>
            </ul>
            <div>
                <button type="submit" class="create-btn" id="createButton">新規登録</button>
            </div>
        </form>
    </div>
</div>

<div class="search-title">
    <label for="bbb">
        &ensp;条件を設定&ensp;<button class="bbb" id="bbb">▼</button>
    </label>
</div>
<div class="ac">
    <div class="search-outer">
        <div class="search-wrapper">
            <form action="{{ route('sales.search', ['search' => 'search']) }}" method="GET" id="searchForm">
                @csrf

                <ul>
                    <div class="search-list1">
                        <div>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="date">売上年月日</label>
                                </div>
                                <input type="date" class="text-box" name="date1" id="date1" value="" autocomplete="off">
                            </li>
                            <span style="padding:0 10px 0 10px">〜</span>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="date"></label>
                                </div>
                                <input type="date" class="text-box" name="date2" id="date2" value="" autocomplete="off">
                            </li>
                        </div>
                        <div>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="profit">売上金額</label>
                                </div>
                                <input type="text" class="text-box" name="profit1" id="profit1" value="" autocomplete="off">
                                <span style="padding-left:3px">円</span>
                            </li>
                            <span style="padding:0 10px 0 10px">〜</span>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="profit"></label>
                                </div>
                                <input type="text" class="text-box" name="profit2" id="profit2" value="" autocomplete="off">
                                <span style="padding-left:3px">円</span>
                            </li>
                        </div>
                        <div>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="customer_id">顧客名</label>
                                </div>
                                <input type="text" class="text-box" name="customer_id" id="customer_id" value="" autocomplete="off">
                            </li>
                        </div>
                    </div>
                    <div class="search-list2">
                        <div>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="employee_id">担当者</label>
                                </div>
                                <select class="drop-box" name="employee_id" id="employee_id">
                                    <option value=''>--選択してください--</option>
                                    @foreach($employees as $employee)
                                    <option value='{{ $employee->id }}'>{{ $employee->first_name }}{{ $employee->last_name }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </div>
                        <div>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="store_id">店舗名</label>
                                </div>
                                <select class="drop-box" name="store_id" id="store_id">
                                    <option value=''>--選択してください--</option>
                                    @foreach($stores as $store)
                                    <option value='{{ $store->id }}'>{{ $store->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </div>
                        <div>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="menu_category_id6">メニュー項目</label>
                                </div>
                                <select class="drop-box" name="menus_category_id6" id="menus_category_id6">
                                    <option value=''>--選択してください--</option>
                                    @foreach($menus_categories as $menus_category)
                                    <option value='{{ $menus_category->id }}'>{{ $menus_category->name }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li class="form-item menu-item">
                                <div class="form-item-title">
                                    <label for="menu_id6">メニュー名</label>
                                </div>
                                <select class="drop-box" name="menu_id6" id="menu_id6">
                                </select>
                            </li>
                        </div>
                        <div>
                            <li class="form-item">
                                <div class="form-item-title">
                                    <label for="gender">性別</label>
                                </div>
                                <select class="drop-box" name="gender" id="gender">
                                    <option value=''>--選択してください--</option>
                                    <option value='男'>男</option>
                                    <option value='女'>女</option>
                                </select>
                            </li>
                        </div>
                    </div>
                    <div>
                        <li class="form-item" style="padding-right:50px;">
                            <div class="form-item-title">
                                <label for="incident_happened">インシデント</label>
                            </div>
                            <select class="drop-box" name="incident_happened" id="incident_happened">
                                <option value='0'>なし</option>
                                <option value='1'>あり</option>
                            </select>
                        </li>
                        <li class="form-item">
                            <div class="form-item-title">
                                <label for="age1">年齢</label>
                            </div>
                            <input type="text" class="text-box" name="age1" id="age1" value="" autocomplete="off">
                        </li>
                        <span style="padding:0 10px 0 10px">〜</span>
                        <li class="form-item">
                            <div class="form-item-title">
                                <label for="age2"></label>
                            </div>
                            <input type="text" class="text-box" name="age2" id="age2" value="" autocomplete="off">
                        </li>
                        <button type="submit" class="search-btn" id="searchButton">絞り込む</button>
                        <button class="clear-btn" id="clearButton">条件をクリア</button>
                    </div>
                </ul>
            </form>
        </div>
    </div>
</div>

<div class="catalog-title">
    &ensp;売上情報一覧
</div>

<div class="catalog-outer1">
    <div class="catalog-wrapper1">
        <div class="catalog-item-list">
            <div class="catalog-sales-id">売上ID</div>
            <div class="catalog-sales-date">売上年月日</div>
            <div class="catalog-customer">顧客名</div>
            <div class="catalog-menu-category">メニュー項目</div>
            <div class="catalog-menu">メニュー名</div>
            <div class="catalog-employee">担当者</div>
            <div class="catalog-store">店舗</div>
            <div class="catalog-profit">売上金額</div>
            <div class="catalog-updated-on">更新日</div>
            <div class="catalog-button"></div>
        </div>
    </div>
</div>
<div class="catalog-outer2">
    <div class="catalog-wrapper2">
        @foreach ($sales as $sale)
        <div>
            <div class="catalog-sales-id">{{ $sale->id }}</div>
            <div class="catalog-sales-date">{{ $sale->date }}</div>
            <div class="catalog-customer">あああ</div>
            <div class="catalog-menu-category">あああ</div>
            <div class="catalog-menu">あああ</div>
            <div class="catalog-employee">{{ $sale->first_name }}</div>
            <div class="catalog-store">{{ $sale->store_name }}</div>
            <div class="catalog-profit">{{ $sale->profit }}</div>
            <div class="catalog-updated-on">{{ $sale->updated_on }}</div>
            <div class="catalog-button">詳細</div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('/js/sales.js') }}"></script>
@endsection