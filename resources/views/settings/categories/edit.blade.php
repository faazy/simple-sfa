<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
        </div>
        <form action="{{route('categories.update', [$data->id])}}" method="post" data-toggle="validator" role="form">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="modal-body">
                <p>Please fill in the information below. The field labels marked with * are required input fields.</p>

                <div class="form-group">
                    <label class="control-label" for="code">Category Code</label>
                    <input type="text" class="form-control" name="code" id="code" required="required"
                           value="{{$data->code}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" required="required"
                           value="{{$data->name}}">

                </div>
                <div class="form-group">
                    <label class="control-label" for="phone">Parent Category</label>
                    <select class="form-control select" data-placeholder="Select a Parent Category" id="parent"
                            name="parent"
                            style="width:100%">
                        <option value=""></option>
                        @foreach ($categories as $pcat)
                            <option value="{{$pcat->id}}"
                                    {{$pcat->id == $data->parent_id ? 'selected' : ''}}>
                                {{$pcat->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" name="add_warehouse" value="Update Category" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/core/modal.js')}}"></script>
