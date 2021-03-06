@extends('master')
@section('title', 'ویرایش لیست غذاها')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <form class="form-horizontal" method="post">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class="alert alert-success">
                    {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                <legend>ویرایش</legend>
                    <div class="form-group">
                        <label for="title" class="col-lg-2 control-label">عنوان برنامه هفتگی</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="title" name="title" value="{!! $week->title !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="updated_at" class="col-lg-2 control-label">آخرین بروزرسانی</label>
                            <div class="col-lg-10">
                               <input type="text" class="form-control" id="updated_at"name="updated_at" value="{!! $week->updated_at !!}">
                            </div>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="status" checked> فعال شدن برنامه هفتگی
                        </label>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" ><a href="/weeks">بازگشت</a></button>
                            <button type="submit" class="btn btn-primary">ثبت تغییرات</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection