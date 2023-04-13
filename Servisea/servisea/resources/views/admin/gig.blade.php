@extends('admin.admin_master')
@section('admin-main-content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gigcategory as $i)
                                        <tr>
                                            <td>{{$i->CATEGORY_ID}}</td>
                                            <td>{{$i->CATEGORY_NAME}}</td>
                                            <td>{{$i->CATEGORY_DESCRIPTION}}</td>
                                            <td>
                                            <form action="{{route('editCategory')}}" method="post">
                                            @csrf
                                                <input class="form-control" name="category_ID" value="{{$i->CATEGORY_ID}}" hidden>
                                                <button type="submit">Edit</button>
                                            </form>
                                            </td>
                                            <td>
                                            <form action="{{route('deleteCategory')}}" method="post">
                                            @csrf
                                            <input class="form-control" name="category_ID" value="{{$i->CATEGORY_ID}}" hidden>
                                            <button type="submit">Delete</button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Insert Category</div>
                        <div class="card-body card-block">
                            <form id="categoryFormCrud" action="{{route('insertCategory')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">

                                        <div class="input-group-addon">CATEGORY ID</div>
                                        @if(isset($test))
                                        <input class="form-control" value="{{$test}}" disabled>
                                        @endif
                                        <!--<div class="input-group-addon"><i class="fa fa-user"></i></div>-->

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">CATEGORY NAME</div>
                                        <input name="CATEGORY_NAME" class="form-control">
                                        <!--<div class="input-group-addon"><i class="fa fa-envelope"></i></div>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">CATEGORY DESCRIPTION</div>
                                        <input name="CATEGORY_DESCRIPTION" class="form-control">
                                        <!--<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>-->
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Insert</button>
                                    <button type="submit" style="display:none;" class="btn btn-primary btn-sm">Update</button>
                                    <button type="submit" style="display:none;" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                            </form>
                            @if(isset($dataExist))
                                    <span>{{$dataExist}}</span>
                            @endif
                            @if(isset($td))
                                    <span>delete {{$td}}</span>
                            @endif
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

    </div><!-- /#right-panel -->
    @stop
    <!-- Right Panel -->

    <!-- Scripts -->

    @section('admin-script')
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('backend/ADMIN_ASSET/assets/js/init/datatables-init.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        });

        function chgAction()
        {
            document.getElementById("categoryFormCrud").action = "{{route('updateCategory')}}";
        }

    </script>
    @stop

