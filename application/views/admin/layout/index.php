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
    <title><?php echo $title ?></title>
    <link rel="apple-touch-icon" href="<?php echo base_url('admin/') ?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('admin/favicon.ico') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('admin/') ?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->
    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <?php $this->load->view("admin/layout/topnav"); ?>
    <?php $this->load->view("admin/layout/sidenav"); ?>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
           <?php $this->load->view($subPage); ?>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url('admin/') ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?php echo base_url('admin/') ?>app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url('admin/') ?>app-assets/js/scripts/tables/table-datatables-basic.js"></script>
    <!-- END: Page JS-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
        <script>
              function deletedatamultiple(formId) {
      event.preventDefault(); // prevent form submit
      var form = $("#"+formId); // storing the form
      swal({
          title: "Are you sure?",
          text:"Please Confirm you want to Delete",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#ea5455",
          cancelButtonText: "No",
          confirmButtonText: "Delete",

          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            form.submit(); // submitting the form when user press yes
          } else {
            swal("Cancelled", "Ok NO Operation  will be perfom :)", "error");
          }
        });
    }
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });
        $(".makedatatable").DataTable({
            dom:
        '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
        '<"col-lg-12 col-xl-6" l>' +
        '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1"<"mr-1"f>B>>' +
        '>t' +
        '<"d-flex justify-content-between mx-2 row mb-1"' +
        '<"col-sm-12 col-md-6"i>' +
        '<"col-sm-12 col-md-6"p>' +
        '>',
      language: {
        sLengthMenu: 'Show MENU',
        search: 'Search',
        searchPlaceholder: 'Search..'
      },
      // Buttons with Dropdown
      buttons: [
        {
          text: '<?php echo $addBtnTitle; ?>',
          className: 'add-new btn btn-success mt-50',
          action: function (api, node, config) {
            window.location = '<?php echo base_url($addBtnPath) ?>';
          }
        }
      ]
      
        });
        $("#datatable").DataTable({
         });
          $("#datatable1").DataTable({
         });
          $("#datatable2").DataTable({
         });
           $("#datatable3").DataTable({
         });
           $("#datatable4").DataTable({
         });
         $(document).ready(function(){
	   	var businessDataTable = $('#businessTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
	      	'ajax': {
	          'url':'<?=base_url()?>/admin/Business/businessList',
	          'data': function(data){
	          		data.startDate= $('#startDate').val();
	          		data.endDate= $('#endDate').val();
	          	
	          }
	      	},
	      	'columns': [
	         	{ data: 'businessName' },
	         	{ data: 'ownerName' },
	         	{ data: 'email' },
	         	{ data: 'vatNumber' },
	         	{ data: 'country' },
            { data: 'action' }
	      	]
	   	});
       var userDataTable = $('#userTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
	      	'ajax': {
	          'url':'<?=base_url()?>/admin/User/userList',
	          'data': function(data){
	          		data.startDate= $('#startDate').val();
	          		data.endDate= $('#endDate').val();
	          	
	          }
	      	},
	      	'columns': [
	         	{ data: 'userName' },
	         	{ data: 'email' },
	         	{ data: 'phoneNo' },
	         	{ data: 'country' },
            { data: 'action' }
	      	]
	   	});
       var covidDataTable = $('#covidTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
	      	'ajax': {
	          'url':'<?=base_url()?>/admin/Covid/covidList',
	          'data': function(data){
	          		data.startDate= $('#startDate').val();
	          		data.endDate= $('#endDate').val();
	          	
	          }
	      	},
	      	'columns': [
	         	{ data: 'userName' },
	         	{ data: 'email' },
	         	{ data: 'phoneNo' },
	         	{ data: 'country' },
            { data: 'hospitalName' },
            { data: 'covidStatus' },
            { data: 'action' }
	      	]
	   	});
       var orderDataTable = $('#orderTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
	      	'ajax': {
	          'url':'<?=base_url()?>/admin/Business/orderList',
	          'data': function(data){
	          		data.startDate= $('#startDate').val();
	          		data.endDate= $('#endDate').val();
	          	
	          }
	      	},
	      	'columns': [
	         	{ data: 'orderNo' },
	         	{ data: 'businessName' },
	         	{ data: 'userName' },
	         	{ data: 'productName' },
	         	{ data: 'shippingCost' },
            { data: 'totalAmount' },
            { data: 'orderDate' },
            { data: 'status' },
            { data: 'action' }
	      	]
	   	});
       var orderDataTable = $('#eventTable').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	//'searching': false, // Remove default Search Control
	      	'ajax': {
	          'url':'<?=base_url()?>/admin/Business/eventList',
	          'data': function(data){
	          		data.startDate= $('#startDate').val();
	          		data.endDate= $('#endDate').val();
	          	
	          }
	      	},
	      	'columns': [
	         	{ data: 'eventName' },
	         	{ data: 'businessName' },
	         	{ data: 'eventTime' },
	         	{ data: 'eventDate' },
	         	{ data: 'address' },
            { data: 'status' },
            { data: 'action' }
	      	]
	   	});
	   	// $('#').change(function(){
	   	// 	userDataTable.draw();
	   	// });
	   	// $('#searchName').keyup(function(){
	   	// 	userDataTable.draw();
	   	// });
	});
    </script>
</body>
<!-- END: Body-->

</html>