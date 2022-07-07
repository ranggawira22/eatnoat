@extends('layout.main')

@section('title', 'EAT & OAT')

@section('content')
<div class="container-fluid">
  @if (session('status'))
  <div class="row mt-3">
    <div class="col-md-10 offset-md-1">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
    </div>
  </div>
  @endif

  <div class="row">
     <div class="col-12 p-0 m-0">
      <div class="jumbotron jumbotron-fluid first-jumbotron">
        <div class="container text-left">
          <h2 class="display-4">Hungry all of a sudden?</h2>
          <a href="/all" class="btn btn-outline-dark">Order here &rsaquo;</a>
        </div>
      </div>
      <div class="jumbotron jumbotron-fluid second-jumbotron">
        <div class="container text-right text-white">
          <h2 class="display-4">Today's promo!</h2>
          <a href="/category/oatmilk" class="btn btn-outline-light">See &rsaquo;</a>
        </div>
      </div>
      <div class="jumbotron jumbotron-fluid third-jumbotron">
        <div class="container text-left">
          <h2 class="display-4">Hot menu this week</h2>
          <a href="/category/premium" class="btn btn-outline-dark">See &rsaquo;</a>
        </div>
      </div>
     </div>
  </div>


</div>

@endsection

<style scoped>
div.jumbotron {
  height: 500px;
  margin: 2px 0px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-repeat: no-repeat;
  /* background-attachment: fixed; */
  background-size: cover;
  background-position: center;
}
.first-jumbotron {
  background-image: url('\\img\\bg\\bg7.jpg');
}
.second-jumbotron {
  background-image: url('\\img\\bg\\bg4.jpg');
  /* opacity: 0.8; */
}
.third-jumbotron {
  background-image: url('\\img\\bg\\bg8.jpg');
}
</style>