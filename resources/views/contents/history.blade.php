@extends('layout.main')

@section('title', 'History')

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
  <div class="col-md-8 offset-md-2">
    <h3>Your History</h3>
    <hr>
  </div>
  
  @if (count($items) != 0)
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Invoice Number</th>
            <th scope="col">Tanggal Pesan</th>
            <th scope="col">Item name</th>
            <th scope="col">Option</th>
            <th scope="col">Quantity</th>
            <th scope="col">Courier</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->invoices_id }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>{{ $item->item_name }}</td>
            <td>{{ $item->option }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->courier }}</td>
            <td>{{ $item->status }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @else
  {{-- jika tidak ada item di checkout --}}
    <div class="jumbotron jumbotron-fluid text-center text-white">
      <div class="container">
        <h1 class="display-4">Your history is empty</h1>
        <p class="lead">Let's checkout items you have order <a href="/checkout" class="text-warning text-decoration-none">here.</a></p>
      </div>
    </div>
    </div>
    @endif
</div>


@endsection

<style scoped>
.btn-add {
  position: fixed;
  right: 10px;
  bottom: 10px;
}
.order-summary-total p {
    color: green;
    font-weight: bold;
    font-size: 1.25em;
    line-height: 40px;
  }
  
  div.jumbotron {
    background: #1a936f;
    border-radius: 10px;
  }
</style>