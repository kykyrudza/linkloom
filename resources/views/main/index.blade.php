@extends('layouts.layout')

@section('title')
    LinkLoom
@endsection

@section('content')

    @if (Auth::check())

    @else
        @include('main.sections.first_section')
        @include('main.sections.second_section')
        @include('main.sections.second_section')
        @include('main.sections.second_section')
        @include('main.sections.second_section')
    @endif

@endsection
