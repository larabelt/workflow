@extends('belt-core::layouts.admin.main')

@section('heading-title', '')
@section('heading-subtitle', '')
@section('heading-active', '')

@section('main')

    <div id="belt-workflow">
        <router-view></router-view>
    </div>

@stop