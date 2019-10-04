@extends('master')
@section('title', 'View all foods')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>لیست برنامه های هفتگی </h3>
            </div>
            @if ($weeks->isEmpty())
                <p> برنامه هفتگی موجود نیست!</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>آخرین بروزرسانی</th>
                        <th>عنوان</th>
                        <th>وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($weeks as $week)
                        <tr>
                            <td>{!! $week->updated_at !!}</td>
                            <td>
                                <a href="{!! action('WeeksController@show', $week->id) !!}">{!! $week->title !!} </a>
                            </td>
                            <td>{!! $week->status ? 'فعال' : 'غیرفعال' !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
