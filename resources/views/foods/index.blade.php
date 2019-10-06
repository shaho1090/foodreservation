@extends('master')
@section('title', 'View all foods')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2> لیست غذاها </h2>
            </div>
            @if ($foods->isEmpty())
                <p> هنوز نام غذایی وارد نشده است.</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>عنوان</th>
                        <th>وضعیت</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($foods as $food)
                        <tr>
                            <td>{!! $food->id !!}</td>
                            <td>
                                <a href="{!! action('FoodsController@show', $food->id) !!}">{!! $food->title !!} </a>
                            </td>
                            <td>{!! $food->status ? 'فعال' : 'غیرفعال' !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
