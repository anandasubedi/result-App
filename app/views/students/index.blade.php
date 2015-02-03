@extends('layouts.master')

{{-- Web site Title --}}
@section('title')

@stop

@section('keywords')Blogs administration @stop
@section('author')Laravel 4 Bootstrap Starter SIte @stop
@section('description')Blogs administration index @stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>
            Students

            <div class="pull-right">
                <a href="{{{ URL::to('classes.subjects.create',$class) }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
            </div>
        </h3>
    </div>

    <table id="blogs" class="table table-striped table-hover">
        <thead>
        @foreach($students as $student)
            <tr>
                <th class="col-md-4">{{{ $student->name }}}</th>
                <th class="col-md-2"><a href="{{{ URL::route('classes.students.show',[$student->classes->id,$student->id]) }}}" class=""> </a></th>
                <th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>
            </tr>
        @endforeach
        </thead>
        <tbody>
        </tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
@stop