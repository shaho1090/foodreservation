@extends('master')
@section('title', 'Add')
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
                <legend>ثبت غذای جدید</legend>
                <div class="form-group">
                <label for="name" class="col-lg-2 control-label">نام غذا</label>
                <div class="col-lg-8">
                <input type="text" class="form-control" id="title" placeholder="نام غذا را وارد کنید" name="name">
                </div>
                </div>
                <div class="form-group">
                <label for="status" class="col-lg-2 control-label">وضعیت</label>
                <div class="col-lg-8">
                <input type="text" class="form-control" id="content" name="status">
                </div>
                </div>
                <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-default">انصراف</button>
                <button type="submit" class="btn btn-primary">تایید</button>
                </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection