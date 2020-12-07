@extends("layout")
@section("main_content")
    @if (session()->get("title"))
        <h2>Order change</h2>
    @endif
    <p><strong>title:</strong> {{$order->title}}</p>
    <p><strong>slug:</strong> {{$order->slug}}</p>
    <p><strong>description:</strong> {{$order->description}}</p>

    <form method="post" action="{{'\\order\\'.$order->id}}">
        @csrf
        @method("DELETE")
        <a href="{{$order->id}}/edit"><button type="button">edit</button></a>
        <button type="submit">delete</button>
    </form>
@endsection
