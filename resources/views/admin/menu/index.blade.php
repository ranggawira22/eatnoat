@extends('layout.main')

@section('title', 'Admin | List of Menu')

@section('content')
<div class="container mt-3 mb-3">
  @if (session('data_status'))
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('data_status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    </div>
  </div>
  @endif
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Menu ID</th>
            <th scope="col">Item name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->menu_id }}</td>
            <td>{{ $item->name }}</td>
            <td>
              <a href="/admin/{{ $item->id }}" class="badge badge-primary">View</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- add btn --}}
<div class="btn-add">
  <a href="/add" class="btn btn-success btn-block">&plus; Add item</a>
  <a href="/logout" class="btn btn-warning btn-block">&UpperRightArrow; Logout</a>
</div>
@endsection

<style scoped>
.btn-add {
  position: fixed;
  right: 10px;
  bottom: 10px;
}
</style>