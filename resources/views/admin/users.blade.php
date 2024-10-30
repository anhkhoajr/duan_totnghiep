@extends('admin.layout')

@section('title', 'Admin')

@section('content')
<div class="main-content">
    <h3 class="title-page">
        Users
    </h3>
    <div class="d-flex justify-content-start">
        <form class="form-search" action="{{ route('users') }}">
            <fieldset class="name">
                <input type="text" placeholder="Search..." name="search" tabindex="2" value="{{ request()->query('search') }}" aria-required="true" required>
            </fieldset>
        </form>
    </div>
    @if(session('success'))
    <div id="successMessage" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-flex justify-content-end">
        <a href="{{ route('adduser') }}" class="btn mb-2" style="background-color: #add8e6;">Add User</a>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role == 1 ? 'Admin' : 'User' }}</td>
                <td>
                    <a href="{{ route('edituser', $user->id) }}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                    <a href="{{ route('deleteuser', $user->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                        <i class="fa-solid fa-trash"></i> Delete
                    </a>
                    <form id="delete-form-{{ $user->id }}" action="{{ route('deleteuser', $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit/Delete</th>
            </tr>
        </tfoot>
    </table>
    <div class="pagination">
        {{ $users->links('pagination::default') }}
    </div>
</div>

<script>
    setTimeout(function() {
        document.getElementById('successMessage').style.display = 'none';
    }, 2000);
</script>
@endsection