//Createの確認アラート
$(document).on("click", "#createButton2", function (e) {
    e.preventDefault(); // 本来のボタン押下の処理のキャンセル  
      
    AlertMessage.confirm(  
        "", // confirm本文  
        "新規登録します。", // confirmタイトル  
        "info", // アラートの種類  
        function (_enter) { // コールバック  
          if (_enter) {  
            // OKが押された時の処理
            document.getElementById("createForm2").submit();
          }  
        });  
});

$(document).on("click", "#createButton3", function (e) {
  e.preventDefault(); // 本来のボタン押下の処理のキャンセル  
    
  AlertMessage.confirm(  
      "", // confirm本文  
      "新規登録します。", // confirmタイトル  
      "info", // アラートの種類  
      function (_enter) { // コールバック  
        if (_enter) {  
          // OKが押された時の処理
          document.getElementById("createForm3").submit();
        }  
      });  
});

//Deleteの確認アラート
$(document).on("click", ".submit-btn", function (e) {
    e.preventDefault(); // 本来のボタン押下の処理のキャンセル  
    
    var submitButton = $(this);

    AlertMessage.confirm(  
        "", // confirm本文  
        "本当に削除しますか？", // confirmタイトル  
        "info", // アラートの種類  
        function (_enter) { // コールバック  
          if (_enter) {  
            // OKが押された時の処理
            submitButton.parent().submit();
          }  
        });  
});

//アコーディオン
$(".registration-outer1").hide();
$(".aaa").on("click",function(){
  if ($(".registration-outer1").is(':hidden')) {
    $(".registration-outer1").slideToggle();
  }
  else {
    $(".registration-outer1").slideToggle();
  }
});

//モーダルカテゴリ編集
$('.category-btn').on('click', function (e) {

  $(".modal-category").fadeIn();
  $('body').prepend('<div class="overlay">');
  $('body').append('</div>');
  $(".overlay").fadeIn();

  //ボタン
  btn_val = $(this).val();

  btn = $(this).parent();
  btn = btn.prev();
  btn = btn.prev();
  btn = btn.children();

});

$('.btn-cancel-category').on('click', function (e) {

  $(".modal-category").fadeOut();
  $(".overlay").fadeOut();
  $('.overlay').remove();
  $(".errorMsg").text("");
  $("#inputTitle_category").val("");

});

$('#category_saver').click(function() {

  var menus_category_id = btn_val;

  var inputTitle_category = $('#inputTitle_category').val();

  $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/menus_categories/' + menus_category_id,
      type: "POST",
      data: {
          'inputTitle_category': inputTitle_category
      },
      dataType: 'json'
  }).done(function(data) {
    
    if(data["result"] == "true"){
      var msg = "";
      for(let k of Object.keys(data["msg"])) {
        //messageにオブジェクトできたバリデーションエラーを追加する
        msg += data["msg"][k];
      }
      btn.text(msg);

      $(".modal-category").fadeOut();
      $(".overlay").fadeOut();
      $('.overlay').remove();

      $("#inputTitle_category").val("");

      //メニュー更新Ajax
      $('#menu_category_id').empty(); //もともとある要素を空にする

      var menus_category = ""; //選択したメニュー項目名のIDを取得
  
      $.ajax({
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          url: '/stores/ajax',
          type:"GET"
  
      }).done(function(data){
        console.log(data);
          var html = '';
          $.each(data, function (index, value) {
              html = `<option value="${index}">${value}</option>`
              $('#menu_category_id').append(html);
          })
  
      }).fail(function() {
          alert("error");
      });
      //

    }else{
      var msg = "";
      for(let k of Object.keys(data["msg"])) {
        //messageにオブジェクトできたバリデーションエラーを追加する
        msg += data["msg"][k];
      }
      $(".errorMsg").text(msg);

    }
    $('#tab2').prop('checked', true);

  }).fail(function() {
    alert("エラー");
  });

});

//モーダルメニュー編集
$('.menu-btn').on('click', function (e) {

  $(".modal-menu").fadeIn();
  $('body').prepend('<div class="overlay">');
  $('body').append('</div>');
  $(".overlay").fadeIn();

  //ボタン
  btn_val = $(this).val();

  btn = $(this).parent();
  btn = btn.prev();
  btn = btn.children();

});

$('.btn-cancel-menu').on('click', function (e) {

  $(".modal-menu").fadeOut();
  $(".overlay").fadeOut();
  $('.overlay').remove();
  $(".errorMsg").text("");
  $("#inputTitle_menu").val("");

});

$('#menu_saver').click(function() {

  var menu_id = btn_val;

  var inputTitle_menu = $('#inputTitle_menu').val();

  $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/menus/' + menu_id,
      type: "POST",
      data: {
          'inputTitle_menu': inputTitle_menu
      },
      dataType: 'json'
  }).done(function(data) {
    
    if(data["result"] == "true"){
      var msg = "";
      for(let k of Object.keys(data["msg"])) {
        //messageにオブジェクトできたバリデーションエラーを追加する
        msg += data["msg"][k];
      }
      btn.text(msg);

      $(".modal-menu").fadeOut();
      $(".overlay").fadeOut();
      $('.overlay').remove();

      $("#inputTitle_menu").val("");

    }else{
      var msg = "";
      for(let k of Object.keys(data["msg"])) {
        //messageにオブジェクトできたバリデーションエラーを追加する
        msg += data["msg"][k];
      }
      $(".errorMsg").text(msg);

    }
    $('#tab2').prop('checked', true);

  }).fail(function() {
    alert("エラー");
  });

});

//モーダル担当者編集
$('.employee-btn').on('click', function (e) {

  $(".modal-employee").fadeIn();
  $('body').prepend('<div class="overlay">');
  $('body').append('</div>');
  $(".overlay").fadeIn();

  btn_val = $(this).val();

  tmp = $(this).parent();
  gender = tmp.prev();
  birthday = gender.prev();
  age = birthday.prev();
  last_name_kana = age.prev();
  first_name_kana = last_name_kana.prev();
  last_name = first_name_kana.prev();
  first_name = last_name.prev();

  var catalog_employee_first_name = first_name.html();
  $("#inputEmp_first_name").val(catalog_employee_first_name);
  var catalog_employee_last_name = last_name.html();
  $("#inputEmp_last_name").val(catalog_employee_last_name);
  var catalog_employee_gender = gender.html();
  var catalog_employee_first_name_kana = first_name_kana.html();
  $("#inputEmp_first_name_kana").val(catalog_employee_first_name_kana);
  var catalog_employee_last_name_kana = last_name_kana.html();
  $("#inputEmp_last_name_kana").val(catalog_employee_last_name_kana);
  var catalog_employee_gender = gender.html();
  $("#inputEmp_gender").val(catalog_employee_gender);
  var catalog_employee_birthday = birthday.html();
  $("#inputEmp_birthday").val(catalog_employee_birthday);

});

$('.btn-cancel-employee').on('click', function (e) {

  $(".modal-employee").fadeOut();
  $(".overlay").fadeOut();
  $('.overlay').remove();
  $(".errorMsg_first_name").text("");
  $(".errorMsg_last_name").text("");
  $(".errorMsg_first_name_kana").text("");
  $(".errorMsg_last_name_kana").text("");
  $(".errorMsg_gender").text("");

});

$('#employee_saver').click(function() {
  $(".errorMsg_first_name").text("");
  $(".errorMsg_last_name").text("");
  $(".errorMsg_first_name_kana").text("");
  $(".errorMsg_last_name_kana").text("");
  $(".errorMsg_gender").text("");


var employee_id = btn_val;

var inputEmp_first_name = $('#inputEmp_first_name').val();
var inputEmp_last_name = $('#inputEmp_last_name').val();
var inputEmp_first_name_kana = $('#inputEmp_first_name_kana').val();
var inputEmp_last_name_kana = $('#inputEmp_last_name_kana').val();
var inputEmp_gender = $('#inputEmp_gender').val();
var inputEmp_birthday = $('#inputEmp_birthday').val();

  $.ajax({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/employees/' + employee_id,
      type: "POST",
      data: {
          'inputEmp_first_name': inputEmp_first_name,
          'inputEmp_last_name': inputEmp_last_name,
          'inputEmp_first_name_kana': inputEmp_first_name_kana,
          'inputEmp_last_name_kana': inputEmp_last_name_kana,
          'inputEmp_gender': inputEmp_gender,
          'inputEmp_birthday': inputEmp_birthday,
      },
      dataType: 'json'
  }).done(function(data) {
    
    if(data["result"] == "true"){
      
      first_name.text(data["msg"][0]["first_name"]);
      last_name.text(data["msg"][0]["last_name"]);
      first_name_kana.text(data["msg"][0]["first_name_kana"]);
      last_name_kana.text(data["msg"][0]["last_name_kana"]);

      //年齢計算
      if(data["msg"][0]["birthday"] != null){
        var birthday_date = data["msg"][0]["birthday"].replace(/-/g,"");
        
        function getAge(birthday_date) 
        {
            var today = new Date();
            var tdate = ( today.getFullYear() * 10000 ) + (( today.getMonth() + 1 ) * 100 ) + today.getDate() ;
            return( Math.floor(( tdate - birthday_date ) / 10000 )) ;
        }
        var age_data = getAge(birthday_date);

        age.text(age_data);
      }
      //

      gender.text(data["msg"][0]["gender"]);
      birthday.text(data["msg"][0]["birthday"]);

      $(".modal-employee").fadeOut();
      $(".overlay").fadeOut();
      $('.overlay').remove();
      
    }else{
      $(".errorMsg_first_name").text(data["msg"]["inputEmp_first_name"]);
      $(".errorMsg_last_name").text(data["msg"]["inputEmp_last_name"]);
      $(".errorMsg_first_name_kana").text(data["msg"]["inputEmp_first_name_kana"]);
      $(".errorMsg_last_name_kana").text(data["msg"]["inputEmp_last_name_kana"]);
      $(".errorMsg_gender").text(data["msg"]["inputEmp_gender"]);
    }

  }).fail(function() {
    alert("エラー");
  });

});
