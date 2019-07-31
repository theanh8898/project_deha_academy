@extends('layouts.index')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="border-head">
                        <h2>Laptop Type</h2>
                    </div>
                    <div>
                        <br/>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <ul>
                                    <li><i class="fa fa-file-text-o"></i> All the current Laptop Type</li>
                                    <a style="padding-top: 14px; " class="add-modal btn btn-link" data-toggle="modal"
                                       data-target="#addModal">Add a Laptop Type</a>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover" id="laptopTypeTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Laptop Type</th>
                                        <th>Actions</th>
                                    </tr>

                                    {{ csrf_field() }}

                                    </thead>
                                    <tbody>
                                    @foreach($laptoptypes as $laptoptype)

                                        <tr class="item{{$laptoptype->id}}">
                                            <td>{{ $laptoptype->id }}</td>
                                            <td>{{ $laptoptype->name_type }}</td>

                                            <td>
                                                <button class="edit-modal btn btn-info" data-id="{{ $laptoptype->id }}"
                                                        data-name_type="{{ $laptoptype->name_type }}"><span
                                                        class="glyphicon glyphicon-eye-open"></span>Edit
                                                </button>
                                                <button class="delete-modal btn btn-danger"
                                                        data-id="{{ $laptoptype->id }}"
                                                        data-name_type="{{ $laptoptype->name_type }}"><span
                                                        class="glyphicon glyphicon-eye-open"></span>Delete
                                                </button>

                                                <form action="listoftype/{{ $laptoptype->id }}" method="get"
                                                      class="navbar-form navbar-left"
                                                      style="margin: 0px;padding: 0px 4px;">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">Show all</button>
                                                    </div>
                                                </form>

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
                                            <label class="control-label col-sm-2" for="name_type">Laptop Type:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name_type_add" autofocus>

                                            </div>
                                        </div>


                                    </form>
                                    <div id="validation-errors-create" class="error"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success add_type"
                                                data-dismiss="modal"><span
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
                                            <label class="control-label col-sm-2" for="name_type">Laptop Type:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name_type_edit" autofocus>
                                            </div>
                                        </div>

                                    </form>
                                    <div id="validation-errors-edit"></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary edit_type" data-dismiss="modal">
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
                                            <label class="control-label col-sm-2" for="name_type">Laptop Type:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name_delete" disabled>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger delete_type" data-dismiss="modal">
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
