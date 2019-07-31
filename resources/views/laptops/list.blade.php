@extends('layouts.index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                        <h2>Manage Laptops</h2>
                    </div>
                    <div>
                        <br/>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <ul>
                                    <li><i class="fa fa-file-text-o"></i> All the current Laptops</li>
                                    <a style="padding-top: 14px; " class="add-modal btn btn-link" data-toggle="modal"
                                       data-target="#addModal">Add a Laptop</a>
                                    <form action="search" method="post" class="navbar-form navbar-right">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <input type="text" name="keyword" class="form-control" placeholder="Search">
                                            <button type="submit" class="btn btn-dark" style="margin-right: 10px;">
                                                Search
                                            </button>
                                        </div>
                                    </form>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover" id="laptopTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Laptop Type</th>
                                        <th>Chip</th>
                                        <th>VGA</th>
                                        <th>NumberInStock</th>
                                        <th>Actions</th>
                                    </tr>
                                    {{ csrf_field() }}
                                    </thead>
                                    <tbody>
                                    @foreach($laptops as $laptop)
                                        <tr class="item{{$laptop->id}}">
                                            <td>{{ $laptop->id }}</td>
                                            <td>{{ $laptop->name }}</td>
                                            <td>{{ $laptop->LaptopTypes->name_type}}</td>
                                            <td>{{ $laptop->chip }}</td>
                                            <td>{{ $laptop->card }}</td>
                                            <td>{{ $laptop->number }}</td>
                                            <td>
                                                <button class="edit-modal btn btn-info" data-id="{{ $laptop->id }}"
                                                        data-name="{{ $laptop->name }}"
                                                        data-idLaptopType="{{ $laptop->idLaptopType }}"
                                                        data-chip="{{ $laptop->chip }}"
                                                        data-card="{{ $laptop->card }}"
                                                        data-number="{{ $laptop->number }}"><span
                                                        class="glyphicon glyphicon-eye-open"></span>Edit
                                                </button>
                                                <button class="delete-modal btn btn-danger" data-id="{{ $laptop->id }}"
                                                        data-name="{{ $laptop->name }}"
                                                        data-idLaptopType="{{ $laptop->idLaptopType }}"
                                                        data-chip="{{ $laptop->chip }}"
                                                        data-card="{{ $laptop->card }}"
                                                        data-number="{{ $laptop->number }}"><span
                                                        class="glyphicon glyphicon-eye-open"></span>Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.col-md-8 -->
                    <!-- Modal form to add a laptop -->
                    <div id="addModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" style="margin-top:-24px;">
                                        ×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name_add" autofocus>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="laptoptype">Laptop Type:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="laptoptype_add" name="laptoptype">
                                                    @foreach($laptoptype as $laptype)
                                                        <option
                                                            value="{{$laptype->id}}">{{$laptype->name_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="chip">Chip:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="chip_add" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="card">VGA:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="card_add" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="number">Number In Stock:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="number_add" autofocus>
                                            </div>
                                        </div>
                                    </form>
                                    <div id="validation-errors-create" class="error"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success add" data-dismiss="modal"><span
                                                class="glyphicon glyphicon-check"></span> Add
                                        </button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal"><span
                                                class="glyphicon glyphicon-remove"></span> Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal form to edit a form-->
                    <div id="editModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" style="margin-top: -24px;">
                                        ×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="id">ID:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="id_edit" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name_edit" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="laptoptype">Laptop Type:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="laptoptype_edit" name="laptoptype">
                                                    @foreach($laptoptype as $laptype)
                                                        <option value="{{$laptype->id}}"
                                                                id="laptoptype">{{$laptype->name_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="chip">Chip:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="chip_edit" autofocus>
                                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="card">VGA:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="card_edit" autofocus>
                                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="number">Number In Stock:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="number_edit" autofocus>
                                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>
                                    </form>
                                    <div id="validation-errors-edit"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                                            <span class='glyphicon glyphicon-check'></span> Edit
                                        </button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                            <span class='glyphicon glyphicon-remove'></span> Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal forn to delete a form -->
                    <div id="deleteModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"></h4>
                                    <button type="button" class="close" data-dismiss="modal" style="margin-top: -24px;">
                                        ×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h3 class="text-center">Are you sure you want to delete the following laptop?</h3>
                                    <br/>
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="id">ID:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="id_delete" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="name">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name_delete" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="laptoptype">Laptop Type:</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="laptoptype_delete" name="laptoptype">

                                                    @foreach($laptoptype as $laptype)
                                                        <option
                                                            value="{{$laptype->id}}">{{$laptype->name_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="chip">Chip:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="chip_delete" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="number">Number In Stock:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="number_delete" disabled>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                                        </button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                            <span class='glyphicon glyphicon-remove'></span> Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /col-lg-9 END SECTION MIDDLE -->
                <!-- **********************************************************************************************************************************************************
                RIGHT SIDEBAR CONTENT
                *********************************************************************************************************************************************************** -->
                <!-- /col-lg-3 -->
            </div>
            <!-- /row -->
        </section>
    </section>
@endsection
