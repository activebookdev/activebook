@extends('layouts.activebook')

@section('style')
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
              <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="{{asset('images/adrian.jpeg')}}">
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
            <img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="{{asset('images/adrian.jpeg')}}">
          </div>

          <!-- Sidebar Navigation -->
          <div class="list-group list-group-border-0 g-mb-40">
            <div class="list-group-item list-group-item-action justify-content-between">
              <!-- <span style="vertical-align:center; font-size:20px;">Starts at: <span style="font-size:30px;">$50/hr</span></span> -->
              <div class="row">
                <div class="col-lg-6 vertically_centered">
                  <p style="vertical-align:center; font-size:20px;">Starts at:</p>
                </div>
                <div class="col-lg-6 vertically_centered">
                  <p style="vertical-align:center; font-size:30px;">$50/hr</p>
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
                      <div class="js-counter g-font-size-30" data-comma-separated="true">2147</div>
                    </div>
                  </header>

                  <div class="d-flex justify-content-between text-uppercase g-mb-25">
                    <div class="g-line-height-1">
                      <h5 class="h6 g-font-weight-600">Last Week</h5>
                      <div class="js-counter g-font-size-16" data-comma-separated="true">12</div>
                    </div>

                    <div class="text-right g-line-height-1">
                      <h5 class="h6 g-font-weight-600">Last Month</h5>
                      <div class="js-counter g-font-size-16" data-comma-separated="true">53</div>
                    </div>
                  </div>

                  <h6 class="g-mb-10">Customer Satisfaction<span class="float-right g-ml-10">72%</span></h6>
                  <div class="js-hr-progress-bar progress g-bg-black-opacity-0_1 rounded-0 g-mb-10">
                    <div class="js-hr-progress-bar-indicator progress-bar g-bg-white u-progress-bar--xs" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small class="g-font-size-12">6% less than last month</small>
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
                  <h2 class="g-font-weight-300 g-mr-10">Fred Smith</h2>
                  <ul class="list-inline mb-0">
                    <li class="list-inline-item g-mx-2">
                      <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-gray-light-v1 g-bg-gray-light-v5 g-color-gray-light-v1--hover rounded-circle" href="#!">
                        <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
                        <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
                      </a>
                    </li>
                    <li class="list-inline-item g-mx-2">
                      <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-gray-light-v1 g-bg-gray-light-v5 g-color-gray-light-v1--hover rounded-circle" href="#!">
                        <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-twitter"></i>
                        <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-twitter"></i>
                      </a>
                    </li>
                    <li class="list-inline-item g-mx-2">
                      <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-gray-light-v1 g-bg-gray-light-v5 g-color-gray-light-v1--hover rounded-circle" href="#!">
                        <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-dribbble"></i>
                        <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-dribbble"></i>
                      </a>
                    </li>
                    <li class="list-inline-item g-mx-2">
                      <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-gray-light-v1 g-bg-gray-light-v5 g-color-gray-light-v1--hover rounded-circle" href="#!">
                        <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-linkedin"></i>
                        <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-linkedin"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <!-- End User Details -->

                <!-- User Position -->
                <h4 class="h6 g-font-weight-300 g-mb-10">
                    <!-- TODO: replace this icon with a placeholder gym logo-->
                    <img src="{{asset('images/gymlogo.jpg')}}" alt="Reviewer" style="border-radius:50%; border:2px solid orange" height="40" width="40">&nbsp;&nbsp;GenericGym
              </h4>
                <!-- End User Position -->

                <!-- User Info -->
                <ul class="list-inline g-font-weight-300">
                  <li class="list-inline-item g-mr-20">
                    <i class="icon-location-pin g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i> 123 Pitt St, Sydney
                  </li>
                  <li class="list-inline-item g-mr-20">
                    <i class="icon-check g-pos-rel g-top-1 g-color-gray-dark-v5 g-mr-5"></i> Verified Trainer
                  </li>
                </ul>
                <!-- End User Info -->

                <hr class="g-brd-gray-light-v4 g-my-20">

                <p class="lead g-line-height-1_8">I'm a fit, young personal trainer who works independently at GenericGym. Give me a chance and I'll motivate you to achieve your fitness dreams. I specialise in weight loss, but am also effective at helping those who are already fit gain muscle. I only want clients who are dedicated to their gym goals.</p>
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
                <div class="trainer_review">
                  <div class="row">
                    <div class="col-lg-3">
                      <img src="{{asset('images/ethan.jpg')}}" alt="Reviewer" style="border-radius:50%;" height="70" width="70">
                    </div>
                    <div class="col-lg-9">
                      <span style="font-size:14px;">"Fred was a great trainer, he helped me gain confidence whilst also being harsh enough to push me towards my weight ..."</span>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="trainer_review">
                  <div class="row">
                    <div class="col-lg-3">
                      <img src="{{asset('images/beth.jpg')}}" alt="Reviewer" style="border-radius:50%;" height="70" width="70">
                    </div>
                    <div class="col-lg-9">
                      <span style="font-size:14px;">"Fred was a terrible trainer, he wasn't nice to me and pushed me way too hard for someone who is just starting out ..."</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div style="text-align:center;">
              <button type="button" class="btn btn-warning">More Reviews</button>
            </div>
          </div>
          <br>
          <!-- Experience Timeline -->
          <div class="card border-0 rounded-0 g-mb-40">
            <!-- Panel Header -->
            <div class="card-header d-flex align-items-center justify-content-between g-bg-gray-light-v5 border-0 g-mb-15">
              <h3 class="h6 mb-0">
                  <i class="icon-briefcase g-pos-rel g-top-1 g-mr-5"></i> Availability
                </h3>
              <div class="dropdown g-mb-10 g-mb-0--md">
                <span class="d-block g-color-primary--hover g-cursor-pointer g-mr-minus-5 g-pa-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-options-vertical g-pos-rel g-top-1"></i>
                  </span>
                <div class="dropdown-menu dropdown-menu-right rounded-0 g-mt-10">
                  <a class="dropdown-item g-px-10" href="#!">
                    <i class="icon-layers g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Projects
                  </a>
                  <a class="dropdown-item g-px-10" href="#!">
                    <i class="icon-wallet g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Wallets
                  </a>
                  <a class="dropdown-item g-px-10" href="#!">
                    <i class="icon-fire g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Reports
                  </a>
                  <a class="dropdown-item g-px-10" href="#!">
                    <i class="icon-settings g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> Users Setting
                  </a>

                  <div class="dropdown-divider"></div>

                  <a class="dropdown-item g-px-10" href="#!">
                    <i class="icon-plus g-font-size-12 g-color-gray-dark-v5 g-mr-5"></i> View More
                  </a>
                </div>
              </div>
            </div>
            <!-- End Panel Header -->

            <!-- Panel Body -->
            <div class="card-block u-info-v1-1">
              <!-- Start Weekly Calendar -->
              <div class="row">
                <div class="col-lg-4">
                  <div class="js-scrollbar g-bg-white-gradient-v1--after g-height-300 g-pa-0">
                    <!-- TODO: INSERT YEAR SELECTOR HERE -->
                    <!--
                    <table class="u-table--v2 bordered_cells table_thinner" style="width:100%;border:1px solid black;">
                      <tr>
                        <th style="border:1px solid black;">Month</th>
                        <th style="border:1px solid black;">Week</th>
                      </tr>
                      <tr class="odd">
                        <td rowspan="5" class="month_cell">Jan</td>
                        <td class="grey_border week_cell">3rd - 9th</td>
                      </tr>
                      <tr class="even">
                        <td class="grey_border week_cell">10th - 16th</td>
                      </tr>
                      <tr class="odd">
                        <td class="grey_border week_cell">17th - 23rd</td>
                      </tr>
                      <tr class="even">
                        <td class="grey_border week_cell">24th - 30th</td>
                      </tr>
                      <tr class="odd">
                        <td class="grey_border week_cell bottom_week_cell">31st - 6th</td>
                      </tr>
                      <tr class="even">
                        <td rowspan="3" class="month_cell">Feb</td>
                        <td class="grey_border week_cell top_week_cell">7th - 13th</td>
                      </tr>
                      <tr class="odd">
                        <td class="grey_border week_cell">14th - 20th</td>
                      </tr>
                      <tr class="even">
                        <td class="grey_border week_cell bottom_week_cell">21st - 27th</td>
                      </tr>
                    </table>
                    -->
                    <table id="week_calendar" class="u-table--v2 table-thin table_centered" style="width:100%;">
                      <tr>
                        <th>Month</th>
                        <th>Week</th>
                      </tr>
                      <tr>
                        <td>Jan</td>
                        <td>
                          <div class="row">
                            <div class="col-lg-2 weeks_box"></div>
                            <div class="col-lg-2 weeks_box"></div>
                            <div class="col-lg-2 weeks_box"></div>
                            <div class="col-lg-2 weeks_box"></div>
                            <div class="col-lg-2 weeks_box"></div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Feb</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>March</td>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="js-scrollbar g-bg-white-gradient-v1--after g-height-300 g-pa-0">
                    <table id="timetable" class="u-table--v2 bordered_cells table_thin" style="width:100%">
                      <tr>
                        <th id="0_0" style="background-color:grey; width:70px;"></th>
                        <th id="1_0">Mon</th>
                        <th id="2_0">Tue</th> 
                        <th id="3_0">Wed</th>
                        <th id="4_0">Thu</th>
                        <th id="5_0">Fri</th> 
                        <th id="6_0">Sat</th>
                        <th id="7_0">Sun</th>
                      </tr>
                      <tr>
                        <td id="0_1" class="hour">9am</td>
                        <td id="1_1" class="inactive"></td>
                        <td id="2_1" class="inactive"></td>
                        <td id="3_1" class="open"></td>
                        <td id="4_1" class="booked"></td> 
                        <td id="5_1" class="inactive"></td>
                        <td id="6_1" class="open"></td>
                        <td id="7_1" class="open"></td>
                      </tr>
                      <tr>
                        <td id="0_2" class="hour">10am</td>
                        <td id="1_2" class="booked"></td> 
                        <td id="2_2" class="open"></td>
                        <td id="3_2" class="booked"></td>
                        <td id="4_2" class="open"></td>
                        <td id="5_2" class="inactive"></td>
                        <td id="6_2" class="open"></td>
                        <td id="7_2" class="inactive"></td>
                      </tr>
                      <tr>
                        <td id="0_3" class="hour">11am</td>
                        <td id="1_3" class="inactive"></td> 
                        <td id="2_3" class="booked"></td>
                        <td id="3_3" class="open"></td>
                        <td id="4_3" class="open"></td> 
                        <td id="5_3" class="open"></td>
                        <td id="6_3" class="inactive"></td>
                        <td id="7_3" class="inactive"></td>
                      </tr>
                      <tr>
                        <td id="0_4" class="hour">12pm</td>
                        <td id="1_4" class="open"></td> 
                        <td id="2_4" class="booked"></td>
                        <td id="3_4" class="booked"></td>
                        <td id="4_4" class="open"></td> 
                        <td id="5_4" class="inactive"></td>
                        <td id="6_4" class="inactive"></td>
                        <td id="7_4" class="open"></td>
                      </tr>
                      <tr>
                        <td>1pm</td>
                        <td></td> 
                        <td></td>
                        <td></td>
                        <td></td> 
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>2pm</td>
                        <td></td> 
                        <td></td>
                        <td></td>
                        <td></td> 
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!-- End Weekly Calendar -->
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
@endsection


  <!-- Page Javascript -->
@section('scripts')
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

        var ctx = document.getElementById("activitychart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Weights", "Fitness", "Cardio"],
                datasets: [{
                    label: '% of Training Type',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
            }
        });

        var update_cost = function() {
          return 0;
        }

        var inactive_flash = function(cell, go) {
          if (go == true) {
            cell.removeClass('inactive-blink');
          } else {
            go = true;
            setTimeout(inactive_flash(cell, go), 100); // check again in a second
          }
        }

        var booked_flash = function(cell, go) {
          if (go == true) {
            cell.removeClass('booked-blink');
          } else {
            go = true;
            setTimeout(booked_flash(cell, go), 100); // check again in a second
          }
        }

        $(document).on('click', '#timetable tr td', function(e) {
          e.preventDefault();
          //mark colour change of the box
          if ($(this).hasClass('inactive')) {
            //make a quick grey flash in the cell
            $(this).addClass('inactive-blink');
            var cell = $(this);
            var go = false;
            setTimeout(function() {
              inactive_flash(cell, go);
            }, 100);
          } else if ($(this).hasClass('booked')) {
            //make a quick red flash in the cell
            $(this).addClass('booked-blink');
            var cell = $(this);
            var go = false;
            setTimeout(function() {
              booked_flash(cell, go);
            }, 100);
          } else if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $(this).addClass('open');

            var id = $(this).attr('id');
            var arr = id.split('_');
            var x = arr[0];
            var y = arr[1];
            $('#'+String(Number(x)-1)+'_'+y).removeClass('selected_right');
            $('#'+x+'_'+String(Number(y)-1)).removeClass('selected_below');

            //update_cost();
          } else if ($(this).hasClass('open_hover') || $(this).hasClass('open')) {
            $(this).removeClass('open_hover');
            $(this).addClass('selected');
            //we need to make the cell to the left have .selected_right and the cell above have .selected_below
            var id = $(this).attr('id');
            var arr = id.split('_');
            var x = arr[0];
            var y = arr[1];
            $('#'+String(Number(x)-1)+'_'+y).addClass('selected_right');
            $('#'+x+'_'+String(Number(y)-1)).addClass('selected_below');
            
            //call an update function to update the cost in the booking button
            //update_cost();
          }
        });

        $("td.open").hover(function (e) {
            e.preventDefault();
            $(this).removeClass('open');
            $(this).addClass('open_hover');
        }, 
        function (e) {
            e.preventDefault();
            $(this).removeClass('open_hover');
            $(this).addClass('open');
        });

        $(document).on('click', "#week_calendar tr td div.row div", function(e) {
          e.preventDefault();
          if ($(this).hasClass('week_hover') || $(this).hasClass('weeks_box')) {
            $('.week_selected').removeClass('week_selected');
            $(this).attr('class', 'col-lg-2 week_selected');

            //call an update function to update the week in the timetable
            //update_week();
          }
        });

        $('div.weeks_box').hover(function (e) {
            e.preventDefault();
            $(this).removeClass('weeks_box');
            $(this).addClass('week_hover');
            console.log('xd');
        }, 
        function (e) {
            e.preventDefault();
            $(this).removeClass('week_hover');
            $(this).addClass('weeks_box');
            console.log('xb');
        });

        $(document).on('click', '#TODO', function(e) {

        });

        $(document).on('click')
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
