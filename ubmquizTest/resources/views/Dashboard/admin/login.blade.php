<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dist/css/login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    {{--    <link href="{{ asset('dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />--}}
    {{--    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css" />--}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Universal Burnout Meter</title>
</head>

<body class="login-page">


<main>

    <div class="login-block">
        <img src="assests/images/Group 28.png" alt="UBM">
        <h1>Log into your account</h1>

        <form>
            <hr class="hr-xs">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope ti-email"></i></span>
                    <input type="email" required class="form-control email" placeholder="Email address">
                </div>
            </div>

            <hr class="hr-xs">

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock ti-unlock"></i></span>
                    <input type="password" required class="form-control password" placeholder="Password">
                </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
    </div>

</main>

<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-block', function (e) {
            e.preventDefault();
            var email  = $('.email').val();
            var pass = $('.password').val();
            var data = {
                'email':email,
                'password':pass,

            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/login",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_options').text('Save');
                    } else {
                        window.location.href = '/admin';

                    }
                }
            });

        });



    });
</script>
</body>
</html>


