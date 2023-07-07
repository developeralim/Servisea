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
                                            <th>Title</th>
                                            <th>Date Created</th>
                                            <th>Status</th>
                                            <th>Opened By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($dispute))
                                    @if(!$dispute->isEmpty())
                                        @foreach($dispute as $dis)
                                        <tr>
                                            <td>{{$dis->DISPUTE_ID}}</td>
                                            <td>{{$dis->DISPUTE_TITLE}}</td>
                                            <td>{{$dis->DISPUTE_DATECREATED}}</td>
                                            <td>{{$dis->DISPUTE_STATUS}}</td>
                                            <td><a href="{{route('viewSingleDispute',Crypt::encryptString($dis->USERNAME))}}">{{$dis->USERNAME}}</a></td>
                                            <td><a href="{{route('viewSingleDispute',Crypt::encryptString($dis->DISPUTE_ID))}}">view</a></td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    @endif
                                    </tbody>
                                </table>
                            </div>
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


    @stop

