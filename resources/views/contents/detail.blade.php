@extends('layout.main')

@section('title', 'EAT & OAT | '. $menu['name'])

@section('content')
  <div class="container mt-3 mb-5">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="detail">
          {{-- left Section --}}
          <div class="detail-img">
            <img class="img-thumbnail" src="\img\food\{{ $menu['poster'] }}" alt="">
          </div>
          {{-- Right Section --}}
          <div class="right-section">
            {{-- Form --}}
            <form action="/cart" method="post">
            @csrf
            @method('post')
            <h3>{{ $menu['name'] }}</h3>
            <input type="hidden" name="menu_id" value="{{ $menu['menu_id'] }}">
            <input type="hidden" name="item_name" value="{{ $menu['name'] }}">
            <hr>
            <h5 class="detail-header">Description</h5>
            <p>{{ $menu['description'] }}</p>

              <h5 class="detail-header">Quantity</h5>
              {{-- Quantity --}}
              <button type="button" id="decrement" class="btn btn-outline-success">&minus;</button>
              <input type="number" name="quantity" class="quantity" id="quantity" value="1" readonly>
              <button type="button" id="increment" class="btn btn-outline-success">&plus;</button>
              {{-- Options (Radio button) --}}
              <h5 class="detail-header">Option</h5>
              @if ($menu['options'] != NULL)
                @foreach($options as $option)
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="option" id="{{ $option }}" value="{{ $option }}" checked>
                  <label class="form-check-label" for="{{ $option }}">{{ $option }}</label>
                </div>
                @endforeach
              @else
                <h6>No option available.</h6>
                <input type="hidden" name="option" value="-">
              @endif
              {{-- Notes --}}
              <h5 class="detail-header">Courier Option</h5>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="courier" id="Self Pick Up" value="Self Pick Up">
                <label class="form-check-label" for="Self Pick Up">Self Pick Up</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="courier" id="Gojek" value="Gojek" checked>
                <label class="form-check-label" for="Gojek">Gojek</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="courier" id="Grab" value="Grab">
                <label class="form-check-label" for="Grab">Grab</label>
              </div>
              <h5 class="detail-header">Nomor Telepon</h5>
              <div class="form-group">
                @if (auth('admin')->check())
                  <input type="text" class="form-control" name="noTelp" id="noTelp" value="{{ auth('admin')->user()->phone }}">
                @else
                  <input type="text" class="form-control" name="noTelp" id="noTelp" value=" ">
                @endif
              </div>
              <h5 class="detail-header">Alamat</h5>
              <div class="form-group">
                @if (auth('admin')->check())
                  <input type="text" class="form-control" name="address" id="address" value="{{ auth('admin')->user()->address }}">
                @else
                  <input type="text" class="form-control" name="address" id="address" value=" ">
                @endif
              </div>
              <h5 class="detail-header">Message</h5>
              <div class="form-group">
                <input type="text" class="form-control" name="message" id="message">
              </div>
              {{-- Total Price --}}
              <h5 class="detail-header">Total</h5>
              <p>Rp<input type="text" name="total_price" class="total_price" id="total-price" value="{{ $menu['price'] }}" readonly> </p>
              <a href="/all" class="btn btn-outline-primary">&laquo; Back</a>
              <button type="submit" class="btn btn-success">Add to cart &raquo;</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<script type="text/javascript">
window.onload = function(){
    let quantity = 1;
    let priceElement = document.getElementById('total-price');
    const incrementBtn = document.getElementById("increment");
    const decrementBtn = document.getElementById("decrement");
    const base_price = parseInt(priceElement.getAttribute('value'));

    if(incrementBtn) {
      incrementBtn.addEventListener('click', function(e){
        quantity++;
        setQuantity(quantity);

        // updating total price
        priceElement.setAttribute('value', totalPrice(quantity, base_price));
        console.log(quantity);
      }, false);
    }

    if(decrementBtn) {
      decrementBtn.addEventListener('click', function(e){
        quantity--;
        if (quantity < 1) quantity = 1;
        setQuantity(quantity);

        // updating total price
        priceElement.setAttribute('value', totalPrice(quantity, base_price));
        console.log(quantity);
      }, false);
    }

    function setQuantity (quantity) {
      let quantityElement = document.getElementById("quantity");
      quantityElement.setAttribute('value', quantity);
      return quantity;
    }

    function totalPrice(quantity, price) {
      return quantity * price;
    }    
}
  
</script>

<style scoped>
  .detail {
    display: grid;
    grid-auto-flow: column;
    grid-template-columns: 1fr 2.5fr;
    column-gap: 20px;
  }
  .detail-img {
    width: 250px;
    height: 250px;
    overflow: hidden;
  }
  .detail-img img {
    display: flex;
    width: 250px;
    justify-content: center;
    align-items: center;
  }
  .detail-header {
    font-weight: bold;
    margin-top: 20px;
  }
  .quantity, .total_price {
    border: none;
    outline: none;
    /* background: #aaa; */
  }
  .quantity {
    width: 50px;
    text-align: center;
  }
  .total_price {
    font-size: 1.25em;
    font-weight: bold;
  }
  #increment, #decrement {
    border-radius: 50%;
  }
</style>