@extends('layout.main')
@section('title', 'Edit a menu')

@section('content')
<div class="container mt-3 mb-3">
  <div class="row">
    <div class="col-md-8 offset-md-2 form-section">
      <h2>Edit menu</h2>
      <hr>
      <form action="/admin/{{$menu->id}}" method="post">
        @method('put')
        @csrf
        <input type="hidden" name="id" value="{{ $menu->id }}">
        <div class="form-group">
          <label for="menu_id">Menu ID</label>
          <input type="text" class="form-control" name="menu_id" id="menu_id" value="{{ $menu->menu_id }}" placeholder="4-digits menu ID (e.g. LASA for Lasagna)">
        </div>
        <div class="form-group">
          <label for="item_name">Item name</label>
          <input type="text" class="form-control" name="item_name" id="item_name" value="{{ $menu->name }}" placeholder="Insert item name">
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select class="custom-select" id="category" name="category">
            <option selected value="{{ $menu->category }}">Default - {{ Str::ucfirst($menu->category) }}</option>
            <option disabled role="separator">-----</option>
            <option value="western">Western</option>
            <option value="indonesian">Indonesian</option>
            <option value="dessert">Dessert</option>
            <option value="japanese">Japanese</option>
            <option value="beverages">Beverages</option>
          </select>
        </div>
        <div class="form-group">
          <label for="price">Price for one</label>
          <input type="number" class="form-control" name="price" id="price" value="{{ $menu->price }}" placeholder="In Indonesian currency - IDR">
        </div>
        <div class="form-group">
          <label for="options">Option (separated by comma)</label>
          <input type="text" class="form-control" name="options" id="options" value="{{ $menu->options }}" placeholder="Option (separated by comma)">
        </div>

        <input type="hidden" name="rating" value="0">
        
        <div class="form-group">
          <label for="poster">Poster</label>
          <input type="text" class="form-control" name="poster" id="poster" value="{{ $menu->poster }}" placeholder="Insert file name (e.g. lasagna.jpg)">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" cols="60" rows="5">{{ $menu->description }}</textarea>
        </div>
        <a href="/admin/{{ $menu->id }}" class="btn btn-outline-primary">&laquo; Back</a>
        <button type="reset" class="btn btn-warning">&circlearrowleft; Reset</button>
        <button type="submit" class="btn btn-success">&check; Update</button>
      </form>
    </div>
  </div>
</div>
@endsection

<style scoped>
.form-section {
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0px 0px 24px rgba(0, 0, 0, 0.1);
}
</style>