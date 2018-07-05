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

    <style>
        #profile_overlay {
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
        .neat_textarea {
            width:95%;
            margin:2.5%;
            padding:10px;
            border:1px solid #999;
            border-radius:5px;
            font-size:15px;
        }

        .pac-container {
            z-index: 10000 !important;
        }
        #locationField, #controls {
            position: relative;
            width: 480px;
        }
        #autocomplete {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 99%;
        }
        .label {
            text-align: right;
            font-weight: bold;
            width: 100px;
            color: #303030;
        }
        #address {
            border: 1px solid #000090;
            background-color: #f0f0ff;
            width: 480px;
            padding-right: 2px;
        }
        #address td {
            font-size: 10pt;
        }
        .field {
            width: 99%;
        }
        .slimField {
            width: 80px;
        }
        .wideField {
            width: 200px;
        }
        #locationField {
            height: 20px;
            margin-bottom: 2px;
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
                        <figure><img class="img-fluid w-100 u-block-hover__main--zoom-v1" src="{{$picture_name}}"></figure>
                        <!-- Figure Caption -->
                        <figcaption class="u-block-hover__additional--fade g-bg-black-opacity-0_5 g-pa-30">
                            <div class="u-block-hover__additional--fade u-block-hover__additional--fade-up g-flex-middle">
                                <!-- Figure Social Icons -->
                                <ul class="list-inline text-center g-flex-middle-item--bottom g-mb-20">
                                    <li class="list-inline-item align-middle g-mx-7">
                                        <a class="u-icon-v1 u-icon-size--md g-color-white" href="#!">Open</a>
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
                    <br>

                    <!-- Project Progress -->
                    @if($access == 1)
                        <div class="card border-0 rounded-0 g-mb-50">
                            <!-- Panel Body -->
                            <div class="card-block u-info-v1-1 g-height-300 g-pa-0">
                                <!-- Web Design -->
                                <div class="g-mb-20" style="border:1px solid black; border-radius:5px;">
                                    <div class="g-pa-20">
                                        <header class="d-flex g-mb-30">
                                            <i class="fa fa-cog fa-3x align-self-center g-mr-20"></i>
                                            <div class="g-line-height-1 g-mt-7 g-ml-5">
                                                <span style="font-size:25px;">Options</span>
                                            </div>
                                        </header>
                                        <div class="d-flex justify-content-between g-mb-10">
                                            <button id="edit_profilepic_button" class="btn btn-default btn-labeled"><span class="btn-label"><i class="far fa-user-circle"></i></span>&nbsp;&nbsp;Edit Picture</button>
                                        </div>
                                        <div class="d-flex justify-content-between g-mb-10">
                                            <button id="edit_bio_button" class="btn btn-default btn-labeled"><span class="btn-label"><i class="fa fa-align-justify"></i></span>&nbsp;&nbsp;Edit Bio</button>
                                        </div>
                                        <div class="d-flex justify-content-between g-mb-10">
                                            <button id="edit_paymentinfo_button" class="btn btn-default btn-labeled"><span class="btn-label"><i class="fa fa-dollar-sign"></i></span>&nbsp;&nbsp;Edit Payment Details</button>
                                        </div>
                                        <div class="d-flex justify-content-between g-mb-10">
                                            <button id="edit_info_button" class="btn btn-default btn-labeled"><span class="btn-label"><i class="fa fa-info"></i></span>&nbsp;&nbsp;Edit Personal Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Panel Body -->
                        </div>
                    @endif
                    <!-- End Project Progress -->
                </div>
                <!-- End Profile Sidebar -->

                <!-- Profle Content -->
                <div class="col-lg-9">
                    <!-- User Block -->
                    <div class="g-brd-around g-brd-gray-light-v4 g-pa-20 g-mb-30">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- User Details -->
                                <div class="d-flex align-items-center justify-content-sm-between g-mb-5">
                                    <h2 class="g-font-weight-300 g-mr-10">{{$name}}</h2>
                                </div>
                                <!-- End User Details -->
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
                                <p id="user_bio" class="lead g-line-height-1_8">{{$bio}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- End User Block -->
                    <!-- Start Stats Block -->
                    <div class="g-mb-30 g-pl-20 g-pr-20" style="border-radius:10px; background-color:#ff8533;">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 g-pa-20" style="text-align:center;">
                                <header class="d-flex g-mb-30">
                                    <i class="fas fa-walking fa-3x align-self-center g-mr-20" style="color:white;"></i>
                                    <div class="g-line-height-1 g-mt-7 g-ml-5">
                                        <span style="font-size:25px; color:white;">Total Sessions</span>
                                    </div>
                                </header>
                                <span style="font-size:50px; display:inline-block; color:white;"><b>{{$stats['num_sessions']}}</b></span>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 g-pa-20" style="text-align:center;">
                                <header class="d-flex g-mb-30">
                                    <i class="{{$stats['fav_sport']['icon']}} fa-3x align-self-center g-mr-20" style="color:white;"></i> <!-- TODO: IMPLEMENT ACTIVITY ICONS -->
                                    <div class="g-line-height-1 g-mt-7 g-ml-5">
                                        <span style="font-size:25px; color:white;">Favourite Activity</span>
                                    </div>
                                </header>
                                <span style="font-size:25px; display:inline-block; color:white;"><b>{{$stats['fav_sport']['name']}}</b></span>
                            </div>
                            <!-- TODO: DON'T DISPLAY THIS COLUMN IF $stats['fav_trainer']['id'] == 0 -->
                            <div class="col-lg-4 col-md-4 col-sm-4 g-pa-20" style="text-align:center;">
                                <header class="d-flex g-mb-30">
                                    <i class="fas fa-hands-helping fa-3x align-self-center g-mr-20" style="color:white;"></i>
                                    <div class="g-line-height-1 g-mt-7 g-ml-5">
                                        <span style="font-size:25px; color:white;">Favourite Trainer</span>
                                    </div>
                                </header>
                                <a href="/profile/{{$stats['fav_trainer']['id']}}"><span style="font-size:25px; display:inline-block; color:white;"><b>{{$stats['fav_trainer']['name']}}</b></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Stats Block -->
                    <!-- Start Trainers Block -->
                    <div class="g-brd-around g-brd-gray-light-v4 g-mb-40 g-pa-20">
                        <span style="font-size:23px;">Recent Trainers:</span>
                        <br>
                        <div class="row">
                            @foreach($recent_trainers as $i => $t)
                                <!-- TODO: DONT DISPLAY THIS COLUMN IF $t['id'] == 0 -->
                                <div name="trainer_link" data-trainer-id="{{$t['id']}}" class="col-lg-4 col-md-4 col-sm-4 g-brd-r g-brd-gray-light-v4 g-pa-20" style="cursor:pointer;">
                                    <figure><img style="width:100%; border-radius:5px;" src="{{$t['picture']}}"></figure>
                                    <br>
                                    <div class="d-flex justify-content-between g-mb-10 row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding:none !important;">
                                            <span style="font-size:23px;">{{$t['name']}}</span>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="padding:none !important;">
                                            <i class="fas fa-dumbbell fa-2x"></i> <!--TODO: PUT APPROPRIATE ICON HERE FOR $t['primary_sport']['icon'] -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Trainers Block -->
                </div>
                <!-- End Profle Content -->
            </div>
        </div>
    </section>

    <!-- Modals -->
    <div id="edit_bio_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Bio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <textarea id="edit_bio_bio" class="neat_textarea" rows="5"></textarea>
                </div>
                <div class="modal-footer">
                    <button id="edit_bio_submit" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_profilepic_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <span class="btn btn-success fileinput-button">
                        <i class="fa fa-plus"></i>
                        <span>Choose image</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="files[]">
                    </span>
                    <br><br>
                    <div id="progress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <br><br>
                    <div id="files" class="files"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_info_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Personal Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-md-right">E-Mail</label>
                        <div class="col-md-9">
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dob" class="col-md-3 col-form-label text-md-right">D.O.B</label>
                        <div class="col-md-9">
                            <input id="dob" type="text" class="form-control" name="dob" required>
                        </div>
                    </div>

                    <br>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label text-md-right">Address</label>
                        <div class="col-md-9">
                            <div id="locationField" style="margin-bottom:10px;">
                                <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" style="padding-left:5px;"></input>
                            </div>
                            <table id="address">
                                <tr>
                                    <td class="label">Street&nbsp;</td>
                                    <td class="slimField"><input class="field" id="street_number" disabled="true"></input></td>
                                    <td class="wideField" colspan="2"><input class="field" id="route" disabled="true"></input></td>
                                </tr>
                                <tr>
                                    <td class="label">Suburb&nbsp;</td>
                                    <td class="wideField" colspan="3"><input class="field" id="locality" disabled="true"></input></td>
                                </tr>
                                <tr>
                                    <td class="label">State&nbsp;</td>
                                    <td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true"></input></td>
                                    <td class="label">Postcode&nbsp;</td>
                                    <td class="wideField"><input class="field" id="postal_code" disabled="true"></input></td>
                                </tr>
                                <tr>
                                    <td class="label">Country&nbsp;</td>
                                    <td class="wideField" colspan="3"><input class="field" id="country" disabled="true"></input></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="edit_info_submit" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="edit_paymentinfo_modal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Payment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    This will be a secure Stripe form for the user to add/edit/remove their bank account(s) for ActiveBook.
                </div>
                <div class="modal-footer">
                    <button id="edit_paymentinfo_submit" type="button" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- TODO: ADD PAYMENT MODAL AND RESET PASSWORD BUTTON AND MODAL -->
@endsection


  <!-- Page Javascript -->
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
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
        $(document).on('ready', function() {
            @if($access == 1)
                $(document).on('click', '#edit_bio_button', function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: 'POST',
                        url: '/get_user_bio',
                        data: 'user_id={{$user_id}}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data['status'] == 'success') {
                                $('#edit_bio_bio').val(data['bio']);
                                $('#edit_bio_modal').modal('show');
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

                $(document).on('click', '#edit_bio_submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: 'POST',
                        url: '/submit_user_bio',
                        data: 'user_id={{$user_id}}&bio='+$('#edit_bio_bio').val(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data['status'] == 'success') {
                                $('#edit_bio_modal').modal('hide');
                                $('#user_bio').html(data['bio']);
                                swal('', 'Your bio has been successfully updated.', 'success');
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

                $(document).on('click', '#edit_profilepic_button', function(e) {
                    e.preventDefault();
                    $('#edit_profilepic_modal').modal('show');
                });

                $(function () {
                    'use strict';
                    // Change this to the location of your server-side upload handler:
                    var url = '/submit_user_profilepic',
                        uploadButton = $('<button/>')
                            .addClass('btn btn-primary')
                            .prop('disabled', true)
                            .text('Processing...')
                            .on('click', function () {
                                var $this = $(this),
                                    data = $this.data();
                                $this
                                    .off('click')
                                    .text('Abort')
                                    .on('click', function () {
                                        $this.remove();
                                        data.abort();
                                    });
                                data.submit().always(function () {
                                    $this.remove();
                                });
                            });
                    $('#fileupload').fileupload({
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        autoUpload: false,
                        acceptFileTypes: /(\.|\/)(jpe?g|png)$/i,
                        maxFileSize: 3000000,
                        maxNumberOfFiles: 1,
                        // Enable image resizing, except for Android and Opera,
                        // which actually support image resizing, but fail to
                        // send Blob objects via XHR requests:
                        disableImageResize: /Android(?!.*Chrome)|Opera/
                            .test(window.navigator.userAgent),
                        previewMaxWidth: 100,
                        previewMaxHeight: 100,
                        previewCrop: true
                    }).on('fileuploadadd', function (e, data) {
                        if ($('#files').children('div').length > 0) {
                            $('#files').children('div').first().remove();
                        }
                        data.context = $('<div/>').appendTo('#files');
                        $.each(data.files, function (index, file) {
                            var node = $('<p/>')
                                    .append($('<span/>').text(file.name));
                            if (!index) {
                                node
                                    .append('<br>')
                                    .append(uploadButton.clone(true).data(data));
                            }
                            node.appendTo(data.context);
                        });
                    }).on('fileuploadprocessalways', function (e, data) {
                        var index = data.index,
                            file = data.files[index],
                            node = $(data.context.children()[index]);
                        if (file.preview) {
                            node
                                .prepend('<br>')
                                .prepend(file.preview);
                        }
                        if (file.error) {
                            node
                                .append('<br>')
                                .append($('<span class="text-danger"/>').text(file.error));
                        }
                        if (index + 1 === data.files.length) {
                            data.context.find('button')
                                .text('Upload')
                                .prop('disabled', !!data.files.error);
                        }
                    }).on('fileuploadprogressall', function (e, data) {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress .progress-bar').css(
                            'width',
                            progress + '%'
                        );
                    }).on('fileuploaddone', function (e, data) {
                        //tell the user that their profile picture has been updated
                        if (data['result']['status'] == 'success') {
                            $('#edit_profilepic_modal').modal('hide');
                            swal('', 'Your profile picture has been successfully updated.', 'success');
                            setTimeout(function(){ window.location.reload() }, 1500);
                        } else {
                            $('#edit_profilepic_modal').modal('hide');
                            swal('', 'There was an error with uploading your image. Please try again or contact support for assistance.', 'warning');
                        }
                    }).on('fileuploadfail', function (e, data) {
                        $.each(data.files, function (index) {
                            var error = $('<span class="text-danger"/>').text('File upload failed.');
                            $(data.context.children()[index])
                                .append('<br>')
                                .append(error);
                        });
                    }).prop('disabled', !$.support.fileInput)
                        .parent().addClass($.support.fileInput ? undefined : 'disabled');
                });

                var original_email = '';
                var original_dob = '';
                var original_address = '';

                $(document).on('click', '#edit_info_button', function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: 'POST',
                        url: '/get_user_info',
                        data: 'user_id={{$user_id}}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data['status'] == 'success') {
                                $('#edit_info_modal').modal('show');
                                //prefill the modal with the current info
                                //fname, lname, email, address_number, address_streetname, address_suburb, address_postcode, address_state, dob
                                $('#dob').val(data['dob']);
                                original_dob = data['dob'];
                                $('#email').val(data['email']);
                                original_email = data['email'];
                                $('#street_number').val(data['address_number']);
                                $('#route').val(data['address_streetname']);
                                $('#locality').val(data['address_suburb']);
                                $('#administrative_area_level_1').val(data['address_state']);
                                $('#postal_code').val(data['address_postcode']);
                                $('#country').val('Australia');
                                original_address = data['address_number']+' '+data['address_streetname']+' '+data['address_suburb']+' '+data['address_state']+' '+data['address_postcode']+' Australia';
                            } else {
                                swal('', 'There was an error loading your information. Please reload the page and try again.', 'error');
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                });

                $('#dob').datepicker({ dateFormat: 'dd/mm/yy' });

                $(document).on('click', '#edit_info_submit', function(e) {
                    e.preventDefault();
                    if ($('#country').val() != 'Australia') {
                        swal('', 'Please select an address that is in Australia, then try to save again.', 'warning');
                        $('#street_number').val('');
                        $('#route').val('');
                        $('#locality').val('');
                        $('#administrative_area_level_1').val('');
                        $('#postal_code').val('');
                        $('#country').val('Australia');
                    } else {
                        //lets remind the user what details they've changed before proceeding
                        var changes = [false,false,false];
                        var change_msg = 'You have changed your ';
                        if ($('#email').val() != original_email) {
                            changes[0] = true;
                            if (changes[1] == false && changes[2] == false) {
                                change_msg += 'email (which you will need to verify before your original email is replaced).';
                            } else {
                                change_msg += 'email (which you will need to verify before your original email is replaced), ';
                            }
                        }
                        if ($('#dob').val() != original_dob) {
                            changes[1] = true;
                            if (changes[2] == true) {
                                change_msg += 'date of birth, ';
                            } else {
                                if (changes[1] == true) {
                                    changes_msg += 'and ';
                                }
                                change_msg += 'date of birth.';
                            }
                        }
                        if ($('#street_number').val()+' '+$('#route').val()+' '+$('#locality').val()+' '+$('#administrative_area_level_1').val()+' '+$('#postal_code').val()+' Australia' != original_address) {
                            changes[2] = true;
                            if (changes[0] == true || changes[1] == true) {
                                change_msg += 'and address.';
                            } else {
                                change_msg += 'address.';
                            }
                        }

                        if (changes[0] == false && changes[1] == false && changes[2] == false) {
                            swal('', 'You have not made any changes to your personal details.', 'success');
                            $('#edit_info_modal').modal('hide');
                        } else {
                            swal({
                                title: "Are you sure?",
                                text: change_msg,
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Yes, submit my changes",
                                cancelButtonText: "No, undo my changes",
                                closeOnConfirm: false,
                                closeOnCancel: false
                            },
                            function(isConfirm) {
                                if (isConfirm) {
                                    //the user clicked continue
                                    $.ajax({
                                        method: 'POST',
                                        url: '/submit_user_info',
                                        data: 'user_id={{$user_id}}&dob='+$('#dob').val()+'&email='+$('#email').val()+'&address_number='+$('#street_number').val()+'&address_streetname='+$('#route').val()+'&address_suburb='+$('#locality').val()+'&address_state='+$('#administrative_area_level_1').val()+'&address_postcode='+$('#postal_code').val(),
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function(data) {
                                            data = JSON.parse(data);
                                            if (data['status'] == 'success') {
                                                $('#edit_info_modal').modal('hide');
                                                if (changes[0] == true) {
                                                    swal('', 'Your personal details have been updated. Please check your new email to verify it with ActiveBook.', 'success');
                                                } else {
                                                    swal('', 'Your personal details have been updated.', 'success');
                                                }
                                            } else if (data['status'] == 'email_exists') {
                                                var extra_msg = '';
                                                if (data['extra'] == 1) {
                                                    extra_msg = ' However, your other details were updated successfully.';
                                                }
                                                swal('The email you entered already belongs to another user, so please try again with a different email, or contact support if you would like assistance.'+extra_msg);
                                            } else {
                                                swal('', 'There was an error submitting your information. Please reload the page and try again.', 'error');
                                            }
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            console.log(JSON.stringify(jqXHR));
                                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                        }
                                    });
                                } else {
                                    swal('', 'Your changes have not been saved.', 'warning');
                                }
                            });
                        }
                    }
                });

                $(document).on('click', '#edit_paymentinfo_button', function(e) {
                    e.preventDefault();
                    //TODO: GET THE STRIPE FINANCIAL DETAILS OF THIS USER
                    $('#edit_paymentinfo_modal').modal('show');
                })
            @endif

            $(document).on('click', 'div[name="trainer_link"]', function(e) {
                e.preventDefault();
                window.location.href = '/profile/'+$(this).data('trainer-id');
            })
        });

        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                {types: ['geocode']});

            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', fillInAddress);
        }

        function fillInAddress() {
            // Get the place details from the autocomplete object.
            var place = autocomplete.getPlace();

            for (var component in componentForm) {
                document.getElementById(component).value = '';
                document.getElementById(component).disabled = false;
            }

            // Get each component of the address from the place details
            // and fill the corresponding field on the form.
            for (var i = 0; i < place.address_components.length; i++) {
                var addressType = place.address_components[i].types[0];
                if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                }
            }
        }

        // Bias the autocomplete object to the user's geographical location,
        // as supplied by the browser's 'navigator.geolocation' object.
        function geolocate() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var geolocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var circle = new google.maps.Circle({
                        center: geolocation,
                        radius: position.coords.accuracy
                    });
                    autocomplete.setBounds(circle.getBounds());
                });
            }
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{$map_api_key}}&libraries=places&callback=initAutocomplete" async defer></script>
@endsection
