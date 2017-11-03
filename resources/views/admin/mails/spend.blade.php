<p>維修明細：</p>
<p>資產名稱：{{$name}} </p>
<p>位置：{{$location}}</p>
<hr>
@foreach($maintainceitems as $maintainceitem)
<p>{{$maintainceitem->name}} - {{$maintainceitem->amount}}</p>
@endforeach
<hr>
<p>總金額：{{$total}}</p>