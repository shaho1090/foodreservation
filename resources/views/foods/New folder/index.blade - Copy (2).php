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
					<select>
                    @foreach($foods as $food)
                       
                         
                       <option value="{!! $food->title !!}" ></option>
                                       
                        
                    @endforeach
					</select>
					
					 <form {!! action('FoodsController@show', $food->slug) !!} >
                         <input list="title" name="title">
                         <datalist id="title">
						 @foreach($foods as $food)
                          <option value="{!! $food->title !!}">
						 @endforeach
                         </datalist>
                         <input type="submit">
                        </form>        
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
