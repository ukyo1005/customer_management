@extends('common.flame')

@section('cssStyle')
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
@endsection

@section('content')

    <a class="link" href="{{ route('employee.index')}}">一覧画面へ</a>
 
    <form action="{{ route('employee.store')}}" method="POST" id="createForm">
        @csrf
    
        <ul>
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
                    <label for="first_name_kana">姓（カナ）</label>
                    <span class="required">必須</span>
                </div>
                <input type="text" class="text-box" name="first_name_kana" id="first_name_kana" value="{{old('first_name_kana')}}" autocomplete="off">
            </li>
            <li class="form-item">
                <div class="form-item-title">
                    <label for="last_name_kana">名（カナ）</label>
                    <span class="required">必須</span>
                </div>
                <input type="text" class="text-box" name="last_name_kana" id="last_name_kana" value="{{old('last_name_kana')}}" autocomplete="off">
            </li>
            <li class="form-item">
                <div class="form-item-title">
                    <label for="birthday">生年月日</label>
                </div>
                <input type="date" class="text-box" name="birthday" id="birthday" value="{{old('birthday')}}" autocomplete="off">
            </li>
            <li class="form-item">
                <div class="form-item-title">
                    <label for="gender">性別</label>
                    <span class="required">必須</span>
                </div>
                <select class="text-box" name="gender" id="gender">
                    <option value='男' @if(old('gender')=='男') selected  @endif>男</option>
                    <option value='女' @if(old('gender')=='女') selected  @endif>女</option>
                </select>
            </li>
        </ul>
        <div>
            <button type="submit" class="submit-btn" id="createButton">新規登録</button>
        </div>
    </form>

@endsection