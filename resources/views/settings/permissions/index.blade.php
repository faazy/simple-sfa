@extends('layouts.layout')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="blue"><i class="fa-fw fa fa-building-o"></i>{{ $info['title'] }}</h2>

            <div class="heading-elements">
                <ul class="list-inline mb-0 btn-tasks">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon fa fa-tasks tip" data-placement="left" title="Actions"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dLabel">
                            <a class="dropdown-item" href="{{url('warehouses/create')}}"
                               data-toggle="modal"
                               data-target="#myModal">
                                <i class="fa fa-plus"></i> Add Permission
                            </a>
                            <a class="dropdown-item" href="#" id="excel" data-action="export_excel">
                                <i class="fa fa-file-excel-o"></i> Export_to_excel
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" id="delete" data-action="delete">
                                <i class="fa fa-trash-o"></i> Delete_warehouses
                            </a>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-lg-12">
                    <p class="introtext">Please use the table below to navigate or filter the results. You can download
                        the table as excel and pdf.</p>

                    <div class="table-responsive">
                        <table id="CURData" class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th style="min-width:30px; width: 30px; text-align: center;">
                                    <input class="checkbox checkth" type="checkbox" name="check"/>
                                </th>
                                <th class="col-xs-2">Name</th>
                                <th class="col-xs-2">Permission Code</th>
                                <th class="col-xs-2">Description</th>
                                <th style="width:65px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    <td>
                                        <div class="text-center">
                                            <input class="checkbox multi-select" type="checkbox" name="val[]" value=""/>
                                        </div>
                                    </td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->permission_code}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>
                                        <div class=text-center>
                                            <a href="{{url("permission/{$row->id}/edit")}}" class='tip'
                                               title='Edit Permission'
                                               data-toggle='modal' data-target='#myModal'>
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="tip po" title=""
                                               data-html="true"
                                               data-content="<p>Are you sure?</p>
                                               <a class='btn btn-danger po-delete' href='{{route('permission.destroy',[$row->id])}}'>Yes I'm sure</a>
                                                <button class='btn po-close'>No</button>" rel="popover"
                                               data-original-title="<b>Delete Permission</b>"
                                               aria-describedby="tooltip525736"><i class="fa fa-trash-o"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="table_info" style="margin-top: 20px;">
                                Showing {{($rows->currentPage() * $rows->perPage())-($rows->perPage()-1)}}
                                to {{(($rows->currentPage() * $rows->perPage())>$rows->total())?$rows->total():$rows->currentPage() * $rows->perPage()}}
                                of {{$rows->total()}} entries
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="pull-right">
                                {{ $rows->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script language="javascript">
        //Action methods
        $(document).ready(function () {

            $('#delete').click(function (e) {
                e.preventDefault();
                $('#form_action').val($(this).attr('data-action'));
                $('#action-form-submit').trigger('click');
            });

            $('#excel').click(function (e) {
                e.preventDefault();
                $('#form_action').val($(this).attr('data-action'));
                $('#action-form-submit').trigger('click');
            });

            $('#pdf').click(function (e) {
                e.preventDefault();
                $('#form_action').val($(this).attr('data-action'));
                $('#action-form-submit').trigger('click');
            });

        });
    </script>
@endsection
