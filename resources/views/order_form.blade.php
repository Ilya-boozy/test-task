@php
    $action_link = "/order";
    $button_name = "Make order";
    $value_title = old("title");
    $value_description = old("description");
    if (isset($order)) {
        $value_title = $order->title;
        $value_description = $order->description;
        $action_link = '\\order\\'.$order->id;
        $button_name = "Save order";
    }
@endphp

@extends("layout")
@section("main_content")
    @if (session()->get("title"))
        <h2>Order sent</h2>
    @endif
    <style>
        .red_p {
            color: red;
        }
    </style>
    <form method='POST' action="{{$action_link}}">
        @if (isset($order))
            @method("PUT")
        @endif
        @csrf
        @error('slug') <p class="red_p">Couldn't make slug</p>@enderror
        <div><label>title</label><input type="text" id="title" name="title" value="{{$value_title}}"></div>
        @error('title') <p class="red_p">{{$message}}</p>@enderror
        <div><label>description</label><input type="text" id="description" name="description" value="{{$value_description}}"></div>
        @error('description') <p class="red_p">{{$message}}</p>@enderror
        <button type="submit">{{$button_name}}</button>
    </form>
@endsection
