<?php
            $passCounts = [];
            $failCounts = [];
            foreach($classes as $class){
                $class->passed = $class->passed();
                $class->failed = $class->failed();
                $passCounts[$class->id] =  $class->passed;
                $failCounts[$class->id] =  $class->failed;
            }
            $pass_count = json_encode($passCounts);
            $fail_count = json_encode($failCounts);

        ?>
@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
    Results
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>
           Pass and Fail Comparision
        </h3>
        <canvas id="allResultChart" width="1000" height="400"></canvas>
    </div>
    <table id="blogs" class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="col-md-2">Grade</th>
            <th class="col-md-2">Passed</th>
            <th class="col-md-2">Failed</th>
            <th class="col-md-2">Highest </th>
            <th class="col-md-2">Average</th>
            <th class="col-md-4">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
        <tr>
            <th class="col-md-2">{{{ $class->grade }}} </th>
            <th class="col-md-2">{{{ $class->passed }}} </th>
            <th class="col-md-2">{{{ $class->failed }}} </th>
            <th class="col-md-2">{{{ $class->highest() }}} </th>
            <th class="col-md-2">{{{ $class->avg() }}} </th>
            <th class="col-md-4">
                <a class="iframe btn btn-xs btn-default cboxElement" href="{{{ URL::route('results.class',$class->id) }}}">View </a>
                <a class="iframe btn btn-xs btn-primary cboxElement" href="{{{ URL::route('results.calculate',$class->id) }}}"> Calculate </a>
            </th>
        </tr>
            @endforeach
        </tbody>
    </table>
@stop

{{-- Scripts --}}

@section('scripts')
    <script>

        var data = {
            labels: ["One", "Two", "Three", "Four", "Five", "Six", "Seven" , "Eight", "Nine", "Ten"],
            datasets: [
                {
                    label: "Pass",
                    fillColor: "rgba(39,174,96,0.5)",
                    strokeColor: "rgba(39,174,96,0.8)",
                    highlightFill: "rgba(39,174,96,0.75)",
                    highlightStroke: "rgba(39,174,96,1)",
                    data: {{$pass_count}}
                  //  data: [20,23,27,19,17,25,22,26,23,18]
                },
                {
                    label: "Fail",
                    fillColor: "rgba(231,76,60,0.5)",
                    strokeColor: "rgba(231,76,60,0.8)",
                    highlightFill: "rgba(231,76,60,0.75)",
                    highlightStroke: "rgba(231,76,60,1)",
                    data: {{$fail_count}}
                    //data: [6,4,2,5,10,3,6,2,4,9]
                }
            ]
        };

        var ctx = document.getElementById("allResultChart").getContext("2d");
        var myBarChart = new Chart(ctx).Bar(data);

    </script>

@stop