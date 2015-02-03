@extends('admin.layouts.default')

@section('content')
    @extends('admin.layouts.default')

    {{-- Web site Title --}}
@section('title')
    Classes
@stop

@section('keywords')Blogs administration @stop
@section('author')Laravel 4 Bootstrap Starter SIte @stop
@section('description')Blogs administration index @stop

{{-- Content --}}
@section('content')
    <div class="page-header">
        <canvas id="classChart" width="400" height="400"></canvas>
        <h3> Application Dashboard </h3>
    </div>
    </table>
@stop

{{-- Scripts --}}

@section('scripts')

@stop