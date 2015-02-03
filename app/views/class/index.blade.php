@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
    Classes
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>
           All Classes
            <div class="pull-right">
                <a href="{{{ URL::to('classes/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
            </div>
        </h3>
    </div>
    <canvas id="classChart" width="400" height="400"></canvas>
    <table id="blogs" class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="col-md-4">Grade</th>
            <th class="col-md-2">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
        <tr>
            <th class="col-md-4">{{{ $class->grade }}} <a class="iframe btn btn-xs btn-default cboxElement" href="{{{ URL::route('classes.show',$class->id) }}}">View</a></th>
            <th class="col-md-2">
                <a class="iframe btn btn-xs btn-default cboxElement" href="{{{ URL::route('classes.edit',$class->id) }}}">Edit</a>
                <a class="iframe btn btn-xs btn-danger cboxElement" href="{{{ URL::route('classes.destroy',$class->id) }}}">Delete</a>
                                            </th>
        </tr>
            @endforeach
        </tbody>
    </table>
@stop

{{-- Scripts --}}

@section('scripts')
    <script>
        var classData = [];
        @foreach($counts as $count)
            classData.push({{$count}}) ;
        @endforeach
        {{--var ctx = document.getElementById("classChart").getContext("2d");--}}
        {{--var data = {--}}
            {{--labels: ["One", "Two", "Three", "Four", "Five", "Six", "Seven" , "Eight", "Nine", "Ten"],--}}
            {{--dataset: [--}}
                {{--{--}}
                    {{--label: "My First dataset",--}}
                    {{--fillColor: "rgba(220,220,220,0.5)",--}}
                    {{--strokeColor: "rgba(220,220,220,0.8)",--}}
                    {{--highlightFill: "rgba(220,220,220,0.75)",--}}
                    {{--highlightStroke: "rgba(220,220,220,1)",--}}
                    {{--data: classData--}}
                {{--},--}}
                {{--{--}}
                    {{--label: "My Second dataset",--}}
                    {{--fillColor: "rgba(151,187,205,0.5)",--}}
                    {{--strokeColor: "rgba(151,187,205,0.8)",--}}
                    {{--highlightFill: "rgba(151,187,205,0.75)",--}}
                    {{--highlightStroke: "rgba(151,187,205,1)",--}}
                    {{--data: classData--}}
                {{--}--}}
            {{--]--}}
        {{--};--}}

        {{--var myNewChart = new Chart(ctx).Bar(data);--}}

        var data = {
            labels: ["One", "Two", "Three", "Four", "Five", "Six", "Seven" , "Eight", "Nine", "Ten"],
            datasets: [
                {
                    label: "Class Student",
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: classData
                }
            ]
        };

        var ctx = document.getElementById("classChart").getContext("2d");
        var myBarChart = new Chart(ctx).Bar(data);

    </script>

@stop