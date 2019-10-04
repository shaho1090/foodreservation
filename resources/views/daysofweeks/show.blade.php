@extends('master')
@section('title', 'لیست روزهای هفته')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
                <h2 class="header">{!! $daysofweek->title !!}</h2>
                <p> {!! $daysofweek->date !!} </p>
            </div>
            <a href="{!! action('WeeksController@edit',$week->id) !!}" class="btn btn-info">ویرایش</a>
	    <a href="{!! action('ِDaysOfWeekController@edit',$week->id) !!}" class="btn btn-info">تعیین غذا برای هرروز </a>
            <form method="post" action="{!! action('DaysOfWeeksController@show', $week->id) !!}" class="pull-left">
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
 <a href="{!! action('WeeksController@edit',$week->id) !!}" class="btn btn-info">ویرایش</a>