    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-6">
                <h2>Categories</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add New Category
                </a>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                @if($categories->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->nama }}</td>
                                        <td>{{ Str::limit($category->deskripsi, 50) }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete(event)">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-info">
                        No categories found. <a href="{{ route('categories.create') }}">Create a new category</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endsection
