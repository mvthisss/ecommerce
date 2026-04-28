@extends('admin.maindesign')

@section('view_category')

<table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category ID</th>
            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd;">Category Name</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="padding: 12px;">{{ $category->id }}</td>
            <td style="padding: 12px;">{{ $category->category }}</td>
            <td style="padding: 12px;">
                <a href="{{ route('admin.updatecategory', $category->id) }}" onclick="return confirm('Are you sure you want to update this category?')">Update</a>
            </td>
            <td style="padding: 12px;">
                <a href="{{ route('admin.deletecategory', $category->id) }}" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>

@endsection
    