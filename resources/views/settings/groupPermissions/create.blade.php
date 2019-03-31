
<link href="{{ asset('assets/vendors/jstree/css/style.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/pages/bootstrap-treeview.min.css') }}" rel="stylesheet" type="text/css"/>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Add Group</h4>
        </div>
        <form action="{{url('groupPermission')}}" method="post" data-toggle="validator" role="form">
            {{ csrf_field() }}
            <div class="modal-body">
                <p>Please fill in the information below. The field labels marked with * are required input fields.</p>

                <div class="form-group">
                    <label class="control-label" for="name">Group</label>
                    <select name="group_id" id="group_id" class="select2 form-control">
                        <option>Select a User</option>
                        @if($groups)
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
                <div id="tree-container">

                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" id="save-button" name="add_group" value="Save" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/core/modal.js')}}"></script>

<script src="{{ asset('assets/vendors/jstree/js/jstree.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/bootstrap-treeview.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).on('change', '#group_id', function (e) {

        var dataUrls = '{{url('')}}';
        var data = {id: $(this).val()};
        var post = ajax_post(dataUrls, data, 'POST');
        post.done(function (response) {

            $('#tree-container').jstree("destroy").empty();
            $('#tree-container').jstree({
                "plugins": ["checkbox"],
                'core': {
                    'data': response,
                    "dataType": "json"
                }
            });
        });
    });

    $(document).on('click', '#save-button', function (e) {
        e.preventDefault();
        var checked_ids = [];
        var dataUrls = '{{url('')}}';
        var nodes = $("#container").jstree("get_selected", true);
        $.each(nodes, function (key, value) {
            checked_ids.push(value.id);
        });

        var data = {group_id: $('#group_id').val(), permission_ids: checked_ids};

        ajax_post(dataUrls, data, 'POST').done(resp => {
            //notify(resp.msg,resp.status);


        });

    });
</script>
