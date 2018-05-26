@extends('layouts.activebookhome')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form id="register_form">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autofocus>
                                </div>
                            </div>

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

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="password_confirm" type="password" class="form-control" name="password_confirm" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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

            $(document).on('submit', '#register_form', function(e) {
                e.preventDefault();

                var message = 'Please fix the following and try again:';
                var pass = [0, 0, 0, 0];
                if ($('#name').val().length > 0 && $('#name').val().indexOf(' ') > -1) {
                    pass[0] = 1;
                } else {
                    message += '<br>Enter a valid first and last name.';
                }
                if ($('#email').val().length > 0 && $('#email').val().indexOf('@') > -1) {
                    pass[1] = 1;
                } else {
                    message += '<br>Enter a valid email address.';
                }
                if ($('#password').val().length >= 6) {
                    pass[2] = 1;
                } else {
                    message += '<br>Enter a password of 6 characters or more.';
                }
                if ($('#password_confirm').val() == $('#password').val()) {
                    pass[3] = 1;
                } else {
                    message += '<br>Ensure both passwords match.';
                }

                if (pass[0] == 1 && pass[1] == 1 && pass[2] == 1 && pass[3] == 1) {
                    var data = $(this).serialize();
                    
                    $.ajax({
                        method: 'POST',
                        url: '/submit_register',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data){
                            data = JSON.parse(data);
                            if (data['status'] == 'success') {
                                window.location.href = '/login';
                                //swal('', "You have successfully created an account! Please check your email and click the link we've sent you to verify your account.", 'success');
                            } else if (data['status'] == 'exists') {
                                var verified = data['verified'];
                                var initials = data['initials'];
                                if (verified == 1 && initials == 'unknown') {
                                    swal('', 'This email address has already been verified for an unknown account. Please contact our support team and we will help solve this issue and set up your account.' , 'warning');
                                } else if (verified == 1) {
                                    swal('', 'This email address has already been verified by an existing user with initials '+initials+'. If this is you, then please try to login to your existing account. Otherwise, please contact our support team and we will help solve this issue and set up your account.' , 'warning');
                                } else if (initials == 'unknown') {
                                    swal('', 'Another unknown user has recently attempted to claim this email address, but has not yet verified their ownership. If this was you, then please check your emails and click the verification link to use your original account. Otherwise, please contact our support team and we will help solve this issue and set up your account.' , 'warning');
                                } else {
                                    swal('', 'Another user with initials '+initials+' has recently attempted to claim this email address, but has not yet verified their ownership. If this was you, then please check your emails and click the verification link to use your original account. Otherwise, please contact our support team and we will help solve this issue and set up your account.', 'warning');
                                }
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
