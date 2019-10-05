@extends('master')
@section('title', 'تعریف غذا برای هرروز')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
            <div class="panel-heading">
                <h2 name="title">  
                    @foreach($daystitle as $key)
                        {!! $key->title !!}
                    @endforeach
                </h2>
            </div>
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('status'))
                <div class="alert alert-success">
                {{ session('status') }}
                </div>
            @endif
           <div>
            <form method="post" action="/foodsofdays/add"> 
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div style="width: 220px; float:right; height:250px; margin:5px; background:lightgray;">
                <div style="padding:20px;">
                    <p>لیست غذاهای موجود</p>
                    <select id="source"  class="form-control"  size="7" name="selectedfood">
                       @foreach($foods as $food)
                            <option value="{!! $food->id !!} ">
                               {!! $food->title !!} 
                            </option>
                        @endforeach
                    </select><p><input type="hidden" value="{!! $id !!}" name="day_id"></p>
                    <button  type="submit" class="btn btn-default btn-block" name="addfood" >اضافه کردن</button>
                </div>
            </div>
            </form>
              <div style="width: 100px; float:right; height:250px; background:lightgray; margin:4px;">
                <div style="padding-top:80px; padding-left:5px; padding-right:5px;">
                    
                </div>
              </div>
            <form method="post" action="/foodsofdays/destroy">  
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div style="width: 220px; float:right; height:250px; margin:5px; background:lightgray;">
                  <div style="padding:20px;">
                    <p>لیست غذاهای رزرو شده برای امروز</p>
                    <select  id="target" class="form-control" size="7" name="for_destroy_id" >
                        @if ($selectedfoods)
                            @foreach($selectedfoods as $key=>$selectedfood)
                                <option value="{!! $key !!}">
                                {!! $selectedfood !!} 
                                </option>
                            @endforeach 
                        @endif
                    </select><p><input type="hidden" value="{!! $id !!}" name="day_id"></p>
                   <button  type="submit" class="btn btn-default btn-block" name="delfood">حذف کردن</button>
                 </div>
              </div>  
            </form>  
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
    </div>
@endsection
