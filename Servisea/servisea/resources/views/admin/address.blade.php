@extends('admin.admin_master')

@section('admin_head')
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Address Dashboard</title>
    <meta name="description" content="Dashboard for Administrators">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@stop

@section('admin-main-content')

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Insert Address</div>
                        <div class="card-body card-block">
                            <form id="categoryFormCrud" action="{{route('insertCategory')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">

                                        <div class="input-group-addon">ADDRESS ID</div>
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

@stop
