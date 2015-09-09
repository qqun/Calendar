@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('calendar::calendar.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('calendar::calendar.names') !!}</small>
@stop

@section('title')
{!! trans('calendar::calendar.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! URL::to('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('calendar::calendar.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='entry-calendar'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="main-list" class="table table-striped table-bordered">
    <thead>
        <th>{!! trans('calendar::calendar.label.location')!!}</th>
<th>{!! trans('calendar::calendar.label.title')!!}</th>
    </thead>
</table>
@stop
@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    $('#entry-calendar').load('{{URL::to('admin/calendar/calendar/0')}}');
    oTable = $('#main-list').dataTable( {
        "ajax": '{{ URL::to('/admin/calendar/calendar/list') }}',
        "columns": [
        { "data": "location" },
{ "data": "title" },],
        "calendarLength": 50
    });

    $('#main-list tbody').on( 'click', 'tr', function () {
        $(this).toggleClass("selected").siblings(".selected").removeClass("selected");

        var d = $('#main-list').DataTable().row( this ).data();

        $('#entry-calendar').load('{{URL::to('admin/calendar/calendar')}}' + '/' + d.id);

    });
});
</script>
@stop

@section('style')
@stop