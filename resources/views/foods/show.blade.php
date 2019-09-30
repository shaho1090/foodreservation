@extends('master')
@section('title', 'View a ticket')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $food->title !!}</h2>
                <p> <strong>وضعیت</strong>: {!! $food->status ? 'غیرفعال': 'فعال' !!}</p>
                <p> {!! $food->price !!} </p>
            </div>
            <a href="#" class="btn btn-info">ویرایش</a>
            <a href="#" class="btn btn-info">حذف</a>
        </div>
    </div>
@endsection
