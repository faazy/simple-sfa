<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

{{--Begin Meta contains meta taga, css and fontawesome icons etc--}}
@include('layouts.common.meta')
{{--End of Meta --}}
<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
      class="vertical-layout vertical-menu 2-columns">
<noscript>
    <div class="global-site-notice noscript">
        <div class="notice-inner">
            <p><strong>JavaScript seems to be disabled in your browser.</strong><br>You must have JavaScript enabled in
                your browser to utilize the functionality of this website.</p>
        </div>
    </div>
</noscript>
{{--App Top Header Bar--}}
@include('layouts.common.header')

{{--SideMenu Bar--}}
@include('layouts.common.menu')

{{--Begin Main Contents--}}
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-xs-12 mb-1">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-xs-12">
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 text-xs-right hidden-sm-down">

            </div>

        </div>
        @include('layouts.common.notifications')

        {{--Components Route Outlet Content--}}
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
{{--End Main Contents--}}

{{--App Footer--}}
@include('layouts.common.footer')

@yield('scripts')

</body>
</html>