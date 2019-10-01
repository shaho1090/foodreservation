@extends('master')
@section('title', 'نمایش مشخصات غذا')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $food->title !!}</h2>
                <p> <strong>وضعیت</strong>: {!! $food->status ? 'فعال': 'غیرفعال' !!}</p>
                <p> {!! $food->price !!} </p>
            </div>
            <a href="{!! action('FoodsController@edit',$food->slug) !!}" class="btn btn-info">ویرایش</a>
            <form method="post" action="{!! action('FoodsController@destroy', $food->slug) !!}" class="pull-left">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-warning">حذف</button>
                    </div>
                </div>
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
