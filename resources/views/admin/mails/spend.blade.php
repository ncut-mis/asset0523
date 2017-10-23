<p>維修明細：</p>

@foreach($maintainceitems as $maintainceitem)

<p>{{$maintainceitem->name}} - {{$maintainceitem->amount}}</p>

@endforeach
