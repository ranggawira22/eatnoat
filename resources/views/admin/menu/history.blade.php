@extends('layout.main')

@section('title', 'Admin | History')

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
  <h3>All Complete Transaction</h3>
  <hr>
  <div class="row">
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Invoice Number</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col" class="w-20">Address</th>
            <th scope="col">Courier</th>
            <th scope="col">Item name</th>
            <th scope="col">Option</th>
            <th scope="col">Quantity</th>
            <th scope="col" colspan="3" class="w-20">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->invoices_id }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>{{ $item->user_phone }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->courier }}</td>
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->option }}</td>
            <td>{{ $item->quantity }}</td>
            <td><form action="/admin/history/{{ $item->id }}" method="POST">
              @csrf
              @method('put')
            <select id="status" name="status" class="form-control" onchange="this.form.submit()">
              @if ($item->status == 'Unpackaged')
              <option value="Unpackaged" selected>Unpackaged</option>
              @else
              <option value="Unpackaged" >Unpackaged</option>
              @endif
              @if ($item->status == 'Packaged')
              <option value="Packaged" selected>Packaged</option>
              @else
              <option value="Packaged">Packaged</option>
              @endif
              @if ($item->status == 'Delivered')
              <option value="Delivered" selected>Delivered</option>
              @else
              <option value="Delivered">Delivered</option>
              @endif
              @if ($item->status == 'Completed')
              <option value="Completed" selected>Completed</option>
              @else
              <option value="Completed">Completed</option>
              @endif
              @if ($item->status == 'Canceled')
              <option value="Canceled" selected>Canceled</option>
              @else
              <option value="Canceled">Canceled</option>
              @endif
          </select></td>
          </form>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection

<style scoped>
.btn-add {
  position: fixed;
  right: 10px;
  bottom: 10px;
}
.w-10{
  width: 10%;
}
.w-20{
  width: 20%;
}
</style>