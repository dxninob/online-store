@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-4 ms-auto">
      <p class="lead"><b>Total de ordenes:</b> {{ $viewData["totalOfOrders"] }}</p>
      <p class="lead"><b>Total vendido:</b> ${{ $viewData["totalSold"] }}</p>
    </div>
    <div class="col-lg-4 ms-auto">
      <p class="lead"><b>Precio promedio:</b> ${{ $viewData["averagePrice"] }}</p>
      <p class="lead"><b>Número de categorias:</b> ${{ $viewData["totalCategories"] }}</p>
    </div>
  </div>
</div>
@endsection