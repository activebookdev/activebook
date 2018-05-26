@extends('layouts.activebookhome')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form id="login_form">
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <!-- Scripts -->
    <!-- JS Global Compulsory -->
    <script src="{{asset('js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{asset('js/appear.js')}}"></script>
    <script src="{{asset('js/hs-megamenu/src/hs.megamenu.js')}}"></script>
    <script src="{{asset('js/circles/circles.min.js')}}"></script>
    <script src="{{asset('js/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- JS Unify -->
    <script src="{{asset('js/hs.core.js')}}"></script>
    <script src="{{asset('js/helpers/hs.hamburgers.js')}}"></script>
    <script src="{{asset('js/components/hs.header.js')}}"></script>
    <script src="{{asset('js/components/hs.tabs.js')}}"></script>
    <script src="{{asset('js/components/hs.progress-bar.js')}}"></script>
    <script src="{{asset('js/components/hs.scrollbar.js')}}"></script>
    <script src="{{asset('js/components/hs.chart-pie.js')}}"></script>
    <script src="{{asset('js/components/hs.go-to.js')}}"></script>

    <!-- JS Customization -->
    <script src="{{asset('js/custom.js')}}"></script>
    <!-- <script src="jquery-3.3.1.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>

    <script>
        $(document).on('ready', function () {

            $(document).on('submit', '#login_form', function(e) {
                console.log('xd');
                e.preventDefault();

                var message = 'Please fix the following and try again:';
                var pass = [0, 0];
                if ($('#email').val().length > 0 && $('#email').val().indexOf('@') > -1) {
                    pass[0] = 1;
                } else {
                    message += '<br>Enter a valid email address.';
                }
                if ($('#password').val().length >= 6) {
                    pass[1] = 1;
                } else {
                    message += '<br>Enter a password of 6 characters or more.';
                }

                if (pass[0] == 1 && pass[1] == 1) {
                    var data = $(this).serialize();
                    
                    $.ajax({
                        method: 'POST',
                        url: '/submit_login',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data['status'] == 'success') {
                                window.location.href = '/profile';
                            } else if (data['status'] == 'new_ip') {
                                swal('', "You have attempted to login from a location that is new to your account. Please verify your login by clicking the link we've sent to your email address, and then try again.", 'warning');
                            } else if (data['status'] == 'inactive') {
                                swal('', 'You have not yet verified your account. Please check for an email from ActiveBook and click the link to confirm your email address, then try to login again.', 'warning');
                            } else if (data['status'] == 'wrong_password') {
                                swal('', 'You have entered an incorrect password. Please try again.', 'warning');
                            } else if (data['status'] == 'no_account') {
                                swal('', 'An account with this email address does not exist - please register for an account and then try again.');
                            } else {
                                swal('', 'There was a system error. Please reload the page and try again.', 'error');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                } else {
                    swal('', message, 'warning');
                }
            });
        });
    </script>
@endsection