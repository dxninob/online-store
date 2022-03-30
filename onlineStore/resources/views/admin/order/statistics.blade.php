@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-4 ms-auto">
      <p class="lead"><b>Total de ordenes:</b> {{ $viewData["totalOfOrders"] }}</p>
      <p class="lead"><b>Total vendido:</b> ${{ $viewData["totalSold"] }}</p>
    </div>
    <div class="col-lg-4 me-auto">
      <p class="lead"><b>Total de computadores vendidos por categoría:</b></p>
      @foreach ($viewData["categories"] as $category)
        <p class="lead">{{ $category->getName() }}: {{ $viewData["category_".$category] }}</p>
      @endforeach
    </div>
  </div>
</div>
@endsection
