/*=========================================================================================
    File Name: app-user-list.js
    Description: User List page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent

==========================================================================================*/
$(function() {
    'use strict';

    var dtUserTable = $('.data-list-table'),
        newUserSidebar = $('.new-user-modal'),
        newUserForm = $('.add-new-user')

    // Users List datatable
    if (dtUserTable.length) {
        dtUserTable.DataTable({
            columns: [
                // columns according to JSON
                { data: 'service_name' },
                { data: 'category_name' },
                { data: 'timezone_name' },
                { data: 'datatrans_day' },
                { data: 'datatrans_time' },
                { data: 'client_name' },
                { data: 'phone_num' },
                { data: 'client_email' },
                { data: 'client_comment' },
                { data: 'datatrans_payment' },
                { data: 'status' },
                { data: 'action' }
            ],
            columnDefs: [{
                },
                {
                    targets: 0,
                    responsivePriority: 4,
                },
                {
                    targets: 10,
                    responsivePriority: 4,
                }
            ],
            order: [
                [0, 'desc']
            ],
            dom: '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                '<"col-lg-12 col-xl-6" l>' +
                '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
                '>t' +
                '<"d-flex justify-content-between mx-2 row mb-1"' +
                '<"col-sm-12 col-md-6"i>' +
                '<"col-sm-12 col-md-6"p>' +
                '>',
            language: {
                sLengthMenu: 'Show _MENU_',
                search: 'Search',
                searchPlaceholder: 'Search..'
            },
            // Buttons with Dropdown
            buttons: [{
                // text: 'Add New Order',
                // className: 'add-new btn btn-primary mt-50',
                // attr: {
                //     'data-toggle': 'modal',
                //     'data-target': '#modals-slide-in'
                // },
                init: function(api, node, config) {
                    $(node).removeClass('btn-secondary');
                }
            }],
            // For responsive popup
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details of ' + data['service_name'];
                        }
                    }),
                    type: 'column',
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table',
                        columnDefs: [{
                                targets: 0,
                                visible: false
                            }
                        ]
                    })
                }
            },
            language: {
                paginate: {
                    // remove previous & next text from pagination
                    previous: '&nbsp;',
                    next: '&nbsp;'
                }
            }
        });
    }

    // Form Validation
    if (newUserForm.length) {
        newUserForm.validate({
            errorClass: 'error',
            rules: {
                'service_name': {
                    required: true
                }
            }
        });

        newUserForm.on('submit', function(e) {
            var isValid = newUserForm.valid();
            var formData = new FormData(this);
            e.preventDefault();
            if (isValid) {
                $.ajax({
                    type: 'post',
                    url: 'datatrans-order',
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
                newUserSidebar.modal('hide');
            }
        });
    }
    // To initialize tooltip with body container
    $('body').tooltip({
        selector: '[data-toggle="tooltip"]',
        container: 'body'
    });
});