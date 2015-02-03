@extends('layouts.master')

{{-- Web site Title --}}
@section('title')
    Result
@stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <h3>
             {{$result->student->name}} Result
        </h3>
    </div>
    <table id="blogs" class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="col-md-2"> Subject </th>
            <th class="col-md-2"> Full Marks </th>
            <th class="col-md-2"> Pass Marks </th>
            <th class="col-md-2"> Marks Obtained </th>
            <th class="col-md-2"> Highest Marks </th>
        </tr>
        </thead>
        <tbody>
        @foreach($marks as $mark)
            <tr>
                <th class="col-md-4">{{{ $mark->subject->name }}}</th>
                <th class="col-md-4">{{{ $mark->subject->full_marks }}}</th>
                <th class="col-md-4">{{{ $mark->subject->pass_marks }}}</th>

                <th class="col-md-4">
                    @if($mark->status==0)
                        Absent
                        @else
                        {{{ $mark->marks_obtained }}}
                            @if($mark->subject->pass_marks > $mark->marks_obtained )
                                *
                            @endif
                        @endif
                </th>
                <th class="col-md-4">{{{ $mark->getHighest() }}}</th>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th class="col-md-6"></th>
            <th class="col-md-4">Total</th>
            <th class="col-md-4">{{{ $result->total_marks }}}</th>
        </tr>
        <tr>
            <th class="col-md-6"></th>
            <th class="col-md-4">Rank</th>
            <th class="col-md-4">{{{ $result->rank }}}</th>
        </tr>
        <tr>
            <th class="col-md-6"></th>
            <th class="col-md-4">Percentage</th>
            <th class="col-md-4">
                @if($result->division=="Failed")
                    -
                @else
                    {{{ $result->percentage }}}%
                    @endif
            </th>
        </tr>
        <tr>
            <th class="col-md-6"></th>
            <th class="col-md-4">Division</th>
            <th class="col-md-4">{{{ $result->division }}}</th>
        </tr>
        </tfoot>
    </table>
@stop
