//イメージ表示用
document.querySelector('#image1').addEventListener('change', (event) => {
    const file = event.target.files[0]
  
    // fileがundefinedの時にreader.readAsDataURL(file)がエラーになるため、
    // !fileがfalseの場合にreturnする。
    if (!file) return
  
    const reader = new FileReader()
  
    reader.onload = (event) => {
      document.querySelector('#image1_display').src = event.target.result
    }
  
    reader.readAsDataURL(file)
})
document.querySelector('#image2').addEventListener('change', (event) => {
    const file = event.target.files[0]
  
    // fileがundefinedの時にreader.readAsDataURL(file)がエラーになるため、
    // !fileがfalseの場合にreturnする。
    if (!file) return
  
    const reader = new FileReader()
  
    reader.onload = (event) => {
      document.querySelector('#image2_display').src = event.target.result
    }
  
    reader.readAsDataURL(file)
})
document.querySelector('#image3').addEventListener('change', (event) => {
    const file = event.target.files[0]
  
    // fileがundefinedの時にreader.readAsDataURL(file)がエラーになるため、
    // !fileがfalseの場合にreturnする。
    if (!file) return
  
    const reader = new FileReader()
  
    reader.onload = (event) => {
      document.querySelector('#image3_display').src = event.target.result
    }
  
    reader.readAsDataURL(file)
})
document.querySelector('#image4').addEventListener('change', (event) => {
    const file = event.target.files[0]
  
    // fileがundefinedの時にreader.readAsDataURL(file)がエラーになるため、
    // !fileがfalseの場合にreturnする。
    if (!file) return
  
    const reader = new FileReader()
  
    reader.onload = (event) => {
      document.querySelector('#image4_display').src = event.target.result
    }
  
    reader.readAsDataURL(file)
})
document.querySelector('#image5').addEventListener('change', (event) => {
    const file = event.target.files[0]
  
    // fileがundefinedの時にreader.readAsDataURL(file)がエラーになるため、
    // !fileがfalseの場合にreturnする。
    if (!file) return
  
    const reader = new FileReader()
  
    reader.onload = (event) => {
      document.querySelector('#image5_display').src = event.target.result
    }
  
    reader.readAsDataURL(file)
})

//メニュー連動Ajax1
$('#menus_category_id1').on('change', function(){

    $('#menu_id1').empty(); //もともとある要素を空にする

    var menus_category = $(this).val(); //選択したメニュー項目名のIDを取得

    if ( menus_category == '') { //メニュー項目名「選択してください」を選んだ時
        return;
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/sales/'+ menus_category,
        type:"POST",
        data: {
            'menus_category': menus_category
        },
        dataType: 'json'

    }).done(function(data){
        console.log(data);
        var html = '';
        $.each(data, function (index, value) {
            html = `<option value="${index}">${value}</option>`
            $('#menu_id1').append(html);
        })

    }).fail(function() {
        alert("error");
    });
});

//メニュー連動Ajax2
$('#menus_category_id2').on('change', function(){

    $('#menu_id2').empty(); //もともとある要素を空にする

    var menus_category = $(this).val(); //選択したメニュー項目名のIDを取得

    if ( menus_category == '') { //メニュー項目名「選択してください」を選んだ時
        return;
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/sales/'+ menus_category,
        type:"POST",
        data: {
            'menus_category': menus_category
        },
        dataType: 'json'

    }).done(function(data){
        console.log(data);
        var html = '';
        $.each(data, function (index, value) {
            html = `<option value="${index}">${value}</option>`
            $('#menu_id2').append(html);
        })

    }).fail(function() {
        alert("error");
    });
});

//メニュー連動Ajax3
$('#menus_category_id3').on('change', function(){

    $('#menu_id3').empty(); //もともとある要素を空にする

    var menus_category = $(this).val(); //選択したメニュー項目名のIDを取得

    if ( menus_category == '') { //メニュー項目名「選択してください」を選んだ時
        return;
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/sales/'+ menus_category,
        type:"POST",
        data: {
            'menus_category': menus_category
        },
        dataType: 'json'

    }).done(function(data){
        console.log(data);
        var html = '';
        $.each(data, function (index, value) {
            html = `<option value="${index}">${value}</option>`
            $('#menu_id3').append(html);
        })

    }).fail(function() {
        alert("error");
    });
});

//メニュー連動Ajax4
$('#menus_category_id4').on('change', function(){

    $('#menu_id4').empty(); //もともとある要素を空にする

    var menus_category = $(this).val(); //選択したメニュー項目名のIDを取得

    if ( menus_category == '') { //メニュー項目名「選択してください」を選んだ時
        return;
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/sales/'+ menus_category,
        type:"POST",
        data: {
            'menus_category': menus_category
        },
        dataType: 'json'

    }).done(function(data){
        console.log(data);
        var html = '';
        $.each(data, function (index, value) {
            html = `<option value="${index}">${value}</option>`
            $('#menu_id4').append(html);
        })

    }).fail(function() {
        alert("error");
    });
});

//メニュー連動Ajax5
$('#menus_category_id5').on('change', function(){

    $('#menu_id5').empty(); //もともとある要素を空にする

    var menus_category = $(this).val(); //選択したメニュー項目名のIDを取得

    if ( menus_category == '') { //メニュー項目名「選択してください」を選んだ時
        return;
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/sales/'+ menus_category,
        type:"POST",
        data: {
            'menus_category': menus_category
        },
        dataType: 'json'

    }).done(function(data){
        console.log(data);
        var html = '';
        $.each(data, function (index, value) {
            html = `<option value="${index}">${value}</option>`
            $('#menu_id5').append(html);
        })

    }).fail(function() {
        alert("error");
    });
});

//メニュー連動Ajax6
$('#menus_category_id6').on('change', function(){

    $('#menu_id6').empty(); //もともとある要素を空にする

    var menus_category = $(this).val(); //選択したメニュー項目名のIDを取得

    if ( menus_category == '') { //メニュー項目名「選択してください」を選んだ時
        return;
    }

    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/sales/'+ menus_category,
        type:"POST",
        data: {
            'menus_category': menus_category
        },
        dataType: 'json'

    }).done(function(data){
        console.log(data);
        var html = '';
        $.each(data, function (index, value) {
            html = `<option value="${index}">${value}</option>`
            $('#menu_id6').append(html);
        })

    }).fail(function() {
        alert("error");
    });
});

//UploadImage
$(function() {
    $('.js-upload-file1').on('change', function () { //ファイルが選択されたら
      let file = $(this).prop('files')[0]; //ファイルの情報を代入(file.name=ファイル名/file.size=ファイルサイズ/file.type=ファイルタイプ)
      $('.js-upload-filename1').text(file.name); //ファイル名を出力
      $('.js-upload-fileclear1').show(); //クリアボタンを表示
    });
    $('.js-upload-fileclear1').click(function() { //クリアボタンがクリックされたら
      $('.js-upload-file1').val(''); //inputをリセット
      $('.js-upload-filename1').text('ファイルが未選択です'); //ファイル名をリセット
      $(this).hide(); //クリアボタンを非表示
    });
});
$(function() {
    $('.js-upload-file2').on('change', function () { //ファイルが選択されたら
      let file = $(this).prop('files')[0]; //ファイルの情報を代入(file.name=ファイル名/file.size=ファイルサイズ/file.type=ファイルタイプ)
      $('.js-upload-filename2').text(file.name); //ファイル名を出力
      $('.js-upload-fileclear2').show(); //クリアボタンを表示
    });
    $('.js-upload-fileclear2').click(function() { //クリアボタンがクリックされたら
      $('.js-upload-file2').val(''); //inputをリセット
      $('.js-upload-filename2').text('ファイルが未選択です'); //ファイル名をリセット
      $(this).hide(); //クリアボタンを非表示
    });
});
$(function() {
    $('.js-upload-file3').on('change', function () { //ファイルが選択されたら
      let file = $(this).prop('files')[0]; //ファイルの情報を代入(file.name=ファイル名/file.size=ファイルサイズ/file.type=ファイルタイプ)
      $('.js-upload-filename3').text(file.name); //ファイル名を出力
      $('.js-upload-fileclear3').show(); //クリアボタンを表示
    });
    $('.js-upload-fileclear3').click(function() { //クリアボタンがクリックされたら
      $('.js-upload-file3').val(''); //inputをリセット
      $('.js-upload-filename3').text('ファイルが未選択です'); //ファイル名をリセット
      $(this).hide(); //クリアボタンを非表示
    });
});
$(function() {
    $('.js-upload-file4').on('change', function () { //ファイルが選択されたら
      let file = $(this).prop('files')[0]; //ファイルの情報を代入(file.name=ファイル名/file.size=ファイルサイズ/file.type=ファイルタイプ)
      $('.js-upload-filename4').text(file.name); //ファイル名を出力
      $('.js-upload-fileclear4').show(); //クリアボタンを表示
    });
    $('.js-upload-fileclear4').click(function() { //クリアボタンがクリックされたら
      $('.js-upload-file4').val(''); //inputをリセット
      $('.js-upload-filename4').text('ファイルが未選択です'); //ファイル名をリセット
      $(this).hide(); //クリアボタンを非表示
    });
});
$(function() {
    $('.js-upload-file5').on('change', function () { //ファイルが選択されたら
      let file = $(this).prop('files')[0]; //ファイルの情報を代入(file.name=ファイル名/file.size=ファイルサイズ/file.type=ファイルタイプ)
      $('.js-upload-filename5').text(file.name); //ファイル名を出力
      $('.js-upload-fileclear5').show(); //クリアボタンを表示
    });
    $('.js-upload-fileclear5').click(function() { //クリアボタンがクリックされたら
      $('.js-upload-file5').val(''); //inputをリセット
      $('.js-upload-filename5').text('ファイルが未選択です'); //ファイル名をリセット
      $(this).hide(); //クリアボタンを非表示
    });
});

//画像の中身を消す
$(function() {
    $('.js-upload-fileclear1').on('click', function () {
        $('#image1_display').remove();
        var div1 = $('.image1_display-wrapper');
        div1.append('<img id="image1_display"></img>');
    });
});
$(function() {
    $('.js-upload-fileclear2').on('click', function () {
        $('#image2_display').remove();
        var div2 = $('.image2_display-wrapper');
        div2.append('<img id="image2_display"></img>');
    });
});
$(function() {
    $('.js-upload-fileclear3').on('click', function () {
        $('#image3_display').remove();
        var div3 = $('.image3_display-wrapper');
        div3.append('<img id="image3_display"></img>');
    });
});
$(function() {
    $('.js-upload-fileclear4').on('click', function () {
        $('#image4_display').remove();
        var div4 = $('.image4_display-wrapper');
        div4.append('<img id="image4_display"></img>');
    });
});
$(function() {
    $('.js-upload-fileclear5').on('click', function () {
        $('#image5_display').remove();
        var div5 = $('.image5_display-wrapper');
        div5.append('<img id="image5_display"></img>');
    });
});

//アコーディオン
$(function(){
    $(".registration-outer").hide();
    $(".aaa").on("click",function(){
      if ($(".registration-outer").is(':hidden')) {
        $(".registration-outer").slideToggle();
      }
      else {
        $(".registration-outer").slideToggle();
      }
    });
});
$(function(){
    $(".ac").hide();
    $(".bbb").on("click",function(){
      if ($(".ac").is(':hidden')) {
        $(".ac").slideToggle();
      }
      else {
        $(".ac").slideToggle();
      }
    });
});
    