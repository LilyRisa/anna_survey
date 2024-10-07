<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">


    <title>ANNA BILLIARDS - Đăng ký sự kiện</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Josefin+Sans|Kosugi+Maru" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <style>
        html,
        body {
            /* background-image: url('https://annabilliard.com/review/background.jpg'); */
            /* Đường dẫn tới ảnh */
            /* background-position: center center; */
            /* Cắt ảnh theo trục Y ở trung tâm */
            /* background-repeat: no-repeat; */
            /* Không lặp lại ảnh */
            /* background-size: cover; */

            /* background: url("https://annabilliard.com/review/background.jpg") center / cover no-repeat;; */
            text-align: center;
            font-family: "Montserrat", Helvetica, sans-serif;
            min-width: 320px;

            /* font-family: Arial, sans-serif; */
            margin: 0 1rem;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;

            position: relative;
            /* color: white; */
            padding-top: 170px;
            padding-bottom: 170px;

        }

        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("https://annabilliard.com/review/background.jpg") center / cover no-repeat;
            z-index: -1;
        }

        #description {
            font-size: 18px;
        }

        #form-outer {
            background-color: rgba(255, 255, 255, 0.85);
            /* margin: auto; */
            border-radius: 10px;
            width: 90%;
            /* max-width: 750px; */
            padding: 10px;
            padding-top: 10px;
            margin-bottom: 30px;
        }

        .labels {
            display: inline-block;
            text-align: right;
            width: 40%;
            padding: 5px;
            vertical-align: top;
            margin-top: 10px;
        }

        .rightTab {
            display: inline-block;
            text-align: left;
            width: 48%;
            vertical-align: middle;
        }

        .input-field {
            height: 20px;
            width: 280px;
            padding: 5px;
            margin: 10px;
            border: 1px solid #c0c0c0;
            border-radius: 3px;
        }

        #userAge {
            width: 40px;
        }

        .userRatings,
        input[type="checkbox"] {
            float: left;
            margin-right: 5px;
        }

        #submit {
            background-color: #222222;
            border-radius: 10px;
            color: white;
            font-size: 1em;
            height: 40px;
            width: 120px;
            margin: 10px;
            border: 0px solid;
            cursor: pointer;
        }

        #submit:hover {
            background-color: #555555;
        }

        .dropdown {
            height: 35px;
            width: 100%;
            padding: 5px;
            margin: 10px;
            margin-top: 15px;
            border: 1px solid #c0c0c0;
            border-radius: 3px;
        }

        .radio,
        .checkbox {
            position: relative;
            left: -43px;
            margin-left: 10px;
            display: block;
            padding-bottom: 10px;
        }

        a:hover {
            color: #666666;
        }

        footer a {
            color: white;
        }

        footer {
            background-color: #150038;
            padding: 0px;
            margin: 0px;
            color: fff;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        footer p {
            font-family: "Montserrat";
            display: block;
            width: 100%;
            text-align: center;
            color: white;
            margin-right: 85px;
        }

        .footer-icons {
            display: flex;
            width: 6%;
            margin: auto;
            margin-left: 10px;
            flex-direction: row;
            justify-content: space-between;
        }

        @media screen and (max-width: 833px) {
            .input-field {
                width: 80%;
            }

            select {
                width: 90%;
            }
        }

        @media screen and (max-width: 520px) {
            .labels {
                width: 100%;
                text-align: left;
            }

            .rightTab {
                width: 80%;
                float: left;
            }

            .input-field {
                width: 100%;
            }

            select {
                width: 100%;
            }
        }

        .faq-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
        }

        .question {
            font-weight: bold;
            cursor: pointer;
        }

        .answer {
            display: none;
            margin-top: 10px;
            color: #333;
        }

        .question:hover {
            color: #007bff;
        }

        #title {
            background: rgba(255, 255, 255, 0.85);
            padding: 10px;
            border-radius: 10px;
        }

        .title {
            font-size: 40px;
            font-weight: bold;
            color: #ff69b4;
            text-shadow: 2px 2px 4px #d9534f;
            text-align: center;
        }

        .title span {
            color: #87CEEB;
        }

        .title span:last-child {
            color: white;
        }
        .error{
            color:red;
            font-style: italic
        }
    </style>
</head>

<body>
    <h1 id="title">Đăng ký tham gia sự kiện <div class="title">Anna <span>Billiards</span> <span>Club</span></div> party
        year old</h1>
    <div id="form-outer">
        <p id="description">
            Hoàn thành thông tin dưới đây để đăng ký làm khách mời sự kiện vào ngày 8:00 PM - 14/10/2024</p>
        <form id="survey-form">
            <div class="rowTab">
                <div class="labels">
                    <label id="name-label" for="name">* Họ và tên khách mời: </label>
                </div>
                <div class="rightTab">
                    <input autofocus type="text" name="name" id="name" class="input-field" placeholder="Nhập họ và tên"
                        required>
                </div>
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label id="phone-label" for="phone">* Số điện thoại: </label>
                </div>
                <div class="rightTab">
                    <input type="text" name="phone" id="phone" class="input-field" placeholder="Nhập số điện thoại"
                        required>
                </div>
            </div>

            <div class="rowTab">
                <div class="labels">
                    <label for="favRole">* Bạn biết đến sự kiện qua đâu?</label>
                </div>
                <div class="rightTab">
                    <select id="dropdown" name="currentPos" class="dropdown">
                        <option disabled value>Chọn một giá trị</option>
                        <option value="Tại quầy thu ngân">Tại quầy thu ngân</option>
                        <option value="Tờ rơi">Tờ rơi</option>
                        <option value="Quảng cáo facebook, google, tiktok">Quảng cáo facebook, google, tiktok</option>
                        <option value="none">Khác</option>
                    </select>
                </div>
            </div>
            <div class="rowTab">
                <div class="labels">
                    <label for="favRole">Link bài viết chia sẻ</label>
                </div>
                <div class="rightTab">
                    <textarea name="link_share" class="input-field" id="" cols="30" rows="10"></textarea>
                </div>

            </div>



            <button id="submit" type="submit">Đăng ký ngay</button>
        </form>
        <div class="faq-container">
            <div class="faq-item">
                <div class="question">Đăng ký khách mời có lợi ích gì ?</div>
                <div class="answer">Khi bạn đăng ký làm khách mời, bạn sẽ có đặc quyền so với khách vãng lai (Chỉ áp
                    dụng trong ngày diễn ra sự kiện, ngày 14/10/2024) là :<br />
                    <ul style="text-align: left">
                        <li style="margin:10px">Được ưu tiên tham gia các chương trình mini game (miễn phí) để nhận
                            những phần quà cực kỳ hấp dẫn</li>
                        <li style="margin:10px">Được giảm giá trên tổng % bill khi thanh toán lên tới 50%</li>
                        <li style="margin:10px">Được tặng thêm phần quà hấp dẫn khi tổng bill thanh toán trên 200k</li>
                    </ul>
                </div>
            </div>
            <div class="faq-item">
                <div class="question">
                    <p style="color: green;display: inline-block">"Link bài viết chia sẻ"</p> ở form đăng ký là gì, như
                    thế nào là hợp lệ ?
                </div>
                <div class="answer">Hãy truy cập tại link -><a href="https://www.facebook.com/share/p/hbjZ6hSi2v8Gpr45/"
                        style="color: #007bff" target="_blank"><b><i>Facebook post</i></b></a> và chia sẻ bài viết này
                    trên dòng thời gian facebook, tag 3 bạn bè bất kỳ và để chế độ công khai sau đó lấy link bài viết đã
                    chia sẻ trên dòng thời gian facebook của bạn và nhập nó vào đây. BTC sẽ kiểm tra và xác nhận
                </div>
            </div>
            <div class="faq-item">
                <div class="question">Hướng dẫn cách lấy link bài viết chia sẻ</div>
                <div class="answer">

                    <ul style="text-align: left">
                        <li style="margin:10px"><b>B1: </b>hãy truy cập tại link -><a
                                href="https://www.facebook.com/share/p/hbjZ6hSi2v8Gpr45/" style="color: #007bff"
                                target="_blank"><b><i>Facebook post</i></b></a><br />
                            <img src="/img/1.png" alt="" style="width:100%;height:auto;border:1px solid black">
                        </li>
                        <li style="margin:10px"><b>B2: </b>Nhấn nút <b><i>sao chép</i></b> phần caption tag 3 bạn bất kỳ
                            bằng cách nhập ký tự @, sau đó chọn chế độ <b><i>Công khai</i></b> và nhấn <b><i>chia sẻ
                                    ngay</i></b><br />
                            <img src="/img/2.png" alt="" style="width:100%;height:auto;border:1px solid black">
                        </li>
                        <li style="margin:  10px"><b>B3:</b> Vào <b><i>Trang cá nhân</i></b> kéo xuống bài viết vừa chia
                            sẻ nhấn nút <b><i>Sao chép</i></b> để lấy link bài viết chia sẻ<br />
                            <img src="/img/3.jpg" alt="" style="width:100%;height:auto;border:1px solid black">
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <footer>

        <p>Created by <a href="https://fb.com/congminher" target="_blank">Công Minh</a> </p>
    </footer>
    
    <script>
        $(document).ready(function() {
            $('.question').on('click', function() {
                // Kiểm tra xem câu trả lời hiện tại đã được mở hay chưa
                var answer = $(this).next('.answer');

                // Đóng tất cả các câu trả lời khác trừ câu hiện tại
                $('.answer').not(answer).slideUp();

                // Toggle (mở nếu đóng, và đóng nếu đang mở) cho câu trả lời hiện tại
                answer.slideToggle();
            });
            $.validator.addMethod("vietNamPhone", function(value, element) {
                // Số điện thoại Việt Nam hợp lệ phải bắt đầu bằng 09 và có 10 chữ số
                return this.optional(element) || /^0\d{9}$/.test(value);
            }, "Vui lòng nhập số điện thoại hợp lệ, đủ 10 chữ số.");

            $("#survey-form").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    phone: {
                        required: true,
                        vietNamPhone: true
                    }
                },
                messages: {
                    name: {
                        required: "Vui lòng nhập họ và tên.",
                        minlength: "Họ và tên phải có ít nhất 3 ký tự."
                    },
                    phone: {
                        required: "Vui lòng nhập số điện thoại.",
                        vietNamPhone: "Vui lòng nhập số điện thoại hợp lệ."
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: '/api/ajax-form', // URL mà dữ liệu được gửi đến
                        type: 'POST',
                        data: $(form).serialize(), // Serialize dữ liệu form
                        success: function(response) {
                            // Xử lý khi gửi form thành công
                            if(response.status){
                                Swal.fire("Đăng ký thành công!").then((result) => {
                                    location.href = "https://www.facebook.com/annabilliard";
                                });
                                
                            }else{
                                alert('Lỗi!');
                            }
                        },
                        error: function(xhr, status, error) {
                            // Xử lý khi có lỗi
                            alert('Đã xảy ra lỗi trong quá trình gửi form.');
                            console.log(xhr.responseText);
                        }
                    });
                }
            });

            });
    </script>
</body>

</html>