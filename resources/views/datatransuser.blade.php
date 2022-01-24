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
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>SuperUser</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->is_superuser == 1 ? 'Active' : 'Inactive'}}</td>
                                        <td>
                                            <button class="dropdown-item userupdate_new d-inline" data-id="{{$user->id}}" data-username="{{$user->name}}" data-useremail="{{$user->email}}" data-userpassword="{{$user->password}}" data-is_superuser="{{$user->is_superuser}}">
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
                                        
                                            <button class="dropdown-item d-inline delete_categorydata" data-id="{{$user->id}}">
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
                                        <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="username">User Name</label>
                                            <input type="text" class="form-control dt-full-name" id="username"
                                                placeholder="Username" name="username" aria-label="username"
                                                aria-describedby="username" required/>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input type="email" class="form-control dt-full-name" id="useremail"
                                                placeholder="user@gmail.com" name="useremail" aria-label="useremail"
                                                aria-describedby="useremail" required/>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control dt-full-name" id="userpassword"
                                                placeholder="****" name="userpassword" aria-label="userpassword"
                                                aria-describedby="userpassword" required/>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="is_superuser">Superuser</label>
                                            <select name="is_superuser" class="form-control">
                                                <option value="1">Avtive</option>
                                                <option value="0">Inactive</option>
                                            </select>
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
                                        <h5 class="modal-title">Update Category</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="modal-body flex-grow-1">
                                            <div class="form-group">
                                                <label class="form-label" for="uusername">User Name</label>
                                                <input type="text" class="form-control dt-full-name" id="uusername"
                                                    placeholder="Username" name="uusername" aria-label="uusername"
                                                    aria-describedby="uusername" required/>
                                            </div>
    
                                            <div class="form-group">
                                                <label class="form-label" for="useremail">Email</label>
                                                <input type="email" class="form-control dt-full-name" id="uuseremail"
                                                    placeholder="user@gmail.com" name="uuseremail" aria-label="uuseremail"
                                                    aria-describedby="uuseremail" required/>
                                            </div>
    
                                            <div class="form-group">
                                                <label class="form-label" for="uuserpassword">Password</label>
                                                <input type="password" class="form-control dt-full-name" id="uuserpassword"
                                                    placeholder="****" name="uuserpassword" aria-label="uuserpassword"
                                                    aria-describedby="uuserpassword" required/>
                                            </div>
    
                                            <div class="form-group">
                                                <label class="form-label" for="is_superuser" id="is_superuser">Superuser</label>
                                                <select name="uis_superuser" class="form-control">
                                                    <option value="1">Avtive</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                       
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary mr-1 data-submit update_data_user">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
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
    <script src="{{ URL::asset('vendor/datatrans/js/tables/datatrans-user.js') }}"></script>
    <!-- END: Page JS-->

    <script>
    $(function() {
        
        $(document).on("click", ".userupdate_new", function()  {
            var id = $(this).data('id');
            var url = 'datatrans-user-update/' + ($(this).data('id'));
            $("#uusername").val($(this).data('username'));
            $("#uuseremail").val($(this).data('useremail'));
            $("#uis_superuser").val($(this).data('is_superuser'));
            $('#uuserpassword').val($(this).data('userpassword'));
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
        $(document).on("click", ".delete_categorydata", function(e) {
            var url = 'datatrans-user-delete/' + $(this).data('id');
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