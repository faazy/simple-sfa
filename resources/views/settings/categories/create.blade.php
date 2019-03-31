<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Add Category</h4>
        </div>
        <form action="{{url('categories')}}" method="post" data-toggle="validator" role="form">
            {{ csrf_field() }}
            <div class="modal-body">
                <p>Please fill in the information below. The field labels marked with * are required input fields.</p>

                <div class="form-group">
                    <label class="control-label" for="code">Category Code</label>
                    <input type="text" class="form-control" name="code" id="code" required="required">
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" required="required">

                </div>
                <div class="form-group">
                    <label class="control-label" for="phone">Parent Category</label>
                    <select class="form-control select" id="parent" name="parent"
                            data-placeholder="Select a Parent Category" style="width:100%">
                        <option value=""></option>
                        @foreach ($categories as $pcat)
                            <option value="{{$pcat->id}}">{{$pcat->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" name="add_warehouse" value="Add Category" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/core/modal.js')}}"></script>
