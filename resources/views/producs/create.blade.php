@extends('layouts.layout')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2 class="blue"><i class="fa-fw fa fa-plus"></i>Add Product</h2>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-lg-12">

                    <p class="introtext">Please fill in the information below. The field labels marked with * are
                        required input fields.</p>


                    <form action="{{url('warehouses')}}" method="post" data-toggle="validator" role="form"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-5  col-md-offset-1">
                            <div class="form-group all">
                                <label> Product Name</label>
                                <input name="name" id="name" class="form-control gen_slug" id="name"
                                       required="required">
                            </div>
                            <div class="form-group all">
                                <label> Product Code</label>
                                <div class="input-group">
                                    <input name="name" id="code" class="form-control" id="code"
                                           required="required">
                                    <span class="input-group-addon pointer" id="random_num"
                                          style="padding: 1px 10px;">
                                        <i class="fa fa-random"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group all">
                                <label> Category</label>
                                <select data-placeholder="Selecet a category" id="category" name="category"
                                        style="width:100%" required="required" class="form-control select">
                                    <option value=""></option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group all">
                                <label>Sub Category</label>
                                <div class="controls" id="subcat_data">
                                    <select data-placeholder="Please select category to load" id="subcategory"
                                            name="subcategory" style="width:100%" required="required"
                                            class="form-control select">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <select name="unit" class="form-control tip select" id="unit"
                                        required="required" style="width:100%;">
                                    <option value="" selected="selected">Select Unit</option>
                                    <option value="2">Meter (m)</option>
                                    <option value="3">Piece (pc)</option>
                                    <option value="4">Kilogram (kg)</option>
                                </select>
                            </div>


                            <div class="form-group all">
                                <label for="unit">Product Image</label>

                                <input id="product_image" type="file" data-browse-label="Browse"
                                       name="product_image" data-show-upload="false"
                                       data-show-preview="false" accept="image/*" class="form-control file">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Cost</label> <strong>(Rs.)</strong>
                                <input type="text" name="cost" class="form-control tip"
                                       data-bv-notempty-message="Please enter valid product price"
                                       data-bv-numeric-message="Please enter valid product cost" data-bv-numeric="true"
                                       id="cost" step="any" required="required">
                            </div>
                            <div class="form-group all">
                                <label>Product Price</label> <strong>(Rs.)</strong>
                                <input type="text" name="price"
                                       data-bv-numeric-message="Please enter valid product price"
                                       data-bv-notempty-message="Please enter valid product price"
                                       data-bv-numeric="true"
                                       class="form-control tip" id="price" step="any" required="required">
                            </div>
                            <div class="form-group">
                                <label> Alert Quantity</label>
                                <div class="input-group">
                                    <input type="text" name="alert_quantity" value="" class="form-control tip"
                                           id="alert_quantity" data-original-title="" title="">
                                    <span class="input-group-addon">
                                        <input type="checkbox" name="track_quantity" id="track_quantity" value="1"
                                               checked="checked">
                                    </span>
                                </div>
                            </div>

                            {{--Initial Warehouse Stock--}}
                            <div class="">
                                <strong>Warehouse Quantity</strong><br>
                                @if (!empty($warehouses))

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="well">
                                                @foreach ($warehouses as $warehouse)
                                                    <div class="col-md-6 col-sm-6 col-xs-6"
                                                         style="padding-bottom:15px;">
                                                        {{$warehouse->name }}
                                                        <div class="form-group">
                                                            <input type="hidden" name="wh_{{$warehouse->id}}"
                                                                   value="{{$warehouse->id}}">
                                                            <input type="text" name="wh_qty_{{$warehouse->id}}" value=""
                                                                   class="form-control" id="wh_qty_{{$warehouse->id}}"
                                                                   placeholder="Quantity">
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                            </div>

                            <div class="clearfix"></div>

                            {{--Supplier--}}
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Supplier</label>
                                </div>
                                <div class="row" id="supplier-con">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <select class="form-control tip select" id="supplier" name="supplier"
                                                    style="width:100%;">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="ex-suppliers"></div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="add_product">
                                    Add Product
                                </button>

                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            let items = {};

            $('.gen_slug').change(function (e) {
                getSlug($(this).val(), 'products');
            });
            if ($('#subcategory').data('select2')) {
                $("#subcategory").select2("destroy").empty()
                    .attr("placeholder", "Please select category to load")
                    .select2({
                        placeholder: "Please select category to load", minimumResultsForSearch: 7, data: [
                            {id: '', text: 'Please select category to load'}
                        ]
                    });
            }
            //Fetch all sub categories which under parent
            $('#category').change(function () {
                let v = $(this).val();
                $('#modal-loading').show();

                if (v) {
                    $.ajax({
                        type: "get",
                        async: false,
                        url: "{{url("products/getSubCategories")}}/" + v,
                        success: function (scdata) {
                            if (scdata != '' && scdata != null) {
                                scdata = JSON.parse(scdata);
                                scdata.push({id: '', text: 'Please select sub category'});

                                if ($('#subcategory').data('select2')) {
                                    $("#subcategory").select2("destroy").empty()
                                        .attr("data-placeholder", "Please select sub category")
                                        .select2({
                                            placeholder: "Please select category to load",
                                            minimumResultsForSearch: 7,
                                            data: scdata
                                        });
                                    $('#subcategory').val("Please select sub category").trigger('change');
                                    $('#select2-subcategory-container>span').text("Please select sub category");
                                }
                            } else {
                                if ($('#subcategory').data('select2')) {
                                    $("#subcategory").select2("destroy")
                                        .empty().attr("placeholder", "Category do not have sub category")
                                        .select2({
                                            placeholder: "Category do not have sub category",
                                            minimumResultsForSearch: 7,
                                            data: [{id: '', text: 'Category do not have sub category'}]
                                        });
                                    $('#subcategory').val("Category do not have sub category").trigger('change');
                                    $('#select2-subcategory-container>span').text("Category do not have sub category");
                                }
                            }
                        },
                        error: function () {
                            addAlert('Ajax error occurred, Please tray again.', 'error');
                            $('#modal-loading').hide();
                        }
                    });
                } else {
                    if ($('#subcategory').data('select2')) {
                        $("#subcategory").select2("destroy")
                            .empty().attr("placeholder", "Please select category to load")
                            .select2({
                                placeholder: "Please select category to load",
                                minimumResultsForSearch: 7,
                                data: [{id: '', text: 'Please select category to load'}]
                            });
                    }
                }
                $('#modal-loading').hide();
            });

            //Prevent enter key pressing
            $('#code').bind('keypress', function (e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                    return false;
                }
            });


            //Calcuate Base unit price
            function calculate_price() {
                let rows = $('#prTable').children('tbody').children('tr');
                let pp = 0;
                $.each(rows, function () {
                    pp += formatDecimal(parseFloat($(this).find('.rprice').val()) * parseFloat($(this).find('.rquantity').val()));
                });
                $('#price').val(pp);
                return true;
            }

            $(document).on('change', '.rquantity, .rprice', function () {
                calculate_price();
            });

            $(document).on('click', '.del', function () {
                let id = $(this).attr('id');
                delete items[id];
                $(this).closest('#row_' + id).remove();
                calculate_price();
            });
            let su = 2;
            $('#addSupplier').click(function () {
                if (su <= 5) {
                    $('#supplier_1').select2('destroy');
                    var html = '<div style="clear:both;height:5px;"></div><div class="row"><div class="col-xs-12"><div class="form-group"><select name="supplier_' + su + '", class="form-control" id="supplier_' + su + '"  data-placeholder="Selecet supplier" style="width:100%;display: block !important;" /></select></div></div></div></div>';
                    $('#ex-suppliers').append(html);
                    var sup = $('#supplier_' + su);
                    suppliers(sup);
                    su++;
                } else {
                    addAlert('Max allowed reached', 'warning');
                    return false;
                }
            });


            $("input#images").on('change.bs.fileinput', function () {
                var ele = document.getElementById($(this).attr('id'));
                var result = ele.files;
                $('#img-details').empty();
                for (var x = 0; x < result.length; x++) {
                    var fle = result[x];
                    for (var i = 0; i <= result.length; i++) {
                        var img = new Image();
                        img.onload = (function (value) {
                            return function () {
                                ctx[value].drawImage(result[value], 0, 0);
                            }
                        })(i);
                        img.src = 'images/' + result[i];
                    }
                }
            });


            $('#aModal').on('shown.bs.modal', function () {
                $('#aquantity').focus();
                $(this).keypress(function (e) {
                    if (e.which == 13) {
                        $('#updateAttr').click();
                    }
                });
            });

        });

    </script>
@endsection