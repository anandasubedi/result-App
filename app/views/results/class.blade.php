@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
    Result
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>
            Class {{$class->grade}} Result
        </h3>
    </div>
    <div class="charts">
        <canvas id="divisionChart" width="400" height="400"></canvas>

    </div>
    <table id="blogs" class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="col-md-2"> Name </th>
                <th class="col-md-2"> Total Marks </th>
                <th class="col-md-2"> Percentage </th>
                <th class="col-md-2"> Division </th>
                <th class="col-md-2"> Result </th>
            </tr>
        </thead>
        <tbody>
        @foreach($results as $result)
            <tr>
                <th class="col-md-4">{{{ $result->student->name }}}</th>
                <th class="col-md-4">{{{ $result->total_marks }}}</th>
                <th class="col-md-4">{{{ $result->percentage }}}</th>
                <th class="col-md-4">{{{ $result->division }}}</th>
                <th class="col-md-2"><a href="{{{ URL::route('results.view',$result->student->id) }}}" class=""> View </a></th>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('scripts')
    <?php
            $counts["First"] =0;
    $counts["Second"] =0;
    $counts["Third"] =0;
    $counts["Distinction"] =0;
    $counts["Failed"] =0;

    foreach($results as $res){
        $counts[$res->division]++;
    }
    ?>
<script>
    var data = [
        {
            value: {{$counts["Distinction"]}},
            color:"#27AE60",
            highlight: "#FF5A5E",
            label: "Distinction"
        },
        {
            value: {{$counts["First"]}},
            color: "#26B99A",
            highlight: "#5AD3D1",
            label: "First"
        },
        {
            value: {{$counts["Second"]}},
            color: "#3498DA",
            highlight: "#FFC870",
            label: "Second"
        },
        {
            value: {{$counts["Third"]}},
            color: "#F1C40F",
            highlight: "#5AD3D1",
            label: "Third"
        },
        {
            value: {{$counts["Failed"]}},
            color: "#E74C3C",
            highlight: "#FFC870",
            label: "Failed"
        }
    ];
    var ctx = document.getElementById("divisionChart").getContext("2d");
    var myNewChart = new Chart(ctx).Pie(data, {
    });

</script>
@stop
