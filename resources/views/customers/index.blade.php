@extends('common.flame')

@section('cssStyle')
<link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@endsection

@section('content')


<div class="tab_wrap">
    <input id="tab1" type="radio" name="tab_btn" checked>
    <input id="tab2" type="radio" name="tab_btn">

    <div class="tab_area">
        <label class="tab1_label" for="tab1">顧客情報一覧</label>
        <label class="tab2_label" for="tab2">顧客新規登録</label>
    </div>
    <div class="panel_area">
        <div id="panel1" class="tab_panel">
            <p>顧客情報一覧が入ります</p>
        </div>
        <div id="panel2" class="tab_panel">
            <p>顧客新規登録が入ります</p>
        </div>
    </div>
</div>





@endsection

@section('sales_js')
<script src="{{ asset('/js/customers.js') }}"></script>
@endsection