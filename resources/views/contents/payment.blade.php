@extends('layout.main')

@section('title', 'Payment | EAT & OAT')

@section('content')
  <div class="container mt-3 mb-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card text-center">
          <div class="card-header bg-success text-white">
            Finalization
          </div>
          <div class="card-body">
            <p class="card-text text-muted">Invoice Number</p>
            <h2 class="card-title font-weight-bold">{{ $invoice_number }}</h2>
            <p class="card-text text-muted">Bank Mutiara</p>
            <h4 class="card-title font-weight-bold"> No. Rekening : 082011633048053081 </h4>
            <p class="card-text text-muted">E-Wallet (Dana, Ovo, Link Aja, Gopay) </p>
            <h4 class="card-title font-weight-bold"> 081081081081 </h4>
            <p class="card-text text-muted">User</p>
            <h5 class="card-title font-weight-bold">{{ auth('admin')->user()->name }}</h5>
            <p class="card-text text-muted">Total Payment</p>
            <h4 class="card-title font-weight-bold">Rp{{ number_format($total_price,0,',','.') }}</h4>
            <form action="/cancel/{{ $invoice_number }}" class="d-inline" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-outline-danger btn-block mt-5">Cancel Order &raquo;</button>
            </form>
            <form action="/finalize/{{ $invoice_number }}" class="d-inline" method="post">
              @method('PUT')
              @csrf
              <button type="submit" class="btn btn-success btn-block mt-1">Complete &raquo;</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection