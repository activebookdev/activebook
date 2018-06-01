@extends('layouts.activebookhome')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Reset Password</div>
                    <div class="card-body">
                        Coming soon.
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
    <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>-->
@endsection