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
                <legend>تعریف غذا برای هر روز </legend>
                <div class="form-group">
                <label for="title" class="col-lg-2 control-label">عنوان هفته</label>
                <div class="col-lg-8">
                <input type="text" class="form-control" id="title" placeholder="عنوان هفته را وارد کنید" name="title">
                </div>
                </div>
                <div class="form-group">
                <label for="status" class="col-lg-2 control-label">وضعیت</label>
                <div class="col-lg-8">
                <input type="text" class="form-control" id="price" name="price">
                </div>
                </div>
                <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-default" ><a href="/home">انصراف</a></button>
                <button type="submit" class="btn btn-primary">تایید</button>
                </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection