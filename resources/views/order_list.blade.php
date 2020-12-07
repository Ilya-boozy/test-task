@extends("layout")
@section("main_content")
    @if (isset($restore))
        <Form action="\order-restore" method="post">
            @csrf
        @forelse($order_array as $order)
            <input type="checkbox" value={{$order->id}} id={{$order->id}} name="CheckBox{{$order->id}}">
            <label for="subscribeNews">{{$order->title}}</label>
            <br>
        @empty
            <p>List of order is empty</p>
        @endforelse
            <button type="submit">Restore</button>
        </form>
    @else
        @forelse($order_array as $order)
            <a href="\order\{{$order->id}}">
                <p>
                    <strong>{{$order->title}}</strong>
                </p>
            </a>
        @empty
            <p>List of order is empty</p>
        @endforelse
    @endif
@endsection