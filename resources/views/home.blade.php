@extends('layouts.layout')

@section('content')
    <div class="box" style="margin-bottom: 15px;">
        <div class="box-header">
            <h2 class="blue"><i class="fa-fw fa fa-bar-chart-o"></i>Overview Chart</h2>
        </div>
        <div class="box-content">
            <div class="row">
                <div class="col-md-12">
                    <p class="introtext">Stock Overview Chart including monthly sales with product tax and order tax
                        (columns), purchases (line) and current stock value by cost and price (pie). You can save the
                        graph as jpg, png and pdf</p>

                    <div id="ov-chart" style="width:100%; height:450px;"></div>
                    <p class="text-center"></p>
                </div>
            </div>
        </div>
    </div>
@endsection
