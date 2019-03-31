{{--Quick Access menu--}}
<div class="customizer border-left-blue-grey border-left-lighten-4 hidden-lg-down">
    <a href="javascript:void(0)" class="customizer-close"><i class="ft-x font-large-1"></i></a>
    <a href="javascript:void(0)" class="customizer-toggle bg-danger" data-toggle="tooltip" data-placement="left"
       title="Quick Link">
        <i class="icon-link font-medium-3 fa fa-flash fa-fw white"></i></a>
    <div class="customizer-content p-2">
        <h4 class="text-uppercase mb-0">Quick Links</h4>
        <hr>

        <div class="row">
            <div class="col-md-12 quick-link">

                <div class="col-xs-4">
                    <a href="{{url('products')}}"
                       class="text-xs-center quick-menu bg-gradient-x-primary bg-darken-2 media-left media-middle">
                        <i class="icon-camera font-large-1 white"></i>
                        <span class="white">Products</span>
                    </a>
                </div>


                <div class="col-xs-4">
                    <a href="{{url('customers')}}"
                       class="text-xs-center quick-menu bg-gradient-x-amber bg-darken-2 media-left media-middle">
                        <i class="icon-users font-large-1 white"></i>
                        <span class="white">Customer</span>
                    </a>
                </div>

                <div class="col-xs-4">
                    <a href="{{url('saleRep')}}"
                       class="text-xs-center quick-menu bg-gradient-x-danger bg-darken-2 media-left media-middle">
                        <i class="icon-user font-large-1 white"></i>
                        <span class="white">Sales Rep</span>
                    </a>
                </div>


                <div class="col-xs-4">
                    <a href="{{url('suppliers')}}"
                       class="text-xs-center quick-menu bg-gradient-x-teal bg-darken-2 media-left media-middle">
                        <i class="ft-user font-large-1 white"></i>
                        <span class="white">Suppliers</span>
                    </a>
                </div>


                <div class="col-xs-4">
                    <a href=""
                       class="text-xs-center quick-menu bg-gradient-x-blue bg-darken-2 media-left media-middle">
                        <i class="fa fa-users font-large-1 white"></i>
                        <span class="white">Users</span>
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="{{url('warehouses')}}"
                       class="text-xs-center quick-menu bg-gradient-x-info bg-darken-2 media-left media-middle">
                        <i class="icon-settings font-large-1 white"></i>
                        <span class="white">Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ajaxCall"></div>
<footer class="footer footer-static footer-dark navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-xs-block d-md-inline-block">Copyright &copy; <?= date('Y') ?> <a
                  href="javascript:void(0);" class="text-bold-800 grey darken-2">{{config('app.name')}} </a>, All rights
        reserved. </span>
        <span class="float-md-right d-xs-block d-md-inline-block"></span>
    </p>
</footer>
<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true"></div>
<div class="modal fade in" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
     aria-hidden="true"></div>


{{-- BEGIN APP VENDOR CSS --}}
<link rel="stylesheet" type="text/css" href="{{asset("css/core/colors/palette-climacon.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset("fonts/simple-line-icons/style.min.css")}}">
{{-- END APP VENDOR CSS --}}

{{-- BEGIN APP VENDOR JS --}}
<script src="{{asset("vendors/js/forms/select/select2.full.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/pickers/dateTime/moment-with-locales.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/pickers/dateTime/bootstrap-datetimepicker.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/pickers/daterange/daterangepicker.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/forms/icheck/icheck.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/bootstrapValidator.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/tables/jquery.dataTables.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/tables/datatable/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("vendors/js/extensions/sweetalert.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/extensions/toastr.min.js")}}" type="text/javascript"></script>
<script src="{{asset("datatables/jquery.dataTables.dtFilter.min.js")}}" type="text/javascript"></script>
{{-- END APP VENDOR JS --}}


{{--App Bootstraping Script Data--}}
<script type="text/javascript">
    let dt_lang = '', dp_lang = '',
        site = JSON.parse(`{{$bootstrapData}}`.replace(/&quot;/g, '"'));
    let lang = {};

    $(function () {
        $("body").niceScroll({
            cursorborder: "",
            cursorcolor: "#999",
            background: "rgba(238,238,238,0.7)",
        });

        $(document).on('scroll', function () {
            $("body").getNiceScroll().resize();
        });
    });

    $(document).ready(function () {
        /// Set CSRF code
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>


<!-- BEGIN App JS-->
<script src="{{asset("js/core/app-menu.min.js")}}" type="text/javascript"></script>
<script src="{{asset("js/core/app.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendors/js/jquery-ui.min.js")}}" type="text/javascript"></script>
<script src="{{asset("js/core/core.js")}}" type="text/javascript"></script>
<!-- END App JS-->