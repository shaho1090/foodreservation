@extends('master')
@section('title', 'view daysofweek')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>روزهای هفته مربوط به برنامه هفتگی</h3>
            </div>
            @if ($daysofweeks->isEmpty())
                <p> روزهای هفته توسط سیستم ساخته نشده است!</p>
            @else
                <table class="table">
                    <thead>
                    <tr>
                        <th>تاریخ</th>
                        <th>عنوان</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($daysofweeks as $daysofweek)
                        <tr>
                            <td>{!! $daysofweek->date !!}</td>
                            <td>
                                <a href="/foodsofdays/show/{!! $daysofweek->id !!}">{!! $daysofweek->title !!} </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
