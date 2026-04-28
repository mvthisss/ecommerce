@extends('admin.maindesign')

<base href="/public">
@section('update_category')
    @if(session('update_success'))
    <div class="d-flex align-items-stretch" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('update_success') }}
        </div>
@endif  
<div class="container-fluid">


    <form action="{{ route('admin.postupdatecategory', $category->id) }}" method="POST">
        @csrf
        <input type="text" name="category" value="{{$category->category}}">
        <input type="submit" name="submit" value="Update Category">
</form>
</div>

@endsection