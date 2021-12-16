<?php
declare(strict_types=1);
?>
<!Doctype html>
<html lang="en">
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="row text-end" style="margin-right: 150px">
        <div style="font-weight: bold; font-size: larger; margin-right: 15px">
            {{ $user->email ?? '' }}
        </div>
        <a href="/">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJf-_Njzm9F5Z0APr65Ds2ywxjwnw1VyCtPeegqm9BV6GMpVhe9fUMhH6vjQWJKRAShEQ&usqp=CAU" width="42" height="40" class="me-3" alt="Bootstrap">
        </a>
        <a href="/" type="button" class="btn btn-primary">Logout</a>
    </div>
</header>
<body class="text-center" style="background: #c6d1e3">
<div class="container h-100" style="width: 90%; height: 90%; margin-top: 100px; border-color: #2d3748; border-style: solid">
    <div id="chat_list">

    </div>
</div>
<div>
<form class="col-12" id="form" action="/message" method="post">
    <div style="margin: 20px">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="email" value="{{ $user->email ?? '' }}"/>
    <input name="body" id="body_text" type="text" class="col-md-6" placeholder="Enter your text here">
    <button id="btn" class="col-md-2 w-50 btn btn-primary" type="submit" style="margin-left: 10px">Send</button>
    </div>
</form>
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    let elem;
    $( document ).ready(function() {
        $("#btn").click(
            function(){
                sendAjaxForm('content', 'form', '/message');
                $('#body_text').text('');
                return false;
            }
        );
    });

    $(document).ready(function(){
      Login();
       setInterval('Login()',1000);
    });
    function Login(){
        $.ajax({
            url: 'message',
            cache: false,
            success: function(html){
                $('#chat_list').html(html);
                $list = $("<div></div>");
                $.each(html, function (i,item){
                    $email = '<span style="font-weight: bold">'+item.email+'</span>';
                    if (item.email === '{{ $user->email }}'){
                        $list = $('<div style="background-color: #f7fafc; margin-bottom: 2%; width: 48%; margin-left: 50%; margin-right: 2%"></div>');
                    }
                    else {
                        $list = $('<div style="margin-bottom: 2%; width: 48%; margin-right: 50%; margin-left: 2%"></div>');
                    }
                    $dateTime = '<span  style="margin-right: 10px; float: right">'+item.dateTime+'</span>';
                    $body = '<div class="text-left border" style="padding-left: 15px; padding-right: 5px">'+item.body+'</div';
                    $list.append($email, $dateTime, $body);
                    console.log(item.dateTime);
                    $("#chat_list").append($list);
                })
            }
        });
    }

    function sendAjaxForm(content, form, url) {
        $.ajax({
            url:      url,
            type:     "POST",
            dataType: "JSON",
            data: $("#"+form).serialize(),
            success: function(html) {
                $('#body_text').val('');
            },
            error: function() {
                $('#chat_list').html('Ошибка. Данные не отправлены.');
            }
        });
     };

</script>
</html>
