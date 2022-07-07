@extends('layout.main')

@section('title', 'EAT & OAT | Foodcart')

@section('content')
<div class="container mt-3 mb-5">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      @if (session('status'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      @endif
      <h3>Your Foodcart</h3>
      <hr>
      @if (count($invoices) != 0)
      <div class="orders">
        <div class="order-list">
          @foreach ($invoices as $invoice)
          <div class="order-cards">
            @foreach($posters as $poster)
              @if($poster['menu_id'] == substr($invoice['item_id'], 0, 4))
              <div class="item-control">
                <div class="order-img"><img src="\img\food\{{ $poster['url'] }}" alt=""></div>
              @endif
            @endforeach
                <span>
                  <form action="/checkout/{{$invoice['item_id'] . $invoice['invoices_id']}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm">&times; Remove</button>
                  </form>
                </span>
              </div>
              

            <div class="order-details">
              <h5>{{ $invoice['item_name'] }}</h5>
              <p class="order-qty">&RightAngleBracket; {{ $invoice['quantity'] }} item(s)</p>
              <p class="order-option">&RightAngleBracket; {{ $invoice['option'] }}</p>
              <p class="order-message">&RightAngleBracket; {{ $invoice['message'] }}</p>
              <p class="order-price">&RightAngleBracket; Rp{{ number_format($invoice['price'], 0, ',', '.') }}</p>
            </div>
          </div>
          @endforeach
        </div>

        <div class="order-summary">
          <h6 class="order-summary-header">Order Summary</h6>
          <div class="order-summary-list">
            @foreach($invoices as $invoice)
            <div class="order-summary-group">
              <p class="order-summary-item">{{ $invoice['item_name'] }}</p>
              <p class="order-summary-price">Rp{{ number_format($invoice['price'], 0, ',', '.') }}</p>
            </div>
            @endforeach
          </div>
          <div class="order-summary-total">
            <p>Rp{{ number_format($total_payment, 2, ',', '.') }}</p>
          </div>
          {{-- <a href="/payment" class="btn btn-success btn-block mt-1">Payment &raquo;</a> --}}
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success btn-block mt-1" data-toggle="modal" data-target="#exampleModalCenter">
            Payment &raquo;
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h5>Item that you ordered</h5>
                  @foreach($invoices as $invoice)
                  <div class="order-summary-group">
                    <p class="order-summary-item text-black">{{ $invoice['item_name'] }} / {{ number_format($invoice['quantity']) }} items</p>
                    <p class="order-summary-price text-black">Option : {{ $invoice['option'] }}</p>
                    <p class="order-summary-price text-black">Rp{{ number_format($invoice['price'], 0, ',', '.') }}</p>
                  </div>
                  @endforeach
                  <p></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="/payment" class="btn btn-primary">Submit</a>
                  
                </div>
              </div>
            </div>
          </div>
          </div>
        @else
          {{-- jika tidak ada item di checkout --}}
          <div class="jumbotron jumbotron-fluid text-center text-white">
            <div class="container">
              <h1 class="display-4">Your foodcart is empty</h1>
              <p class="lead">Let's add some items from our menu list <a href="/all" class="text-warning text-decoration-none">here.</a></p>
            </div>
          </div>
        </div>
        @endif
    </div>
  </div>
</div>
@endsection

<style scoped>
  .orders {
    display: grid;
    grid-auto-flow: column;
    grid-template-columns: 3fr 1fr;
  }
  .order-cards {
    display: grid;
    grid-auto-flow: column;
    grid-template-columns: 1fr 3fr;
  }
  .item-control {
    display: grid;
    grid-auto-flow: row;
    grid-template-rows: 1fr 50px;
  }
  .item-control span {
    justify-self: end;
    margin-top: 5px;
    margin-right: 10px;
  }

  .order-img {
    width: 100px;
    height: 100px;
    overflow: hidden;
    justify-self: end;
    margin-right: 10px;
    border-radius: 10px;
    box-shadow: 0px 0px 3px 2px rgba(0, 0, 0, 0.3);
  }
  .order-img img {
    width: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .order-option, .order-qty, .order-message {
    color: #aaa;
    margin: 0;
  }
  .order-price {
    color: green;
    font-weight: bold;
  }
  .order-summary-header {
    color: #777;
    border-left: 5px solid #777;
    padding-left: 5px;
  }
  .order-summary-list {
    border: 2px solid #ccc;
    /* background: #efefef; */
    border-radius: 5px;
    padding: 3px 10px;
    max-height: 300px;
    overflow-y: auto;
  }
  .order-summary-group {
    margin: 5px 0px;
  }
  .order-summary-item, .order-summary-price {
    color: #aaa;
    font-size: 0.8em;
    margin: 0;
  }
  .order-summary-item {
    font-weight: bold;
  }
  .order-summary-total {
    border: 2px solid #ccc;
    border-radius: 5px;
    text-align: center;
    height: 50px;
    padding: 0px 5px;
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
  /* a.text-decoration-none, a.text-decoration-none:hover {
    color: yellow;
  }
  a.text-decoration-none:hover {
    opacity: 0.6;
  } */
  
</style>