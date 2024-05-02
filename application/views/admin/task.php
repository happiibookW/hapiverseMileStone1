<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Add Task</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/favicon.jpg">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/dragula.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-todo.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<body>
    <?php include"topnav.php";?> 
    <?php include"sidenav.php";?>
    <div class="app-content content todo-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-area-wrapper container-xxl p-0">
            <div class="sidebar-left">
                <div class="sidebar">
                    <div class="sidebar-content todo-sidebar">
                        <div class="todo-app-menu">
                            <div class="add-task">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#new-task-modal">
                                    Add Task
                                </button>
                            </div>
                            <div class="sidebar-menu-list">
                                <div class="list-group list-group-filters">
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action active">
                                        <i data-feather="mail" class="font-medium-3 mr-50"></i>
                                        <span class="align-middle"> My Task</span>
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                        <i data-feather="star" class="font-medium-3 mr-50"></i> <span class="align-middle">Important</span>
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                        <i data-feather="check" class="font-medium-3 mr-50"></i> <span class="align-middle">Completed</span>
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                                        <i data-feather="trash" class="font-medium-3 mr-50"></i> <span class="align-middle">Deleted</span>
                                    </a>
                                </div>
                                <div class="mt-3 px-2 d-flex justify-content-between">
                                    <h6 class="section-label mb-1">Tags</h6>
                                    <i data-feather="plus" class="cursor-pointer"></i>
                                </div>
                                <div class="list-group list-group-labels">
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-primary mr-1"></span>Team
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-success mr-1"></span>Low
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-warning mr-1"></span>Medium
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-danger mr-1"></span>High
                                    </a>
                                    <a href="javascript:void(0)" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="bullet bullet-sm bullet-info mr-1"></span>Update
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="content-right">
                <div class="content-wrapper container-xxl p-0">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <div class="body-content-overlay"></div>
                        <div class="todo-app-list">
                            <!-- Todo search starts -->
                            <div class="app-fixed-search d-flex align-items-center">
                                <div class="sidebar-toggle d-block d-lg-none ml-1">
                                    <i data-feather="menu" class="font-medium-5"></i>
                                </div>
                                <div class="d-flex align-content-center justify-content-between w-100">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="todo-search" placeholder="Search task" aria-label="Search..." aria-describedby="todo-search" />
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle hide-arrow mr-1" id="todoActions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i data-feather="more-vertical" class="font-medium-2 text-body"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="todoActions">
                                        <a class="dropdown-item sort-asc" href="javascript:void(0)">Sort A - Z</a>
                                        <a class="dropdown-item sort-desc" href="javascript:void(0)">Sort Z - A</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort Assignee</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort Due Date</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort Today</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort 1 Week</a>
                                        <a class="dropdown-item" href="javascript:void(0)">Sort 1 Month</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Todo search ends -->

                            <!-- Todo List starts -->
                            <div class="todo-task-list-wrapper list-group">
                                <ul class="todo-task-list media-list" id="todo-task-list">
                                    
                                  
                                    <li class="todo-item completed">
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck14" checked />
                                                        <label class="custom-control-label" for="customCheck14"></label>
                                                    </div>
                                                    <span class="todo-title">Test functionality of apps developed by dev team for enhancements.❤️ </span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-danger">High</div>
                                                </div>
                                                <small class="text-nowrap text-muted mr-1">Sept 07</small>
                                                <div class="avatar bg-light-info">
                                                    <div class="avatar-content">VB</div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                   
                                    <li class="todo-item">
                                        <div class="todo-title-wrapper">
                                            <div class="todo-title-area">
                                                <i data-feather="more-vertical" class="drag-icon"></i>
                                                <div class="title-wrapper">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck16" />
                                                        <label class="custom-control-label" for="customCheck16"></label>
                                                    </div>
                                                    <span class="todo-title">Meet Jane and ask for coffee ❤️❤️</span>
                                                </div>
                                            </div>
                                            <div class="todo-item-action">
                                                <div class="badge-wrapper mr-1">
                                                    <div class="badge badge-pill badge-light-info">Update</div>
                                                    <div class="badge badge-pill badge-light-warning">Medium</div>
                                                    <div class="badge badge-pill badge-light-success">Low</div>
                                                </div>
                                                <small class="text-nowrap text-muted mr-1">Aug 10</small>
                                                <div class="avatar">
                                                    <img src="app-assets/images/portrait/small/avatar-s-2.jpg" alt="user-avatar" height="32" width="32" />
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="no-results">
                                    <h5>No Items Found</h5>
                                </div>
                            </div>
                            <!-- Todo List ends -->
                        </div>

                        <!-- Right Sidebar starts -->
                        <div class="modal modal-slide-in sidebar-todo-modal fade" id="new-task-modal">
                            <div class="modal-dialog sidebar-lg">
                                <div class="modal-content p-0">
                                    <form id="form-modal-todo" class="todo-modal needs-validation" novalidate onsubmit="return false">
                                        <div class="modal-header align-items-center mb-1">
                                            <h5 class="modal-title">Add Task</h5>
                                            <div class="todo-item-action d-flex align-items-center justify-content-between ml-auto">
                                                <span class="todo-item-favorite cursor-pointer mr-75"><i data-feather="star" class="font-medium-2"></i></span>
                                                <button type="button" class="close font-large-1 font-weight-normal py-0" data-dismiss="modal" aria-label="Close">
                                                    ×
                                                </button>
                                            </div>
                                        </div>
                                        <div class="modal-body flex-grow-1 pb-sm-0 pb-3">
                                            <div class="action-tags">
                                                <div class="form-group">
                                                    <label for="todoTitleAdd" class="form-label">Title</label>
                                                    <input type="text" id="todoTitleAdd" name="todoTitleAdd" class="new-todo-item-title form-control" placeholder="Title" />
                                                </div>
                                                <div class="form-group position-relative">
                                                    <label for="task-assigned" class="form-label d-block">Assignee</label>
                                                    <select class="select2 form-control" id="task-assigned" name="task-assigned">
                                                        <option data-img="app-assets/images/portrait/small/avatar-s-3.jpg" value="Phill Buffer" selected>
                                                            Phill Buffer
                                                        </option>
                                                        <option data-img="app-assets/images/portrait/small/avatar-s-1.jpg" value="Chandler Bing">
                                                            Chandler Bing
                                                        </option>
                                                        <option data-img="app-assets/images/portrait/small/avatar-s-4.jpg" value="Ross Geller">
                                                            Ross Geller
                                                        </option>
                                                        <option data-img="app-assets/images/portrait/small/avatar-s-6.jpg" value="Monica Geller">
                                                            Monica Geller
                                                        </option>
                                                        <option data-img="app-assets/images/portrait/small/avatar-s-2.jpg" value="Joey Tribbiani">
                                                            Joey Tribbiani
                                                        </option>
                                                        <option data-img="app-assets/images/portrait/small/avatar-s-11.jpg" value="Rachel Green">
                                                            Rachel Green
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="task-due-date" class="form-label">Due Date</label>
                                                    <input type="text" class="form-control task-due-date" id="task-due-date" name="task-due-date" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="task-tag" class="form-label d-block">Tag</label>
                                                    <select class="form-control task-tag" id="task-tag" name="task-tag" multiple="multiple">
                                                        <option value="Team">Team</option>
                                                        <option value="Low">Low</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="High">High</option>
                                                        <option value="Update">Update</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Description</label>
                                                    <div id="task-desc" class="border-bottom-0" data-placeholder="Write Your Description"></div>
                                                    <div class="d-flex justify-content-end desc-toolbar border-top-0">
                                                        <span class="ql-formats mr-0">
                                                            <button class="ql-bold"></button>
                                                            <button class="ql-italic"></button>
                                                            <button class="ql-underline"></button>
                                                            <button class="ql-align"></button>
                                                            <button class="ql-link"></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group my-1">
                                                <button type="submit" class="btn btn-primary d-none add-todo-item mr-1">Add</button>
                                                <button type="button" class="btn btn-outline-secondary add-todo-item d-none" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="button" class="btn btn-primary d-none update-btn update-todo-item mr-1">Update</button>
                                                <button type="button" class="btn btn-outline-danger update-btn d-none" data-dismiss="modal">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Right Sidebar ends -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <?php include "footer.php";?>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/editors/quill/katex.min.js"></script>
    <script src="app-assets/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <script src="app-assets/vendors/js/extensions/dragula.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/app-todo.js"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>