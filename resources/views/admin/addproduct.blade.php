@extends('admin.maindesign')


@section('add_product')
    @if(session('product_message'))
    <div class="d-flex align-items-stretch">
            {{ session('product_message') }}
        </div>
@endif  
<div class="container-fluid">


    <form action="{{ route('admin.postaddproduct') }}" method="POST" 
    enctype="multipart/form-data">
        @csrf
        <input type="text" name="product_title" placeholder="enter product title">
        <textarea name="description" id="" placeholder="enter product description"></textarea>
        <input type="number" name="product_price" placeholder="enter product price">
        <input type="file" name="product_image" placeholder="upload product image">
        <input type="number" name="product_quantity" placeholder="enter product quantity">
        <select name="product_category" >
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        <input type="submit" name="submit" value="Add Product">
</form>
</div>

@endsection