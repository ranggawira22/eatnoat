@extends('layout.main')

@section('title', 'Add a menu')

@section('content')
<div class="container mt-3 mb-3">
  @if ( session('add_status') )
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('add_status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-8 offset-md-2 form-section">
      <h2>Add a menu to database</h2>
      <hr>
      <form action="/add" method="post">
        @method('post')
        @csrf
        <div class="form-group">
          <label for="menu_id">Menu ID</label>
          <input type="text" class="form-control" name="menu_id" id="menu_id" placeholder="4-digits menu ID (e.g. LASA for Lasagna)">
        </div>
        <div class="form-group">
          <label for="item_name">Item name</label>
          <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Insert item name">
        </div>
        <div class="form-group">
          <label for="category">Category</label>
          <select class="custom-select" id="category" name="category">
            <option selected disabled>-- Select category --</option>
            <option value="western">Western</option>
            <option value="indonesian">Indonesian</option>
            <option value="dessert">Dessert</option>
            <option value="japanese">Japanese</option>
            <option value="beverages">Beverages</option>
          </select>
        </div>
        <div class="form-group">
          <label for="price">Price for one</label>
          <input type="number" class="form-control" name="price" id="price" placeholder="In Indonesian currency - IDR">
        </div>
        <div class="form-group">
          <label for="options">Option (separated by comma)</label>
          <input type="text" class="form-control" name="options" id="options" placeholder="Option (separated by comma)">
        </div>

        <input type="hidden" name="rating" value="0">
        
        <div class="form-group">
          <label for="poster">Poster</label>
          <input type="text" class="form-control" name="poster" id="poster" placeholder="Insert file name (e.g. lasagna.jpg)">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" cols="60" rows="5"></textarea>
        </div>
        <a href="/admin" class="btn btn-outline-primary">&laquo; Back</a>
        <button type="reset" class="btn btn-warning">&circlearrowleft; Reset</button>
        <button type="submit" class="btn btn-success">&plus; Add</button>

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