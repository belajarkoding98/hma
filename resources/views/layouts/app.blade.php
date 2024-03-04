<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login - PT. Hanatekindo Mulia Abadi</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" />

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">

</head>


<body>


    @yield('content')



    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

    <!-- KNOB JS -->
    <script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('form#login input').on('change', function () {
                $(this).parent().removeClass('has-error');
                $(this).next().next().text('');
            });

            $('form#login').on('submit', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
                // alert('sukses');

                var infobox = $('#infoMessage');
                infobox.addClass('callout callout-info').text('Checking...');

                var btnsubmit = $('#submit');
                btnsubmit.attr('disabled', 'disabled').text('Wait...');

                var email = $("#email").val();
                var password = $("#password").val();

                var data = {
                    "_token": $('input[name=_token]').val(),
                    'email': email,
                    'password': password,
                };
                $.ajax({
                    url: '{{ route("login.action") }}',
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        infobox.removeAttr('class').text('');
                        btnsubmit.removeAttr('disabled').val('Login');

                        if (response.status == 200) {
                            infobox.addClass('callout callout-success text-center bg-success').text(response.message);
                            window.location.href = '/dashboard';
                        } else {
                            infobox.addClass('callout callout-danger text-center bg-danger').text(response.message);
                            window.location.href = '/login';
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>