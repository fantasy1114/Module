<!-- BEGIN: Head-->
@include('datatrans::layouts.header')
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

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
            <div class="content-body mb-5">
                <!-- users list start -->
                <section class="app-user-list">
                    {{-- @if (Auth::user()->is_superuser != 1) --}}
                    <div class="card">
                        <div class="card-datatable table-responsive pt-0">
                            <table class="data-list-table table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($settings as $setting)
                                    <tr>
                                        <td>{{$setting->end_day}}</td>
                                        <td>{{$setting->start_time}}</td>
                                        <td>{{$setting->end_time}}</td>
                                        <td>{{$setting->payment_enable == 1 ? 'On' : 'Off'}}</td>
                                        <td>
                                            <button class="dropdown-item userupdate_new d-inline" data-id="{{$setting->id}}" data-end_day="{{$setting->end_day}}" data-start_time="{{$setting->start_time}}" data-end_time="{{$setting->end_time}}" data-payment_enable="{{$setting->payment_enable}}">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Setting</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="end_day">Day</label>
                                            <input type="number" min="1" max="366" placeholder="31" class="form-control" id="end_day"  name="end_day" aria-label="end_day" aria-describedby="end_day" required/>
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
                                        <div class="form-group">
                                            <label class="form-label" for="payment_enable">Payment</label>
                                            <select class="form-control" name="payment_enable" id="payment_enable" required>
                                                <option>Payment</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to add new user Ends-->

                        <!-- Modal to update new user starts-->
                        <div class="modal modal-slide-in update_user_modal fade" id="updateModal">
                            <div class="modal-dialog">
                                <form class="modal-content update-new-user pt-0">
                                    {{csrf_field()}}
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="updateModalLabel">Update Setting</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="uend_day">Day</label>
                                            <input type="number" min="1" max="366" placeholder="31" class="form-control" id="uend_day"  name="uend_day" aria-label="uend_day" aria-describedby="uend_day" required/>
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
                                        <div class="form-group">
                                            <label class="form-label" for="upayment_enable">Payment</label>
                                            <select class="form-control" name="upayment_enable" id="upayment_enable" required>
                                                <option>Payment</option>
                                                <option value="1">On</option>
                                                <option value="0">Off</option>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary mr-1 data-submit update_data_user">Submit</button>
                                        <button class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Modal to update new user Ends-->
                    </div>
                    {{-- @endif --}}
                    
                   
                    
                </section>
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
    <script src="{{ URL::asset('vendor/datatrans/js/tables/datatrans-setting.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(function(){
            $(document).on("click", ".userupdate_new", function() {
                var id = $(this).data('id');
                var url = 'datatrans-setting-update/' + id;
                
                $("#uend_day").val($(this).data('end_day'));
                
                $("#ustart_time").val($(this).data('start_time'));
                $("#uend_time").val($(this).data('end_time'));
                $("#upayment_enable").val($(this).data('payment_enable'));
                $(".update_user_modal").modal('show');
                
                $('.update-new-user').submit(function(e){
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
                                
                            }
                        }
                    });
                });            
            });
            
        })        
       
    </script>
</body>
<!-- END: Body-->

</html>