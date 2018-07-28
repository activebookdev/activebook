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
        cursor:pointer;
    }
    td.timetable_active_hover {
        background-color: #4dff4d !important;
        cursor:pointer;
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
    .remove_session {
        height: 25px;
        width: 25px;
        background-color: #ff1a1a;
        border-radius: 50%;
        display: inline-block;
        cursor: pointer;
    }
    .remove_session i {
        color: white;
        margin-right: 6.5px;
        margin-top: 6px;
    }
    div.sessioninfo {
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;
        margin-bottom:20px;
    }
    div[name="sessioninfo_activity"] {
        font-size:20px;
        text-align:center;
    }
    div[name="sessioninfo_activity"] i {
        margin-top:5px;
    }
    span[name="sessioninfo_time"] {
        font-size:20px;
    }
    span[name="sessioninfo_dates"] {
        font-size:15px;
    }
    span[name="sessioninfo_location_name"] {
        font-size:20px;
    }
    span[name="sessioninfo_location_address"] {
        font-size:15px;
    }
    div[name="sessioninfo_price"] {
        font-size: 30px;
        text-align: center;
    }
    div[name="sessioninfo_buttons"] {
        padding: 0;
        text-align: right;
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
          <div class="g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-20">
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
          <!-- Start Sessions Box -->
          <div id="sessions_box" class="g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-40" style="display:none;">
            <span style="font-size:25px;">Sessions</span>
            <!-- Panel Body -->
            <div class="card-block u-info-v1-1">
                <div class="row sessionsummary" style="margin-top:10px;">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="font-size:22px; text-align:right;">
                        <b>Total Price:</b>&nbsp;&nbsp;<span id="total_price">$135</span>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <button id="book_button" class="btn btn-success btn-labeled"><span class="btn-label" style="margin-right:10px;"><i class="fas fa-shopping-cart"></i></span>Book Sessions</button>
                    </div>
                </div>
            </div>
          </div>
          <!-- End Sessions Box -->
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
                        <div class="col-lg-3 col-md-3 col-sm-3" style="text-align:center;">
                            <figure>
                                <img class="img-fluid" src="" style="width:120px; border-radius:60px; border:1px solid #a6a6a6;">
                            </figure>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9">
                            <div class="row" style="font-size:22px; margin-top:25px; margin-bottom:5px;">

                            </div>
                            <div class="row" style="font-size:18px;">

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:30px; padding-left:30px; margin-bottom:30px;">
                        <div class="col-lg-2 col-md-2 col-sm-2" style="font-size:22px; text-align:right; padding-top:3px;">
                            <b>Activity:</b>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <select id="session_activity_select" style="font-size:22px; padding:4px; border-radius:4px; background-color:white;"></select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2" style="font-size:22px; text-align:right; padding-top:3px;">
                            <b>Type:</b>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <select id="session_type_select" style="font-size:22px; padding:4px; border-radius:4px; background-color:white;"></select>
                        </div>
                    </div>
                    <div class="row" style="margin-top:30px; padding-left:30px; margin-bottom:30px;">
                        <div class="col-lg-2 col-md-2 col-sm-2" style="font-size:22px; text-align:right; padding-top:3px;">
                            <b>Price:</b>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <span id="session_price" style="font-size:30px;"></span>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2" style="font-size:22px; text-align:right; padding-top:3px;">
                            <b>Date(s):</b>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <span id="session_dates" style="font-size:25px;"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="session_add_submit" type="button" class="btn btn-primary" disabled>Add Session</button>
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
            var session_dates = [];
            var session_info = []; //0 => day, 1 => date, 2 => time, 3 => location_id, 4 => location_name, 5 => location_address
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
                                    $('#session_info_daydesc').html(data['day']+' ('+data['date']+') at '+time);
                                    //describe the session location
                                    $('#session_location').attr('data-location-id', data['location'][0]);
                                    $('#session_location').children('div').first().find('img').attr('src', data['location'][2]);
                                    $('#session_location').children('div:nth-child(2)').children('div').first().html('<b>'+data['location'][1]+'</b>');
                                    $('#session_location').children('div:nth-child(2)').children('div:nth-child(2)').html(data['location'][3]);
                                    //set the activities
                                    $('#session_activity_select').val('');
                                    var activity_html = '<option disabled selected value>Activity</option>';
                                    var activity;
                                    for (i in data['activities']) {
                                        activity = data['activities'][i];
                                        activity_html += "<option name='activity_"+activity[0]+"' value='activity_"+activity[0]+"' data-activity-id='"+activity[0]+"' data-price='"+activity[2]+"'>"+activity[1]+"</option>";
                                    }
                                    $('#session_activity_select').html(activity_html);
                                    //set the activity type (single or recurring) options
                                    $('#session_type_select').val('');
                                    var type_html = '<option disabled selected value>Type</option>';
                                    var type;
                                    for (i in data['recurring_options']) {
                                        type = data['recurring_options'][i];
                                        type_html += "<option name='type_"+type[0]+"' value='type_"+type[0]+"' data-price-change='"+type[2]+"'>"+type[1]+"</option>";
                                    }
                                    $('#session_type_select').html(type_html);
                                    //clear the price field because we havent selected and activity yet
                                    $('#session_price').html('');
                                    //set the add session button to disabled because we havent selected an activity yet
                                    $('#session_add_submit').prop('disabled', true);
                                    //put the possible session dates into JS storage for use later
                                    session_dates = data['recurring_dates'];
                                    //store the constant info into our JS array
                                    session_info = [data['day'], data['date'], time, data['location'][0], data['location'][1], data['location'][3]];
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

            var update_session_price = function() {
                var price = $('#session_activity_select').find(":selected").data('price');
                var type_choice = $('#session_type_select').find(":selected").val();
                var price_change = $('#session_type_select').find('option[name="'+type_choice+'"]').data('price-change');
                var price_change_int = 0;
                if (price_change[0] == '+') {
                    price_change_int = Number(price_change.substring(1));
                } else if (price_change[0] == '-') {
                    price_change_int = (-1)*Number(price_change.substring(1));
                }
                var final_price = Number(type_choice[5])*Number(price) + price_change_int;
                $('#session_price').html('$'+final_price);
                $('#session_add_submit').prop('disabled', false);

                var num_weeks = Number(type_choice[5]);
                var dates_html = '';
                for (i in session_dates) {
                    if (i == num_weeks) {
                        break;
                    }
                    dates_html += session_dates[i]+'<br />';
                }
                $('#session_dates').html(dates_html);
                console.log([num_weeks, session_dates, dates_html]);
            }

            $(document).on('change', '#session_activity_select', function() {
                //update the session_price to match our choice (num*base-price + price-change)
                if ($(this).find(":selected").val() != '' && $('#session_type_select').find(":selected").val() != '') {
                    update_session_price();
                }
            });

            $(document).on('change', '#session_type_select', function() {
                //update the session_price to match our choice (num*base-price + price-change)
                if ($(this).find(":selected").val() != '' && $('#session_activity_select').find(":selected").val() != '') {
                    update_session_price();
                }
            });

            var create_sessioninfo = function(activity_id, activity_name, activity_icon, time, dates, location_id, location_name, location_address, price) {
                var time_num = Number(time[0]);
                var time_side = time[1];
                if (time[1] != 'a' && time[1] != 'p') {
                    time_num = Number(time.substring(0,2));
                    time_side = time[2];
                }
                var times_html = time+' - ';
                if (time_num < 11) {
                    times_html += (time_num+1)+time_side+'m';
                } else if (time_num == 11) {
                    if (time_side == 'a') {
                        times_html += '12pm';
                    } else {
                        times_html += '12pm';
                    }
                } else {
                    times_html += '1'+time_side+'m';
                }

                var dates_html = '';
                for (i in dates) {
                    dates_html += dates[i];
                    if (i%2 == 0 && i < dates.length-1) {
                        dates_html += ', ';
                    } else if (i < dates.length-1) {
                        dates_html += ',<br>';
                    }
                }

                return '<div class="row sessioninfo"><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" name="sessioninfo_activity" data-activity-id="'+activity_id+'"><b>'+activity_name+'</b>'+activity_icon+'</div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><b><span name="sessioninfo_time">'+times_html+'</span></b><br><span name="sessioninfo_dates">'+dates_html+'</span></div><div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" name="sessioninfo_location" data-location-id="'+location_id+'"><b><span name="sessioninfo_location_name">'+location_name+'</span></b><br><span name="sessioninfo_location_address">'+location_address+'</span></div><div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" name="sessioninfo_price">'+price+'</div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" name="sessioninfo_buttons"><span name="remove_session" class="remove_session"><i class="fas fa-times fa-lg"></i></span></div></div>';
            }

            var sessions_updateprice = function() {
                if ($('#sessions_box div div.sessioninfo').length > 0) {
                    var total_price = 0;
                    var price = "";
                    $('#sessions_box div').find('div.sessioninfo').each(function() {
                        price = $(this).find('div[name="sessioninfo_price"]').html();
                        total_price += Number(price.substring(1));
                    });
                    $('#total_price').html('$'+total_price);
                }
            }

            var sessions_clearmodal = function() {
                $('#session_info_daydesc').html('');
                $('#session_location').find('img').attr('src', '');
                $('#session_location').find('div.row').html('');
                $('#session_activity_select').html('<option disabled="" selected="" value="">Activity</option>');
                $('#session_type_select').html('<option disabled="" selected="" value="">Type</option>');
                $('#session_price').html('');
                $('#session_dates').html('');
            }

            $(document).on('click', '#session_add_submit', function(e) {
                e.preventDefault();
                //put the session details in the sessions box (no need to verify yet because this is just for display)
                //note: session_day = session_info[0];

                var num_dates = Number($('#session_type_select').find(":selected").attr('name').substring(5));
                var dates_array = [];
                var i = 0;
                while (i < num_dates && i < 8) {
                    dates_array.push(session_dates[i].substring(0,6)+session_dates[i].substring(8,10));
                    i++;
                }

                $.ajax({
                    method: 'POST',
                    url: '/activity_get_icon',
                    data: 'activity_id='+$('#session_activity_select').find(":selected").data('activity-id'),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        data = JSON.parse(data);
                        if (data['status'] == 'success') {
                            var activity_icon = data['icon'];
                            var html = create_sessioninfo($('#session_activity_select').find(":selected").data('activity-id'), $('#session_activity_select').find(":selected").html(), activity_icon, session_info[2], dates_array, session_info[3], session_info[4], session_info[5], $('#session_price').html());
                            if ($('#sessions_box div div.sessioninfo').length > 0) {
                                $('#sessions_box div').find('div.sessioninfo').last().after(html);
                            } else {
                                $('#sessions_box div').find('div.sessionsummary').before(html);
                            }
                            sessions_updateprice();
                            sessions_clearmodal();
                            $('#session_info_modal').modal('hide');
                            $('#sessions_box').attr('style', '');
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

            $(document).on('click', 'span[name="remove_session"]', function(e) {
                e.preventDefault();
                //remove the session box
                $(this).parent().parent().remove();
                sessions_updateprice();
                //if there are no sessions, hide the whole box
                if ($('#sessions_box div div.sessioninfo').length == 0) {
                    $('#sessions_box').attr('style', 'display:none;');
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
