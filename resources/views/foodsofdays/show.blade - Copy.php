@extends('master')
@section('title', 'تعریف غذا برای هرروز')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            <div class="content">
            <div class="panel-heading">
                <h2>  @foreach($daystitle as $key)
                        {!! $key->title !!}
                      @endforeach
                </h2>
            </div>
            <form method="post" action='/addfoodsofday'> 
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                <div class="alert alert-success">
                {{ session('status') }}
                </div>
               @endif
            
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div style="width: 220px; float:right; height:250px; margin:5px; background:lightgray;">لیست غذاهای موجود
                <div style="padding:20px;">
                    <select id="source1"  class="form-control"  size="7">
                       @foreach($foods as $food)
                            <option>
                                <a href="{!! action('FoodsController@show', $food->slug) !!}">{!! $food->title !!} </a>
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div style="width: 100px; float:right; height:250px; background:lightgray; margin:4px;">
                <div style="padding-top:80px; padding-left:5px; padding-right:5px;">
                    <div  class="btn-group-vertical" >
                        <button id="shift1" type="button" class="btn btn-default" >اضافه کردن</button>
                        <button  id="rshift1" type="button" class="btn btn-default">حذف کردن</button>
                        <button type="button" class="btn btn-default" onclick="sendFoodsToServer()">تایید</button>
                        <button type="submit" class=" btn btn-default  btn-submit" >تایید2</button>
                    </div>
                </div>
            </div>
                
             <div style="width: 220px; float:right; height:250px; margin:5px; background:lightgray;">لیست غذاهای امروز
                <div style="padding:20px;">
                    <select  id="target1" class="form-control" size="7" name=>
                        
                    </select>
                </div>
            </div>  
            </form>    
            <div class="clearfix"></div>
            </div>
        </div>
    </div>


<script type="text/javascript">
      function sendFoodsToServer(){
       var optionsTxt = document.getElementById("target1");
       var foodsofday = [];
       var counter;
       for (counter = 0; counter < optionsTxt.length; counter++) {
        foodsofday[counter] =optionsTxt.options[counter].text;
       }
      
         $.ajax({
           url: '/addfoodsofday',
           type: 'POST',
           data:JSON.stringify(foodsofday),
           contentType: 'application/json',
            });
           alert(foodsofday);
           
            
      
  }
var hybridSelector = function (source, target, shift, rshift) {
            var ddlSource = source;
            var ddlTarget = target;
            var btnShift = shift;
            var btnRShift = rshift;

            btnShift.addEventListener("click", function () {
                var selectedItems = getSelectOptions(source);

                if (selectedItems) {
                    for (var i = 0; i < selectedItems.length; i++) {
                        var option = new Option(selectedItems[i].text, selectedItems[i].text);
                        ddlTarget.appendChild(option);
                        selectedItems[i].remove();
                    }
                }
            });

            btnRShift.addEventListener("click", function () {
                var selectedItems = getSelectOptions(target);
                if (selectedItems) {
                    for (var i = 0; i < selectedItems.length; i++) {
                        var option = new Option(selectedItems[i].text, selectedItems[i].text);
                        ddlSource.appendChild(option);
                        selectedItems[i].remove();

                    }
                }
            });

            function getSelectOptions(select) {
                var result = [];
                var options = select.options;
                var opt;

                for (var i = 0, iLen = options.length; i < iLen; i++) {
                    opt = options[i];

                    if (opt.selected) {
                        result.push(opt);
                    }
                }
                return result;
            }

            return ddlTarget.options;
        };

        //can instantiate as many as i want
        var hybridSelector1 = new hybridSelector(document.getElementById('source1'), document.getElementById('target1'), document.getElementById('shift1'), document.getElementById('rshift1'));
        var hybridSelector2 = new hybridSelector(document.getElementById('source2'), document.getElementById('target2'), document.getElementById('shift2'), document.getElementById('rshift2'));

        function submit() {
            var options1 = hybridSelector1;
            var options2 = hybridSelector2;

            debugger;
            return false;
        }

</script>
@endsection
