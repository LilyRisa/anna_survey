<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">


    <title>ANNA BILLIARDS - Đăng ký sự kiện</title>

    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans);

        body {
            background: #f2f2f2;
            font-family: 'Open Sans', sans-serif;
        }

        .search {
            width: 100%;
            position: relative;
            display: flex;
        }

        .searchTerm {
            width: 100%;
            border: 3px solid #00B4CC;
            border-right: none;
            padding: 5px;
            height: 20px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #9DBFAF;
        }

        .searchTerm:focus {
            color: #00B4CC;
        }

        .searchButton {
            width: 40px;
            height: 36px;
            border: 1px solid #00B4CC;
            background: #00B4CC;
            text-align: center;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;
        }

        /*Resize the wrap to see the search bar change!*/
        .wrap {
            width: 30%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @media screen and (max-width: 520px) {
            .wrap {
                width: 95% !important;
            }
        }

        .result {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            display: none;
            margin: 30px 0px;
        }

        .center {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .text-result {
            font-size: 22px;
            font-weight: bold;
        }

        .data {
            width: 100%;
            display: flex;
            justify-content: start;
            font-weight: bold;
        }

        .info-share {
            width: 100%;
        }

        .item {
            border: 1px solid black;
            padding: 10px;
            margin: 10px 0px;
            width: 100%
        }

        #hover-preview {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 10px;
            z-index: 1000;
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="search">
            <input type="text" class="searchTerm" placeholder="Tìm kiếm số điện thoại khách hàng">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </div>
        <div id="load" style="display: none"><img src="/img/load.svg" style="width:100px; height:auto" alt=""></div>
        <div class="result">

        </div>
    </div>
    <div id="hover-preview" style="display: none; position: absolute; border: 1px solid #ccc; background: #fff;">
        <iframe id="preview-frame" src="" width="300" height="200"></iframe>
    </div>
    <script>
        $(document).ready(function() {
            $('.searchButton').on('click', function(e){
                e.preventDefault();
                $('#load').show();
                $('.result').hide();
                $.ajax({
                        url: '/check', // URL mà dữ liệu được gửi đến
                        type: 'POST',
                        data: {
                            q: $('.searchTerm').val(),
                            "_token" : "{{csrf_token()}}"
                        }
                }).done(resp => {
                    $('#load').hide();
                    var tmp = '';
                    if(resp.data.length == 0){
                        tmp = '<div class="center text-result">Không có dữ liệu</div>';
                        $('.result').html(tmp);
                        $('.result').show();
                        $('#load').hide();
                        return;
                    }
                    for(item of resp.data){
                        console.log(item);
                        tmp += `
                        <div class="item">
                            <div class="center text-result">Thông tin</div>
                            <div class="data">Họ và tên: ${item.name}</div>
                            <div class="data">Số điện thoại: ${item.phone}</div>
                            <div class="data">Biết đến chương trình từ: ${item.aff}</div>
                            <div class="data">Đăng ký ngày: ${item.time}</div>
                            <div class="info-share">Thông tin share: <a href="${item.link_fb}" class="hover-link" target="_blank">${item.link_fb}</a> (${item.unique == 0 ? '<i style="color:green">Không trùng lặp</i>' : '<i style="color:red">Trùng lặp với sđt khác</i>'}) </div>
                            ${item.unique_phone.length > 0 ? '<div class="info-share">Danh sách sđt có dùng link như trên: '+item.unique_phone.join(', ')+'</div>' : ''}
                        </div>
                    `;
                    }
                    // $.each(resp.data, function(item){
                    //     tmp .= `
                    //     <div class="item">
                    //         <div class="center text-result">Thông tin</div>
                    //         <div class="data">Họ và tên: ${item.name}</div>
                    //         <div class="data">Số điện thoại: ${itema.phone}</div>
                    //         <div class="data">Biết đến chương trình từ: ${item.aff}</div>
                    //         <div class="data">Đăng ký ngày: ${item.time}</div>
                    //         <div class="info-share">Thông tin share: <a href="${item.link_fb}" target="_blank">${item.link_fb}</a> (${item.unique == 0 ? '<i style="color:green">Không trùng lặp</i>' : '<i style="color:red">Trùng lặp với sđt khác</i>'})</div>
                    //     </div>
                    // `;
                    // });
                    
                    $('.result').html(tmp);
                    $('.result').show();
                    $('#load').hide();
                }).fail(e => {
                    console.log(e);
                    alert(e.responseText);
                })
            });



            $('body').on('mouseenter', '.hover-link', function(event) {
                var url = $(this).attr('href');

                // Đặt URL vào iframe
                $('#preview-frame').attr('src', url);

                // Hiển thị cửa sổ preview
                $('#hover-preview').show();
            });

            $('body').on('mouseleave', '.hover-link', function() {
                // Ẩn cửa sổ khi không hover
                $('#hover-preview').hide();

                // Xóa URL của iframe
                $('#preview-frame').attr('src', '');
            });

            // Di chuyển khung preview theo chuột
            $('body').on('mousemove', '.hover-link', function(event) {
                $('#hover-preview').css({
                    top: event.pageY + 10 + 'px',
                    left: event.pageX + 10 + 'px'
                });
            });
        });
    </script>
</body>

</html>