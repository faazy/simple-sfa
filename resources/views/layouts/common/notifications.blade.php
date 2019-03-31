@if ($message = Session::get('success'))
    <div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Well done!</strong> {{$message}}
    </div>
@endif
@if ($error = Session::get('error'))
    <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Oh snap!</strong> {{$error}}
    </div>
@endif
@if ($warning = Session::get('warning'))
    <div class="alert bg-warning alert-icon-right alert-arrow-right alert-dismissible fade in mb-2"
         role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Warning!</strong> {{$warning}}
    </div>
@endif

@if ($errors->any())
    <div class="alert bg-danger alert-icon-left alert-arrow-left alert-dismissible fade in mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Oh snap!</strong> {{$errors->first()}}
    </div>
@endif