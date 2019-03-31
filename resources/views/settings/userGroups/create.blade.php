<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-2x">&times;</i>
            </button>
            <h4 class="modal-title" id="myModalLabel">Add User Group</h4>
        </div>
        <form action="{{url('userGroup')}}" method="post" data-toggle="validator" role="form">
            {{ csrf_field() }}
            <div class="modal-body">
                <p>Please fill in the information below. The field labels marked with * are required input fields.</p>

                <div class="form-group">
                    <label class="control-label" for="name">User</label>
                    <select name="user_id" id="user_id" class="select2 form-control">
                        <option>Select a User</option>
                        @if($users)
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
                <div class="form-group">
                    <label class="control-label" for="phone">Group</label>
                    <select name="group_id" id="group_id" class="select2 form-control">
                        <option>Select a Group</option>
                        @if($groups)
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <input type="submit" name="add_group" value="Add User Group" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/core/modal.js')}}"></script>
