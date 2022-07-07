@extends('layout.main')

@section('title', 'EAT & OAT | ' . Str::title($label ?? 'All Menu'))

@section('content')
{{-- @dd($menus) --}}
  <div class="container mt-3 mb-5">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        @if (session('status'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          {{ session('status') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        <h5>{{ Str::title($label ?? 'All Menu') }}</h5>
        <hr>
        <div class="menus">
          @foreach ($menus as $menu)
          <a href="/detail/{{ Str::slug($menu['name'], '-') }}" class="card-menu text-decoration-none">
            <div class="menu-img">
              <img src="\img\food\{{ $menu['poster'] }}" alt="">
            </div>
            <h5 class="menu-name">{{ $menu['name'] }}</h5>
            <p class="menu-price">Rp{{ number_format($menu['price'], 0, ',', '.') }}</p>
            {{-- <a href="/detail/{{ Str::slug($menu['name'], '-') }}" class="btn btn-outline-success btn-block">Detail</a> --}}
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection


<style scoped>
  @media (max-width: 1024px) {
    .menus {
      display: grid;
      grid-auto-flow: row;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }
  }

  @media (min-width: 1024px) {
    .menus {
      display: grid;
      grid-auto-flow: row;
      grid-template-columns: repeat(4, 1fr);
      gap: 10px;
    }
  }

  .card-menu {
    display: grid;
    grid-auto-flow: row;
    grid-template-rows: 2fr repeat(2, 0.5fr);
    width: 200px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  }

  .menu-img {
    height: 200px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
  }

  .menu-img img {
    height: 200px;
  }

  .menu-name, .menu-price {
    padding: 0px 10px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  }

  .menu-name {
    color: #333;
    margin-top: 5px;
  }

  .menu-price {
    color: green;
    font-weight: bold;
  }

  a.btn-block {
    border-radius: 0px;
  }
</style>