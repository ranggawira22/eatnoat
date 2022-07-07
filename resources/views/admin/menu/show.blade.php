@extends('layout.main')

@section('title', 'Admin | '. $menu->name)

@section('content')
  <div class="container mt-3 mb-5">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="detail">
          {{-- left Section --}}
          <div class="detail-img">
            <img class="img-thumbnail" src="\img\food\{{ $menu->poster }}" alt="">
          </div>
          {{-- Right Section --}}
          <div class="right-section">
            <div>
              <a href="/admin" class="btn btn-outline-primary">&laquo; Back</a>
              <a href="/admin/{{ $menu->id }}/edit" class="btn btn-info">&circlearrowright; Edit</a>
              <form action="/admin/{{ $menu->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">&times; Delete</button>
              </form>
            </div>
            <table class="table table-hover table-borderless">
              <tbody>
                <tr>
                  <th scope="row" class="text-right">Name</th>
                  <td>{{ $menu->name }}</td>
                </tr>
                <tr>
                  <th scope="row" class="text-right">Menu ID</th>
                  <td>{{ $menu->menu_id }}</td>
                </tr>
                <tr>
                  <th scope="row" class="text-right">Category</th>
                  <td>{{ Str::ucfirst($menu->category) }}</td>
                </tr>
                <tr>
                  <th scope="row" class="text-right">Price</th>
                  <td>Rp{{ number_format($menu->price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                  <th scope="row" class="text-right">Options</th>
                  <td>{{ $menu->options }}</td>
                </tr>
                <tr>
                  <th scope="row" class="text-right">Rating</th>
                  <td>{{ $menu->rating }}</td>
                </tr>
                <tr>
                  <th scope="row" class="text-right">Desc</th>
                  <td>{{ $menu->description }}</td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

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