<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Supplier</h4>
        </div>
        <form action="{{route('customers.update', [$data->id])}}" method="post" data-toggle="validator" role="form">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal-body">
                <p>Please fill in the information below. The field labels marked with * are required input fields.</p>

                <div class="form-group">
                    <label class="control-label" for="company">Company</label>
                    <input type="text" class="form-control" value="{{$data->company}}" name="company" id="company"
                           required="required">
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Name</label>
                    <input type="text" class="form-control" value="{{$data->name}}" name="name" id="name"
                           required="required">

                </div>
                <div class="form-group">
                    <label class="control-label" for="email">Email Address</label>
                    <input type="text" class="form-control" value="{{$data->email}}" name="email" id="email"
                           required="required">

                </div>
                <div class="form-group">
                    <label class="control-label" for="phone">Phone</label>
                    <input type="text" class="form-control" value="{{$data->phone}}" name="phone" id="phone"
                           required="required">

                </div>
                <div class="form-group">
                    <label class="control-label" for="address">Address</label>
                    <textarea class="form-control" name="address" id="address"
                              required="required"> {{$data->address}}</textarea>

                </div>


            </div>
            <div class="modal-footer">
                <input type="submit" name="add_supplier" value="Update Supplier" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/core/modal.js')}}"></script>
