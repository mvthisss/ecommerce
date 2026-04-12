@extends('admin.maindesign')


@section('add_category')
    @if(session('success'))
    <div class="d-flex align-items-stretch">
            {{ session('success') }}
        </div>
@endif  
<div class="container-fluid">


    <form action="{{ route('admin.postaddcategory') }}" method="POST">
        @csrf
        <input type="text" name="category" placeholder="enter category name">
        <input type="submit" name="submit" value="Add Category">
</form>
</div>

@endsection