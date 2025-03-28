@extends('client.layouts.master')

@section('content')
    <!-- <h1>danh muc</h1>
    <ul>
        @foreach($cateroriesList as $caterory)
            <li>{{ $caterory->slug }}</li>
        @endforeach
    </ul> -->
    <h1>Danh sách sản phẩm</h1>
    <ul>
        @foreach($productList as $product)
            <li>
            {{ $product->title }} thuoc Danh muc cua {{ $product->category->slug  }} 

            </li>
        @endforeach
    </ul>
@endsection