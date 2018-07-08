@extends('layouts.activebook')

@section('style')
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- the following are for jquery-file-upload -->
    <link rel="stylesheet" href="{{asset('css/file-upload/jquery.fileupload.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <style>
    table.bordered_cells td {
    }
    table.bordered_cells th {
      border:1px solid #AAA;
      background-color:#CCC;
      text-align:center;
    }
    td.grey_border {
      background-color:#e6e6e6;
      border:1px solid #AAA;
    }
    td.inactive {
      background-color:#e6e6e6;
      border:1px solid #AAA;
    }
    td.booked {
      background-color:#ffb3b3;
      border:1px solid #AAA;
    }
    td.open {
      background-color:#ccffcc;
      border:1px solid #AAA;
    }
    td.open_hover {
      background-color:#99ff99;
      border:1px solid #AAA;
    }
    td.selected {
      background-color:#00e600;
      border:2px solid #009900;
    }
    td.selected_below, th.selected_below {
      border-bottom: 2px solid #009900;
    }
    td.selected_right {
      border-right: 2px solid #009900;
    }
    table.table_thin th {
      line-height: 7px;
      text-align: center;
    }
    table.table_thin td {
      line-height: 7px;
      text-align: center;
    }
    table.table_thin {
      table-layout: fixed;
      width: 100%;
    }
    table.table_thinner th {
      line-height: 5px;
      text-align: center;
    }
    table.table_thinner td {
      line-height: 5px;
      text-align: center;
    }
    td.hour {
      border:1px solid #AAA;
      background-color:#CCC;
    }
    tr.odd td {
      background-color:#e6e6e6;
    }
    tr.even td {
      background-color:#f2f2f2;
    }
    div.vertically_centered p {
      display: table-cell;
      height:50px;
      vertical-align: center;
    }
    div.trainer_review {
      vertical-align:center;
    }
    td.booked-blink {
      background-color:#ff9999;
    }
    td.inactive-blink {
      background-color:#d9d9d9;
    }
    table.table_centered td {
      text-align:center;
    }
    table.table_centered th {
      text-align:center;
    }
    div.weeks_box {
      background-color:#f2f2f2;
      border:1px solid #8c8c8c;
      height:30px;
    }
    div.week_hover {
      background-color:#d9d9d9;
      border:1px solid #808080;
      height:30px;
    }
    div.week_selected {
      background-color:#cccccc;
      border:2px solid #808080;
      height:30px;
    }


    #timetable_table {
        border:1px solid #e6e6e6;
        border-radius:5px;
        width:100%;
    }
    #timetable_table thead th {
        text-align:center;
        font-size:18px;
    }
    td.timetable_inactive {
        background-color: white;
        border-right: 1px solid #e6e6e6;
        border-bottom: 1px solid #e6e6e6;
    }
    td.timetable_inactive_hover {
        background-color: #f2f2f2 !important;
    }
    td.timetable_active {
        background-color: #99ff99;
        border-right: 1px solid #e6e6e6;
        border-bottom: 1px solid #e6e6e6;
    }
    td.timetable_active_hover {
        background-color: #4dff4d !important;
    }
    td.timetable_booked {
        background-color: #ff9999;
        border-right: 1px solid #e6e6e6;
        border-bottom: 1px solid #e6e6e6;
    }
    td.timetable_booked_hover {
        background-color: #ff4d4d !important;
    }
    td.timetable_time {
        text-align: center;
        border-right:1px solid #111;
    }
    td.timetable_time_hover {
        background-color: #f2f2f2;
    }
    th.timetable_day_hover {
        background-color: #f2f2f2;
    }
    #book_button {
      background-color:#70db70;
      border:2px solid #29a329;
      height:100px;
      width:100px;
    }
    #profile_overlay{
      position: fixed; /* Sit on top of the page content */
      width: 80%; /* Full width (cover the whole page) */
      height: 80%; /* Full height (cover the whole page) */
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0,0,0,0.5); /* Black background with opacity */
      z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
      cursor: pointer; /* Add a pointer on hover */
    }
  </style>
@endsection

@section('content')
  <section class="g-mb-100">
    <div class="container">
      <div class="row">
        <!-- Profile Sidebar -->
        <div class="col-lg-3 g-mb-50 g-mb-0--lg">
          <!-- User Image -->
          <div class="u-block-hover g-pos-rel">
            <figure>
              <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="{{$picture_name}}">
            </figure>

            <!-- Figure Caption -->
            <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
              <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">
                <!-- Figure Social Icons -->
                <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">
                  <li class="list-inline-item align-middle g-mx-7">
                    <a class="u-icon-v1 u-icon-size--md g-color-white" href="#!">
                      Open
                    </a>
                  </li>
                </ul>
                <!-- End Figure Social Icons -->
              </div>
            </figcaption>
            <!-- End Figure Caption -->
          </div>
          <!-- User Image -->
          <div id="profile_overlay" style="display:none;">
            <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="{{$picture_name}}">
          </div>

          <!-- Sidebar Navigation -->
          <div class="list-group list-group-border-0 g-mb-40">
            <div class="list-group-item list-group-item-action justify-content-between">
              <!-- <span style="vertical-align:center; font-size:20px;">Starts at: <span style="font-size:30px;">$50/hr</span></span> -->
              <div class="row">
                <div class="col-lg-6" style="height:50px; padding-top:10px;">
                  <span style="font-size:20px;">Starts at:</span>
                </div>
                <div class="col-lg-6 vertically_centered">
                  <p style="vertical-align:center; font-size:30px;">{{$baserate}}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- End Sidebar Navigation -->

          <!-- Project Progress -->
          <div class="card border-0 rounded-0 g-mb-50">
            <!-- Panel Body -->
            <div class="card-block u-info-v1-1 g-height-300 g-pa-0">
              <!-- Web Design -->
              <div class="g-mb-20">
                <div class="g-bg-cyan g-color-white g-pa-25">
                  <header class="d-flex text-uppercase g-mb-40">
                    <i class="icon-people align-self-center display-4 g-mr-20"></i>

                    <div class="g-line-height-1">
                      <h4 class="h5">Total Sessions</h4>
                      <div class="js-counter g-font-size-30" data-comma-separated="true">{{$stats['sessions_total']}}</div>
                    </div>
                  </header>

                  <div class="d-flex justify-content-between text-uppercase g-mb-25">
                    <div class="g-line-height-1">
                      <h5 class="h6 g-font-weight-600">Last Week</h5>
                      <div class="js-counter g-font-size-16" data-comma-separated="true">{{$stats['sessions_week']}}</div>
                    </div>

                    <div class="text-right g-line-height-1">
                      <h5 class="h6 g-font-weight-600">Last Month</h5>
                      <div class="js-counter g-font-size-16" data-comma-separated="true">{{$stats['sessions_month']}}</div>
                    </div>
                  </div>

                  <h6 class="g-mb-10">Customer Satisfaction<span class="float-right g-ml-10">{{$stats['rating']}}</span></h6>
                  <div class="js-hr-progress-bar progress g-bg-black-opacity-0_1 rounded-0 g-mb-5">
                    <div class="js-hr-progress-bar-indicator progress-bar g-bg-white u-progress-bar--xs" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Panel Body -->
          </div>
          <!-- End Project Progress -->
        </div>
        <!-- End Profile Sidebar -->

        <!-- Profle Content -->
        <div class="col-lg-9">
          <!-- User Block -->
          <div class="g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-40">
            <div class="row">
              <!-- <div class="col-lg-1 g-mb-40 g-mb-0--lg"></div> -->

              <div class="col-lg-12">
                <!-- User Details -->
                <div class="d-flex align-items-center justify-content-sm-between g-mb-5">
                  <h2 class="g-font-weight-300 g-mr-10">{{$name}}</h2>
                  <ul class="list-inline mb-0">
                    @foreach($socials as $s)
                      <li class="list-inline-item g-mx-2">
                        <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-gray-light-v1 g-bg-gray-light-v5 g-color-gray-light-v1--hover rounded-circle" href="{{$s['url']}}">
                          <i class="g-font-size-default g-line-height-1 u-icon__elem-regular {{$s['name']}}"></i>
                          <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover {{$s['name']}}"></i>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </div>
                <!-- End User Details -->

                <!-- User Position -->
                <h4 class="h6 g-font-weight-300 g-mb-10">
                    <!-- TODO: replace this icon with a placeholder gym logo-->
                    <div class="row">
                      @foreach($locations as $i => $l)
                        @if($i < 4)
                        <div class="col-lg-3 col-md-3 col-sm-3">
                          <a href="/location/{{$l['id']}}">
                            <img src="{{$l['picture_url']}}" style="border-radius:50%; border:2px solid orange" height="40" width="40">&nbsp;&nbsp;{{$l['name']}}
                          </a>
                        </div>
                        @endif
                        <!-- TODO: MAKE NEW ROW FOR > 4 LOCATIONS? -->
                      @endforeach
                    </div>
                </h4>
                <!-- End User Position -->

                <!-- User Info -->
                <ul class="list-inline g-font-weight-300">
                  @if($age != '')
                      <li class="list-inline-item g-mr-20">
                          <i class="icon-user g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i> {{$age}} years old
                      </li>
                  @endif
                  <li class="list-inline-item g-mr-20">
                      <i class="icon-clock g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i> Member for {{$member_time}}
                  </li>
                </ul>
                <!-- End User Info -->

                <hr class="g-brd-gray-light-v4 g-my-20">

                <p class="lead g-line-height-1_8">{{$bio}}</p>
              </div>
            </div>
          </div>
          <!-- End User Block -->

          <div class="card-block u-info-v1-1 g-height-300 g-pa-0">
            <div class="row">
              <div class="col-lg-6">
                  <br>
                  <canvas id="activitychart"></canvas>
                </div>
              <div class="col-lg-6">
                <br>
                @foreach($reviews as $i => $r)
                  @if($i < 2)
                    <div class="trainer_review">
                      <div class="row">
                        <div class="col-lg-3">
                          <a href="/profile/{{$r['reviewer_id']}}">
                            <img src="{{$r['reviewer_picture_url']}}" alt="Reviewer" style="border-radius:50%;" height="70" width="70">
                          </a>
                        </div>
                        <div class="col-lg-9">
                          <span style="font-size:14px;">"{{$r['review']}}"</span>
                        </div>
                      </div>
                    </div>
                  @endif
                  @if($i == 0)
                    <br><br>
                  @endif
                @endforeach
              </div>
            </div>
            <br>
            <div style="text-align:center;">
              <button type="button" class="btn btn-warning">More Reviews</button>
            </div>
          </div>
          <br>
          <!-- Experience Timeline -->
          <div class="g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-40">
            <span style="font-size:25px;">Timetable</span>
            <!-- Panel Body -->
            <div class="card-block u-info-v1-1">
              <!-- Start Week Selector -->
              <div class="row g-mb-35">
                <div class="col-lg-3 col-md-3 col-sm-3 row">
                  <div class="col-lg-9 col-md-9 col-sm-9" style="text-align:center;">
                    <span style="font-size:20px;">Year</span>
                    <select id="timetable_year" style="font-size:16px; padding:2px; border-radius:2px;">
                        <option disabled selected value>Year</option>
                        @foreach($years as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 g-pt-15">
                    <i class="fas fa-arrow-right fa-lg"></i>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 row">
                  <div class="col-lg-9 col-md-9 col-sm-9" style="text-align:center;">
                    <span style="font-size:20px;">Month</span>
                    <select id="timetable_month" style="font-size:16px; padding:2px; border-radius:2px;">
                        <option disabled selected value>Month</option>
                    </select>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 g-pt-15">
                    <i class="fas fa-arrow-right fa-lg"></i>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 row">
                  <div class="col-lg-9 col-md-9 col-sm-9" style="text-align:center;">
                    <span style="font-size:20px;">Week</span>
                    <select id="timetable_week" style="font-size:16px; padding:2px; border-radius:2px;">
                        <option disabled selected value>Week</option>
                    </select>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 g-pt-15">
                    <i class="fas fa-arrow-right fa-lg"></i>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 g-pt-10 g-pl-30">
                  <button id="show_week_button" class="btn btn-info btn-labeled"><span class="btn-label"><i class="fas fa-angle-double-down"></i></span>&nbsp;&nbsp;Show</button>
                </div>
              </div>
              <!-- End Week Selector -->

              <!-- Start Timetable -->
                <div class="row">
                    <table id="timetable_table" style="display:none;">
                        <thead>
                            <th id="time" style="border-right:1px solid #111;"></th>
                            <th id="mon">Mon</th>
                            <th id="tue">Tue</th>
                            <th id="wed">Wed</th>
                            <th id="thu">Thu</th>
                            <th id="fri">Fri</th>
                            <th id="sat">Sat</th>
                            <th id="sun">Sun</th>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- End Panel Body -->
          </div>
          <!-- End Experience Timeline -->
          <div style="text-align:center;">
            <div id="book_button" style="margin: 0 auto; border-radius:10px;">
              Book Now
            </div>
          </div>
        </div>
        <!-- End Profle Content -->
      </div>
    </div>
  </section>

@if($access == 0)
    <div id="session_info_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Session Details: <span id="session_info_daydesc"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div id="session_info_body" class="modal-body">
                    <div id="session_location" class="row" data-location-id="0">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <figure>
                                <img class="img-fluid w-50" src="">
                            </figure>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">

                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">

                        </div>
                    </div>
                    <select id="session_activity_select" style="font-size:20px; padding:3px; border-radius:3px;"></select>
                    <br>
                    <span id="session_activity_choice" style="font-size:20px;"></span>
                </div>
                <div class="modal-footer">
                    <button id="session_add_submit" type="button" class="btn btn-primary">Add Session</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@elseif($access == 1)


@endif
@endsection


  <!-- Page Javascript -->
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  @if($access == 1)
      <script src="{{asset('js/file-upload/vendor/jquery.ui.widget.js')}}"></script>
      <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
      <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
      <script src="{{asset('js/file-upload/jquery.iframe-transport.js')}}"></script>
      <script src="{{asset('js/file-upload/jquery.fileupload.js')}}"></script>
      <script src="{{asset('js/file-upload/jquery.fileupload-process.js')}}"></script>
      <script src="{{asset('js/file-upload/jquery.fileupload-image.js')}}"></script>
      <script src="{{asset('js/file-upload/jquery.fileupload-validate.js')}}"></script>
  @endif

  <script>
    $(document).on('ready', function () {
        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of chart pies
        var items = $.HSCore.components.HSChartPie.init('.js-pie');

        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init( $('.js-scrollbar') );

        var names = [];
        var percentages = [];
        var bgcolours = [];
        var bdcolours = [];
        @foreach($activities as $a)
          names.push("{{$a['name']}}");
          percentages.push(Number("{{$a['percentage']}}"));
          bgcolours.push("{{$a['bgcolour']}}");
          bdcolours.push("{{$a['bdcolour']}}");
        @endforeach

        var ctx = document.getElementById("activitychart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: names,
                datasets: [{
                    label: '% of Training Type',
                    data: percentages,
                    backgroundColor: bgcolours,
                    borderColor: bdcolours,
                    borderWidth: 1
                }]
            },
            options: {
            }
        });

        $(document).on('change', "#timetable_year", function(){
            //get the viewable months for this year (AB only allows booking up to 6 months in advance)
            $.ajax({
                method: 'POST',
                url: '/timetable_get_months',
                data: 'year='+$('#timetable_year').val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data['status'] == 'success') {
                        $('#timetable_month').val('');
                        $('#timetable_week').val('');
                        $('#timetable_month').html('<option disabled selected value>Month</option>'+data['html']);
                    } else {
                        swal('', 'There was an error. Please reload the page and try again.', 'error');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        });

        $(document).on('change', "#timetable_month", function(){
            //get the weeks that start in this month
            $.ajax({
                method: 'POST',
                url: '/timetable_get_weeks',
                data: 'year='+$('#timetable_year').val()+'&month='+$('#timetable_month').val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data['status'] == 'success') {
                        $('#timetable_week').val('');
                        $('#timetable_week').html('<option disabled selected value>Week</option>'+data['html']);
                    } else {
                        swal('', 'There was an error. Please reload the page and try again.', 'error');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        });

        var show_timetable = false;
        var timetable;

        var timetable_format = function(json) {
            //we need to convert the 'inactive', 'active', or 'booked' html of each td into the class of the td, then clear the html
            $('#timetable_table').find('td:contains("inactive")').addClass('timetable_inactive');
            $('#timetable_table').find('td:contains("inactive")').html('');
            $('#timetable_table').find('td:contains("active")').addClass('timetable_active');
            $('#timetable_table').find('td:contains("active")').html('');
            $('#timetable_table').find('td:contains("booked")').addClass('timetable_booked');
            $('#timetable_table').find('td:contains("booked")').html('');
            //remove the row styling
            $('#timetable_table').find('tr.odd').removeClass('odd');
            $('#timetable_table').find('tr.even').removeClass('even');
            //make time column text-align center and add the right border
            $('#timetable_table').find('tr').each(function(){
                $(this).find('td').first().addClass('timetable_time');
            });
            //make table 100% width (fixed px?)
            $('#timetable_table_wrapper').attr('style', 'width:100%');
            $('#timetable_table').attr('style', 'width:100%');
            //fix double borders on right and bottom cells
            $('#timetable_table').find('tr').each(function(){
                var style = '';
                if (typeof $(this).find('td').last().attr('style') != 'undefined') {
                    style = $(this).find('td').last().attr('style')+' ';
                }
                $(this).find('td').last().attr('style', style+'border-right: none;');
            });
            var i = 0;
            $('#timetable_table').find('tr').last().find('td').each(function() {
                if (i > 0) {
                    var style = '';
                    if (typeof $(this).attr('style') != 'undefined') {
                        style = $(this).attr('style')+' ';
                    }
                    $(this).attr('style', style+'border-bottom: none;');
                }
                i++;
            });
        }

        var week_dates = [];
        $(document).on('click', '#show_week_button', function(e) {
            e.preventDefault();
            //display the timetable of the trainer for the week selected
            if (show_timetable == false) {
                $('#timetable_table').attr('style', '');
                timetable = $('#timetable_table').DataTable({
                    'ajax': {
                        'url': '/timetable_display',
                        'method': "POST",
                        'data': {
                            "user_id": '{{$user_id}}',
                            "year": $('#timetable_year').val(),
                            "month": $('#timetable_month').val(),
                            "week": $('#timetable_week').val()
                        },
                        'headers': {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    },
                    'columns': [
                        {data:"time", width:"16%"},
                        {data:"mon", width:"12%"},
                        {data:"tue", width:"12%"},
                        {data:"wed", width:"12%"},
                        {data:"thu", width:"12%"},
                        {data:"fri", width:"12%"},
                        {data:"sat", width:"12%"},
                        {data:"sun", width:"12%"}
                    ],
                    'paging': false,
                    'searching': false,
                    'ordering': false,
                    'initComplete': function(settings, json) {
                        timetable_format(json);
                    },
                    'bInfo': false
                });
                show_timetable = true;
            } else {
                timetable.ajax.reload(timetable_format);
            }

            //we also want to know specifically what the dates are
            $.ajax({
                method: 'POST',
                url: '/timetable_week_dates',
                data: 'user_id={{$user_id}}&year='+$('#timetable_year').val()+'&month='+$('#timetable_month').val()+'&week='+$('#timetable_week').val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    data = JSON.parse(data);
                    if (data['status'] == 'success') {
                        week_dates = data['week_dates'];
                    } else {
                        swal('', 'There was an error. Please reload the page and try again.', 'error');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
        });
        //TODO: ACCESS = 0 MEANS ITS A CUSTOMER TIMETABLE, ACCESS = 1 MEANS THE TRAINER IS VIEWING IT (SHOW DIFFERENT INFO)

        $(document).on("mouseenter", "#timetable_table tbody td", function() {
            if (typeof this != 'undefined') {
                if ($(this).hasClass('timetable_inactive')) {
                    $(this).addClass('timetable_inactive_hover');
                } else if ($(this).hasClass('timetable_active')) {
                    $(this).addClass('timetable_active_hover');
                } else if ($(this).hasClass('timetable_booked')) {
                    $(this).addClass('timetable_booked_hover');
                }
                var col_index = timetable.cell(this).index().column+1;
                var row_index = timetable.cell(this).index().row+1;
                $('#timetable_table').find('th:nth-child('+col_index+')').addClass('timetable_day_hover');
                $('#timetable_table').find('tr:nth-child('+row_index+')').children('td').first().addClass('timetable_time_hover');
            }
        });

        $(document).on("mouseleave", "#timetable_table tbody td", function() {
            if (typeof this != 'undefined') {
                if ($(this).hasClass('timetable_inactive_hover')) {
                    $(this).removeClass('timetable_inactive_hover');
                } else if ($(this).hasClass('timetable_active_hover')) {
                    $(this).removeClass('timetable_active_hover');
                } else if ($(this).hasClass('timetable_booked_hover')) {
                    $(this).removeClass('timetable_booked_hover');
                }
                var col_index = timetable.cell(this).index().column+1;
                var row_index = timetable.cell(this).index().row+1;
                $('#timetable_table').find('th:nth-child('+col_index+')').removeClass('timetable_day_hover');
                $('#timetable_table').find('tr:nth-child('+row_index+')').children('td').first().removeClass('timetable_time_hover');
            }
        });

        @if($access == 0)
            //this is a client viewing the timetable, so allow them to make bookings
            $(document).on('click', '#timetable_table tbody td', function(e) {
                console.log('click');
                e.preventDefault();

                if ($(this).hasClass('timetable_inactive')) {
                    //flash the cell grey to show that the user has no actions
                } else if ($(this).hasClass('timetable_booked')) {
                    //flash the cell red to show that the time is booked
                } else if ($(this).hasClass('timetable_active')) {
                    //display the day and time, show location, show price, provide single or recurring choice (week range for recurring)
                    var col_index = timetable.cell(this).index().column+1;
                    var row_index = timetable.cell(this).index().row+1;
                    var day = $('#timetable_table').find('th:nth-child('+col_index+')').html();
                    var conversions = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
                    var index = conversions.indexOf(day);
                    if (index >= 0) {
                        var date = week_dates[index];
                        var time = $('#timetable_table').find('tr:nth-child('+row_index+')').children('td').first().html();
                        $.ajax({
                            method: 'POST',
                            url: '/session_get_details',
                            data: 'trainer_id={{$user_id}}&date='+date+'&time='+time,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                data = JSON.parse(data);
                                if (data['status'] == 'success') {
                                    //remind the user of the session date
                                    $('#session_info_daydesc').html(data['day']+' ('+data['date']+')');
                                    //describe the session location
                                    $('#session_location').attr('data-location-id', data['location'][0]);
                                    $('#session_location').children('div').first().find('img').attr('src', data['location'][2]);
                                    $('#session_location').children('div:nth-child(2)').html(data['location'][1]);
                                    $('#session_location').children('div:nth-child(3)').html(data['location'][3]);
                                    //set the activities
                                    $('#session_activity_select').val('');
                                    var activity_html = '';
                                    var activity;
                                    for (i in data['activities']) {
                                        activity = data['activities'][i];
                                        activity_html += "<option name='activity_"+activity[0]+"' data-price='"+activity[2]+"'>"+activity[1]+"</option>";
                                    }
                                    $('#session_activity_select').html(activity_html);
                                    //open the modal
                                    $('#session_info_modal').modal('show');
                                } else {
                                    swal('', 'There was an error. Please reload the page and try again.', 'error');
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                            }
                        });
                    } else {
                        swal('', 'There was an error. Please reload the page and try again.', 'error');
                    }
                }
            });
        @elseif($access == 1)
            //this is the trainer viewing the timetable, so give them admin tools
        @endif
      });

      $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
        });

        // initialization of horizontal progress bars
        setTimeout(function () { // important in this case
          var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
            direction: 'horizontal',
            indicatorSelector: '.js-hr-progress-bar-indicator'
          });
        }, 1);
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
  </script>
@endsection
