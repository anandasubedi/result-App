@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
    Classes
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>Class {{$class->grade}} Information</h3>
    </div>
        <h2>Subjects</h2>
        <div class="pull-right">
                <a href="{{{ URL::route('classes.subjects.create',$class->id) }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create Subject</a>
            </div>

    <table id="blogs" class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="col-md-2">Subject Name</th>
            <th class="col-md-2">Full Marks</th>
            <th class="col-md-2">Pass Marks</th>
            <th class="col-md-4">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($class->subjects as $subject)
        <tr>
        	<th class="col-md-2">{{{ $subject->name }}}</th>
            <th class="col-md-2">{{{ $subject->full_marks }}}</th>
            <th class="col-md-2">{{{ $subject->pass_marks }}}</th>
            <th class="col-md-4">
                <a class="iframe btn btn-xs btn-default cboxElement" href="{{{ URL::route('classes.subjects.edit',[$class->id,$subject->id]) }}}">Edit</a>
                <a class="iframe btn btn-xs btn-danger cboxElement" href="">Delete</a>
                                            </th>
        </tr>
            @endforeach
        </tbody>
    </table>
     <h2>Students</h2>
        <div class="pull-right">
                <a href="{{{ URL::route('classes.students.create',$class->id) }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create Student</a>
            </div>

    <table id="blogs" class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="col-md-2">Subject Name</th>
            <th class="col-md-2">Roll No</th>
            <th class="col-md-2">Gender</th>
            <th class="col-md-4">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($class->students as $student)
        <tr>
        	<th class="col-md-2">{{{ $student->name }}}</th>
            <th class="col-md-2">{{{ $student->roll_no }}}</th>
            <th class="col-md-2">{{{ $student->gender }}}</th>
            <th class="col-md-4">
                <a class="iframe btn btn-xs btn-default cboxElement" href="{{{ URL::route('classes.students.edit',[$class->id,$student->id]) }}}">Edit</a>
                <a class="iframe btn btn-xs btn-danger cboxElement" href="">Delete</a>
                <a href="{{{ URL::route('results.student',$student->id) }}}" class="iframe btn btn-xs btn-primary cboxElement"> Result</a>
                                            </th>
        </tr>
            @endforeach
        </tbody>
    </table>
@stop

{{-- Scripts --}}

@section('scripts')

@stop