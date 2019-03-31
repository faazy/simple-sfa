<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Warehouse</h4>
        </div>
        <form action="{{route('warehouses.update', [$data->id])}}" method="post" data-toggle="validator" role="form">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal-body">
                <p>Please fill in the information below. The field labels marked with * are required input fields.</p>

                <div class="form-group">
                    <label class="control-label" for="code">Code</label>
                    <input type="text" class="form-control" name="code" id="code" required="required"
                           value="{{$data->code}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required="required"
                           value="{{$data->name}}">

                </div>
                <div class="form-group">
                    <label class="control-label" for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$data->phone}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="address">Address</label>
                    <textarea name="address" cols="40" rows="10" style="height:100px" class="form-control" id="address"
                              required="required" data-bv-field="address">{{$data->address}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="add_warehouse" value="Update Warehouse" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/core/modal.js')}}"></script>
