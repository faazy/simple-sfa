<?php
/**
 * @Author Faazy Ahamed
 * @eMail <faaziahamed@gmail.com>
 * @Mobile +94713221220
 * Date: 01-Nov-17
 * Time: 1:44 PM
 */ ?>
<div data-scroll-to-active="true" class="main-menu menu-static menu-dark menu-accordion">
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
            <li class="nav-item" class="{{\Common\Helpers\ViewHelper::set_active('')}}">
                <a href="{{url('')}}">
                    <i class="ft-home"></i><span data-i18n="" class="menu-title">Dashboard</span>
                </a>
            </li>
            {{-- Begin Products Module --}}
            <li class="nav-item ">
                <a href="#">
                    <i class="fa fa-barcode"></i>
                    <span class="menu-title">Products</span>
                </a>
                <ul class="menu-content">

                    <li id="products_index" class="{{\Common\Helpers\ViewHelper::set_active('products')}}">
                        <a href="{{url('products')}}" class="menu-item">
                            <i class="fa fa-barcode"></i> List Products
                        </a>
                    </li>

                    <li id="products_add" class="{{\Common\Helpers\ViewHelper::set_active('products/create')}}">
                        <a class="menu-item" href="{{url('products/create')}}">
                            <i class="icon-plus"></i>
                            Add Product
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Products Module --}}

            {{-- Begin Registry Module --}}
            <li class="nav-item">
                <a class="menu-item" href="#">
                    <i class="ft-user"></i>
                    <span data-i18n="" class="menu-title">Registry</span>
                </a>
                <ul class="menu-content">
                    <li id="auth_users">
                        <a class="menu-item" href="#">
                            <i class="fa fa-users"></i>List Users
                        </a>
                    </li>
                    <li id="auth_create_user">
                        <a class="menu-item" href="#">
                            <i class="fa fa-user-plus"></i>Add User
                        </a>
                    </li>
                    <li id="sales_rep_index" class="{{\Common\Helpers\ViewHelper::set_active('salesRep')}}">
                        <a class="menu-item" href="{{url('salesRep')}}">
                            <i class="fa fa-users"></i>List Sales Agent
                        </a>
                    </li>
                    <li id="sales_rep_add">
                        <a class="menu-item" href="javascript:void(0)" onclick="ajax_modal(this)"
                           data-url="{{url('salesRep/create')}}" data-toggle="modal"
                           data-target="#myModal">
                            <i class="icon-plus"></i>Add Sales Agent
                        </a>
                    </li>

                    <li id="customers_index" class="{{\Common\Helpers\ViewHelper::set_active('customers')}}">
                        <a class="menu-item" href="{{url('customers')}}">
                            <i class="fa fa-users"></i>List Customers
                        </a>
                    </li>
                    <li id="customers_index">
                        <a class="menu-item" href="javascript:void(0)" onclick="ajax_modal(this)"
                           data-url="{{url('customers/create')}}" data-toggle="modal"
                           data-target="#myModal">
                            <i class="icon-plus"></i>Add Customer
                        </a>
                    </li>

                    <li id="suppliers_index" class="{{\Common\Helpers\ViewHelper::set_active('suppliers')}}">
                        <a class="menu-item" href="{{url('suppliers')}}">
                            <i class="fa fa-users"></i>List Suppliers
                        </a>
                    </li>

                    <li id="suppliers_index">
                        <a class="menu-item" href="javascript:void(0)" onclick="ajax_modal(this)"
                           data-url="{{url('suppliers/create')}}" data-toggle="modal"
                           data-target="#myModal">
                            <i class="icon-plus"></i>Add Supplier
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Registry Module --}}

            {{-- Begin Settings Module --}}
            <li class="nav-item">
                <a class="menu-item" href="#">
                    <i class="icon-settings"></i>
                    <span data-i18n="" class="menu-title">Settings</span>
                </a>
                <ul class="menu-content">


                    <li id="system_settings_categories">
                        <a class="menu-item" href="{{url('categories')}}">
                            <i class="fa fa-folder-open"></i>Categories
                        </a>
                    </li>


                    <li id="system_settings_warehouses">
                        <a class="menu-item" href="{{url('warehouses')}}">
                            <i class="fa fa-building-o"></i>Warehouses
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End Settings Module --}}
        </ul>
    </div>
</div>
