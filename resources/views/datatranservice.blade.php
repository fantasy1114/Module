<!-- BEGIN: Head-->
@include('datatrans::layouts.header')
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: navbar-->
    @include('datatrans::layouts.navbar')
    <!-- END navbar -->

    <!-- BEGIN LAYOUT -->
    @include('datatrans::layouts.layout')
    <!-- END LAYOUT -->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">

                    <!-- list section start -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>title</th>
                                        <th>duration</th>
                                        <th>price</th>
                                        <th>start day</th>
                                        <th>end day</th>
                                        <th>Start from</th>
                                        <th>Finish by</th>
                                        <th>Day of the week</th>
                                        <th>Allow</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{$service->title}}</td>
                                        <td>{{$service->duration_name}}</td>
                                        <td>{{$service->price}}</td>
                                        <td>{{ date('d.m.Y', strtotime(str_replace('/', '-', $service->start_day))) }}</td>
                                        <td>{{ date('d.m.Y', strtotime(str_replace('/', '-', $service->end_day))) }}</td>
                                        <td>{{$service->start_time}}</td>
                                        <td>{{$service->end_time}}</td>
                                        <td>{{$service->sun == 1 ? 'Sun' : ''}} {{$service->mon == 1 ? 'Mon' : ''}} {{$service->tue == 1 ? 'Tue' : ''}} {{$service->wed == 1 ? 'Wed' : ''}} {{$service->thu == 1 ? 'Thu' : ''}} {{$service->fri == 1 ? 'Fri' : '' }} {{$service->sat == 1 ? 'Sat' : ''}}</td>
                                        <td>{{$service->allow}}</td>
                                        <td>
                                            <button class="dropdown-item update_service d-inline" data-id="{{$service->id}}" data-title="{{$service->title}}" data-duration_name="{{$service->duration_name}}" data-price="{{$service->price}}" data-start_day="{{ date('d.m.Y', strtotime(str_replace('/', '-', $service->start_day))) }}" data-end_day="{{ date('d.m.Y', strtotime(str_replace('/', '-', $service->end_day))) }}" data-start_time="{{$service->start_time}}" data-end_time="{{$service->end_time}}" data-sun="{{$service->sun}}" data-mon="{{$service->mon}}" data-tue="{{$service->tue}}" data-wed="{{$service->wed}}" data-thu="{{$service->thu}}" data-sat="{{$service->sat}}" data-fri="{{$service->fri}}" data-allow="{{$service->allow}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-edit-2 mr-50">
                                                    <path
                                                        d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                <span></span>
                                            </button>
                                        
                                            <button class="dropdown-item d-inline delete_service" data-id="{{$service->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-trash mr-50">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                </svg>
                                                <span></span>
                                            </button>
                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                                                       
                                </tbody>
                            </table>
                        </div>
                        <!-- Modal to add new user starts-->
                        <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                <form class="add-new-user modal-content pt-0">
                                    {{csrf_field()}}
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">New Service</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" class="form-control dt-full-name" id="title"
                                                placeholder="Title" name="title" aria-label="title"
                                                aria-describedby="title" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="duration_name">Duration</label>
                                            <input type="text" name="duration_name" class="duration_name_value" hidden>
                                            <select name="duration" class="form-control duration_value" required>
                                                <option value="900">15 min</option>
                                                <option value="1800">30 min</option>
                                                <option value="2700">45 min</option>
                                                <option value="3600">1 hour</option>
                                                <option value="5400">1 hour 30 min</option>
                                                <option value="7200">2 hour</option>
                                                <option value="10800">3 hour</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="price">Price</label>
                                            <input type="number" step="0.01" class="form-control dt-full-name" id="price"
                                                placeholder="10.00" name="price" aria-label="price"
                                                aria-describedby="price" />
                                        </div>
                                        <div class="form-group">
                                            <label for="start_day">Start day</label>
                                            <input type="text" name="start_day" id="start_day" class="form-control flatpickr-basic" placeholder="DD.MM.YYYY" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_day">End day</label>
                                            <input type="text" name="end_day" id="end_day" class="form-control flatpickr-basic" placeholder="DD.MM.YYYY"  required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="start_time">Start Time</label>
                                            
                                            <select class="form-control" id="start_time"  name="start_time" aria-label="start_time" aria-describedby="start_time" required>
                                                <option>Select Time</option>
                                                <option value="00:00:00">00:00:00</option>
                                                <option value="00:30:00">00:30:00</option>
                                                <option value="01:00:00">01:00:00</option>
                                                <option value="01:30:00">01:30:00</option>
                                                <option value="02:00:00">02:00:00</option>
                                                <option value="02:30:00">02:30:00</option>
                                                <option value="03:00:00">03:00:00</option>
                                                <option value="03:30:00">03:30:00</option>
                                                <option value="04:00:00">04:00:00</option>
                                                <option value="04:30:00">04:30:00</option>
                                                <option value="05:00:00">05:00:00</option>
                                                <option value="05:30:00">05:30:00</option>
                                                <option value="06:00:00">06:00:00</option>
                                                <option value="06:30:00">06:30:00</option>
                                                <option value="07:00:00">07:00:00</option>
                                                <option value="07:30:00">07:30:00</option>
                                                <option value="08:00:00">08:00:00</option>
                                                <option value="08:30:00">08:30:00</option>
                                                <option value="09:00:00">09:00:00</option>
                                                <option value="09:30:00">09:30:00</option>
                                                <option value="10:00:00">10:00:00</option>
                                                <option value="10:30:00">10:30:00</option>
                                                <option value="11:00:00">11:00:00</option>
                                                <option value="11:30:00">11:30:00</option>
                                                <option value="12:00:00">12:00:00</option>
                                            </select>
    
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="end_time">End Time</label>
                                            <select class="form-control" id="end_time"  name="end_time" aria-label="end_time" aria-describedby="end_time" required>
                                                <option>Select Time</option>
                                                <option value="12:00:00">12:00:00</option>
                                                <option value="12:30:00">12:30:00</option>
                                                <option value="13:00:00">03:00:00</option>
                                                <option value="13:30:00">13:30:00</option>
                                                <option value="14:00:00">14:30:00</option>
                                                <option value="14:30:00">14:30:00</option>
                                                <option value="15:00:00">15:00:00</option>
                                                <option value="15:30:00">15:30:00</option>
                                                <option value="16:00:00">16:00:00</option>
                                                <option value="16:30:00">16:30:00</option>
                                                <option value="17:00:00">17:00:00</option>
                                                <option value="17:30:00">17:30:00</option>
                                                <option value="18:00:00">18:30:00</option>
                                                <option value="19:30:00">19:00:00</option>
                                                <option value="20:00:00">20:00:00</option>
                                                <option value="20:30:00">20:30:00</option>
                                                <option value="21:00:00">21:00:00</option>
                                                <option value="21:30:00">21:30:00</option>
                                                <option value="22:00:00">22:00:00</option>
                                                <option value="22:30:00">22:30:00</option>
                                                <option value="23:00:00">23:00:00</option>
                                                <option value="23:30:00">23:30:00</option>
                                                <option value="24:00:00">24:00:00</option>
                                            </select>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="sun" name="sun" checked />
                                            <label class="custom-control-label" for="sun">sun</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="mon" name="mon" checked />
                                            <label class="custom-control-label" for="mon">mon</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="tue" name="tue" checked />
                                            <label class="custom-control-label" for="tue">tue</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="wed" name="wed" checked />
                                            <label class="custom-control-label" for="wed">wed</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="thu" name="thu" checked />
                                            <label class="custom-control-label" for="thu">thu</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="fri" name="fri" checked />
                                            <label class="custom-control-label" for="fri">fri</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="sat" name="sat" checked />
                                            <label class="custom-control-label" for="sat">sat</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="allow">Allow</label>
                                            <input type="number" min="1" step="1" class="form-control" id="allow" name="allow" value="1" required/>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to add new user Ends-->

                        <!-- Modal to update new user starts-->
                        <div class="modal modal-slide-in update_user_modal fade" id="modals-slide-in">
                            <div class="modal-dialog">
                                <form class="update-new-user modal-content pt-0">
                                    {{csrf_field()}}
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title">Update Service</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="utitle">Title</label>
                                            <input type="text" class="form-control dt-full-name" id="utitle"
                                                placeholder="Title" name="utitle" aria-label="utitle"
                                                aria-describedby="utitle" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uduration_name">Duration</label>
                                            <input type="text" name="uduration_name" class="uduration_name_value" hidden>
                                            <select name="uduration" class="form-control uduration_value">
                                                <option value="900">15 min</option>
                                                <option value="1800">30 min</option>
                                                <option value="2700">45 min</option>
                                                <option value="3600">1 hour</option>
                                                <option value="5400">1 hour 30 min</option>
                                                <option value="7200">2 hour</option>
                                                <option value="10800">3 hour</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uprice">Price</label>
                                            <input type="number" step="0.01" class="form-control dt-full-name" id="uprice"
                                                placeholder="10.00" name="uprice" aria-label="uprice"
                                                aria-describedby="uprice" />
                                        </div>
                                        <div class="form-group" id="ustart_day">
                                            <label for="ustart_day">Start day</label>
                                            <input type="text" name="ustart_day" class="form-control flatpickr-basic" placeholder="DD.MM.YYYY" required/>
                                        </div>
                                        <div class="form-group" id="uend_day">
                                            <label for="uend_day">End day</label>
                                            <input type="text" name="uend_day" class="form-control flatpickr-basic" placeholder="DD.MM.YYYY"  required/>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="ustart_time">Start Time</label>
                                            
                                            <select class="form-control" id="ustart_time"  name="ustart_time" aria-label="ustart_time" aria-describedby="ustart_time" required>
                                                <option>Select Time</option>
                                                <option value="00:00:00">00:00:00</option>
                                                <option value="00:30:00">00:30:00</option>
                                                <option value="01:00:00">01:00:00</option>
                                                <option value="01:30:00">01:30:00</option>
                                                <option value="02:00:00">02:00:00</option>
                                                <option value="02:30:00">02:30:00</option>
                                                <option value="03:00:00">03:00:00</option>
                                                <option value="03:30:00">03:30:00</option>
                                                <option value="04:00:00">04:00:00</option>
                                                <option value="04:30:00">04:30:00</option>
                                                <option value="05:00:00">05:00:00</option>
                                                <option value="05:30:00">05:30:00</option>
                                                <option value="06:00:00">06:00:00</option>
                                                <option value="06:30:00">06:30:00</option>
                                                <option value="07:00:00">07:00:00</option>
                                                <option value="07:30:00">07:30:00</option>
                                                <option value="08:00:00">08:00:00</option>
                                                <option value="08:30:00">08:30:00</option>
                                                <option value="09:00:00">09:00:00</option>
                                                <option value="09:30:00">09:30:00</option>
                                                <option value="10:00:00">10:00:00</option>
                                                <option value="10:30:00">10:30:00</option>
                                                <option value="11:00:00">11:00:00</option>
                                                <option value="11:30:00">11:30:00</option>
                                                <option value="12:00:00">12:00:00</option>
                                            </select>
    
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uend_time">End Time</label>
                                            <select class="form-control" id="uend_time"  name="uend_time" aria-label="uend_time" aria-describedby="uend_time" required>
                                                <option>Select Time</option>
                                                <option value="12:00:00">12:00:00</option>
                                                <option value="12:30:00">12:30:00</option>
                                                <option value="13:00:00">03:00:00</option>
                                                <option value="13:30:00">13:30:00</option>
                                                <option value="14:00:00">14:30:00</option>
                                                <option value="14:30:00">14:30:00</option>
                                                <option value="15:00:00">15:00:00</option>
                                                <option value="15:30:00">15:30:00</option>
                                                <option value="16:00:00">16:00:00</option>
                                                <option value="16:30:00">16:30:00</option>
                                                <option value="17:00:00">17:00:00</option>
                                                <option value="17:30:00">17:30:00</option>
                                                <option value="18:00:00">18:00:00</option>
                                                <option value="18:30:00">18:30:00</option>
                                                <option value="19:00:00">19:00:00</option>
                                                <option value="19:30:00">19:30:00</option>
                                                <option value="20:00:00">20:00:00</option>
                                                <option value="20:30:00">20:30:00</option>
                                                <option value="21:00:00">21:00:00</option>
                                                <option value="21:30:00">21:30:00</option>
                                                <option value="22:00:00">22:00:00</option>
                                                <option value="22:30:00">22:30:00</option>
                                                <option value="23:00:00">23:00:00</option>
                                                <option value="23:30:00">23:30:00</option>
                                                <option value="24:00:00">24:00:00</option>
                                            </select>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="usun" name="usun" />
                                            <label class="custom-control-label" for="usun">Sun</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="umon" name="umon" />
                                            <label class="custom-control-label" for="umon">Mon</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="utue" name="utue" />
                                            <label class="custom-control-label" for="utue">Tue</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="uwed" name="uwed" />
                                            <label class="custom-control-label" for="uwed">Wed</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="uthu" name="uthu" />
                                            <label class="custom-control-label" for="uthu">Thu</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="ufri" name="ufri" />
                                            <label class="custom-control-label" for="ufri">Fri</label>
                                        </div>
                                        <div class="custom-control custom-control-primary custom-checkbox">
                                            
                                            <input type="checkbox" class="custom-control-input" id="usat" name="usat" />
                                            <label class="custom-control-label" for="usat">Sat</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="uallow">Allow</label>
                                            <input type="number" min="1" step="1" class="form-control" id="uallow" name="uallow" value="1" required/>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to update new user Ends-->
                    </div>
                   
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    
    <!-- BEGIN: Footer-->
    @include('datatrans::layouts.footer')
    <!-- END: Footer-->

    <!-- BEGIN: Page JS-->
    <script src="{{ URL::asset('vendor/datatrans/js/tables/datatrans-service.js') }}"></script>
    <!-- END: Page JS-->

    <script>
    $(function() {
        var duration_name = $('.duration_name_value:text');
        var duration = $('.duration_value option:selected').text();
        
        duration_name.val(duration);
        
        $('.duration_value').change(function(e){
            duration = $('.duration_value option:selected').text();
            duration_name.val(duration);
            console.log(duration);
        });
        var uduration_name = $('.uduration_name_value:text');
        var uduration = $('.uduration_value option:selected').text();
        uduration_name.val(uduration);
        $('.uduration_value').change(function(e){
            uduration = $('.uduration_value option:selected').text();
            uduration_name.val(uduration);
        });
        
        $(document).on("click", ".update_service", function()  {
            console.log($(this).data('start_day'));
            var id = $(this).data('id');
            var url = 'datatrans-service-update/' + ($(this).data('id'));
            $("#utitle").val($(this).data('title'));
            $("#uprice").val($(this).data('price'));
            $("#ustart_day .flatpickr-basic").val($(this).data('start_day'));
            $("#uend_day .flatpickr-basic").val($(this).data('end_day'));
            $("#ustart_time").val($(this).data('start_time'));
            $("#uend_time").val($(this).data('end_time'));
            $("#uallow").val($(this).data('allow'));

            if($(this).data('sun') == 1){
                $("#usun").attr({checked:true});
            }
            if($(this).data('sun') != 1){
                $("#usun").attr({checked:false});
            }
            if($(this).data('mon') == 1){
                $("#umon").attr({checked:true});
            }
            if($(this).data('mon') != 1){
                $("#umon").attr({checked:false});
            }
            if($(this).data('tue') == 1){
                $("#utue").attr({checked:true});
            }
            if($(this).data('tue') != 1){
                $("#utue").attr({checked:false});
            }
            if($(this).data('wed') == 1){
                $("#uwed").attr({checked:true});
            }
            if($(this).data('wed') != 1){
                $("#uwed").attr({checked:false});
            }
            if($(this).data('thu') == 1){
                $("#uthu").attr({checked:true});
            }
            if($(this).data('thu') != 1){
                $("#uthu").attr({checked:false});
            }
            if($(this).data('fri') == 1){
                $("#ufri").attr({checked:true});
            }
            if($(this).data('fri') != 1){
                $("#ufri").attr({checked:false});
            }
            if($(this).data('sat') == 1){
                $("#usat").attr({checked:true});
            }
            if($(this).data('sat') != 1){
                $("#usat").attr({checked:false});
            }
            $(".update_user_modal").modal('show');

            $('.update-new-user').on("submit", function(e) {
                var formData = new FormData(this);
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: url,
                    cache:false,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if(data['success']){
                            window.location.reload();
                        }
                        else{
                            console.log('error');
                        }
                    }
                })
            });
        });
        $(document).on("click", ".delete_service", function(e) {
            var url = 'datatrans-service-delete/' + $(this).data('id');
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: url,
                cache:false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data['success']){
                        window.location.reload();
                    }
                    else{
                        console.log('error');
                    }
                }
            })
        });
    })
   
    </script>
</body>
<!-- END: Body-->

</html>