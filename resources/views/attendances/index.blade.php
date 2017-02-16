@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="box box-default" id="createBox">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Attendance</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-check"></i> Done!</h4>
                            {{ session('message') }}
                        </div>
                        @endif

                        {{--<div class="alert alert-danger alert-dismissible">--}}
                            {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                            {{--<h4><i class="icon fa fa-ban"></i> Oops!</h4>--}}
                            {{--Something is wrong.--}}
                        {{--</div>--}}

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form" action="/attendances" method="post" id="createAtt">
                            <!-- text input -->
                            {{ csrf_field() }}

                            <?php
                               $warning = "";
                            if ($errors->has('notes')){
                                $warning = "has-warning";
                            }
                            ?>

                            <div class="form-group {{ $warning }}">

                                <input type="hidden" name="user_id" value="1">
                                <input type="hidden" name="day_id" value="1">
                                <input type="hidden" name="timeslot_id" value="1">
                                <input type="hidden" name="studysubmodule_id" value="1">
                                <input type="hidden" name="type_id" value="1">
                                <input type="hidden" name="date" value="{{ date("Y-m-d H:i:s") }}">

                                <label class="control-label" for="notes">
                                    @if ($errors->has('notes'))
                                    <i class="fa fa-bell-o"></i>
                                    @endif
                                    Notes </label>
                                <input type="text" class="form-control" id="notes" placeholder="Note" name="notes" value = "{{old('notes')}}">
                                @foreach ($errors->get('notes') as $message)
                                    <span class="help-block">{{ $message }}</span>
                                @endforeach
                            </div>

                            {{--@if ($errors->has('name'))--}}
                                {{--<div class="form-group has-warning">--}}
                                    {{--<label class="control-label" for="name"><i class="fa fa-bell-o"></i> Name </label>--}}
                                    {{--<input type="text" class="form-control" id="name" placeholder="Name" name="name">--}}
                                    {{--@foreach ($errors->get('name') as $message) {--}}
                                        {{--<span class="help-block">{{ $message }}</span>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--@else--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label" for="name"> Name</label>--}}
                                {{--<input type="text" class="form-control" placeholder="Name" name="name">--}}
                            {{--</div>--}}
                            {{--@endif--}}



                            {{--<input type="submit" value="create"/>--}}

                            <!-- input states -->
                            {{--<div class="form-group has-success">--}}
                                {{--<label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Input with success</label>--}}
                                {{--<input type="text" class="form-control" id="inputSuccess" placeholder="Enter ...">--}}
                                {{--<span class="help-block">Help block with success</span>--}}
                            {{--</div>--}}
                            {{--<div class="form-group has-warning">--}}
                                {{--<label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Input with--}}
                                    {{--warning</label>--}}
                                {{--<input type="text" class="form-control" id="inputWarning" placeholder="Enter ...">--}}
                                {{--<span class="help-block">Help block with warning</span>--}}
                            {{--</div>--}}
                            {{--<div class="form-group has-error">--}}
                                {{--<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with--}}
                                    {{--error</label>--}}
                                {{--<input type="text" class="form-control" id="inputError" placeholder="Enter ...">--}}
                                {{--<span class="help-block">Help block with error</span>--}}
                            {{--</div>--}}

                        </form>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('createAtt').submit();">Create</button>
                    </div>

                </div>

                <div class="box box-default" id="updateBox">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Attendance</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Done!</h4>
                                {{ session('message') }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form role="form" action="/attendances/1" method="post" id="updateAtt">
                            <!-- text input -->
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="PUT">
                            {{--<input type="hidden" name="_action" value="/attendances/1"> Doesn't work - normal--}}

                            <?php
                            $warning = "";
                            if ($errors->has('notes')){
                                $warning = "has-warning";
                            }
                            ?>

                            <div class="form-group {{ $warning }}">



                                <input type="hidden" name="id" value="1">

                                <input type="hidden" name="user_id" value="1">
                                <input type="hidden" name="day_id" value="1">
                                <input type="hidden" name="timeslot_id" value="1">
                                <input type="hidden" name="studysubmodule_id" value="1">
                                <input type="hidden" name="type_id" value="1">
                                <input type="hidden" name="date" value="{{ date("Y-m-d H:i:s") }}">

                                <label class="control-label" for="notes">
                                    @if ($errors->has('notes'))
                                        <i class="fa fa-bell-o"></i>
                                    @endif
                                    Notes </label>
                                <input type="text" class="form-control" id="notes" placeholder="Note" name="notes" value = "{{old('notes')}}">
                                @foreach ($errors->get('notes') as $message)
                                    <span class="help-block">{{ $message }}</span>
                                @endforeach
                            </div>


                        </form>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('updateAtt').submit();">Update</button>
                    </div>

                </div>

                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Attendances</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                        <div class="box-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->id }}</td>
                                        <td>{{ $attendance->notes }}</td>
                                        <td>
                                            <button type="button" name="att{{$attendance->id}}" class="btn btn-info" onclick="changeUpdateForm({{$attendance}})"><i class="fa fa-fw fa-edit"></i></button>
                                            <form action="/attendances/{{$attendance->id}}" method=post>
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></button>
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
    </div>
@endsection

<script>

    window.addEventListener('load', function() {
        document.getElementById("updateBox").style.display = "none";
    }, true);
    //window.document.onload = function (){
      //  console.log('Ei');
     //   document.getElementById("updateBox").style.display = "none";
    //}

    function changeUpdateForm(attendance){
//        console.log(attendance);
        if(document.getElementById("updateBox").style.display == "none"){
            document.getElementById("updateBox").style.display = "block";
            document.getElementById("createBox").style.display = "none";

            var theForm = document.forms['updateAtt'];
//        console.log(theForm.elements["user_id"].value);
            theForm.action = '/attendances/' + attendance.id;
            theForm.elements["user_id"].value = attendance.user_id;
            theForm.elements["day_id"].value = attendance.day_id;
            theForm.elements["timeslot_id"].value = attendance.timeslot_id;
            theForm.elements["studysubmodule_id"].value = attendance.studysubmodule_id;
            theForm.elements["type_id"].value = attendance.type_id;
            theForm.elements["date"].value = attendance.date;
            theForm.elements["notes"].value = attendance.notes;
            theForm.elements["notes"].focus();
//        console.log(theForm.action);
//        console.log(theForm.elements["user_id"].value);

        }else{
            document.getElementById("updateBox").style.display = "none";
            document.getElementById("createBox").style.display = "block";
        }


    }
</script>
