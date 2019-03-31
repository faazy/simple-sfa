@extends('layouts.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2 class="blue"><i
                        class="fa-fw fa fa-barcode"></i> Products (All Warehouses)
            </h2>

            <div class="heading-elements">
                <ul class="list-inline mb-0 btn-tasks">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon fa fa-tasks tip" data-placement="left" title="Actions"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dLabel">
                            <a href="{{url('products/create')}}" class="dropdown-item">
                                <i class="fa fa-plus-circle"></i> Add Product
                            </a>
                            <a href="#" class="dropdown-item" id="sync_quantity" data-action="sync_quantity">
                                <i class="fa fa-arrows-v"></i>Sync Quantity
                            </a>

                            <a href="#" class="dropdown-item" id="excel" data-action="export_excel">
                                <i class="fa fa-file-excel-o"></i> Export to Excel
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="bpo dropdown-item"
                               title="Delete Products"
                               data-content="<p>Are you sure?</p><button type='button' class='btn btn-danger' id='delete' data-action='delete'>Yes I'm sure</a>
                                        <button class='btn bpo-close'>No</button>"
                               data-html="true" data-placement="left">
                                <i class="fa fa-trash-o"></i>Delete Products
                            </a>

                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-lg-12">
                    <p class="introtext">
                        Please use the table below to navigate or filter the results. You can download the table as
                        excel and pdf.
                    </p>
                    {{--Begin Product DataTable--}}
                    <div class="table-responsive">
                        <table id="PRData" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                            <tr class="primary">
                                <th style="min-width:30px; width: 30px; text-align: center;">
                                    <input class="checkbox checkth" type="checkbox" name="check"/>
                                </th>
                                <th style="min-width:40px; width: 40px; text-align: center;">Image</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Alert Quantity</th>
                                <th style="min-width:65px; text-align:center;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($rows->total() > 0)
                                @foreach($rows as $row)
                                    <tr>
                                        <td><input class="checkbox checkth" type="checkbox" name="val[]"/></td>
                                        <td></td>
                                        <td>{{$row->code}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->category_id}}</td>
                                        <td>{{$row->supplier_id}}</td>
                                        <td>{{$row->cost}}</td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->quantity}}</td>
                                        <td></td>
                                        <td>{{$row->alert_quantity}}</td>
                                        <td></td>
                                    </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td colspan="11">
                                        <h5 class="text-center">
                                            <label class="label label-warning">
                                                No Results found!
                                            </label>
                                        </h5>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{--End Product DataTable--}}

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