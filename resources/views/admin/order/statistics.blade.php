@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-4 ms-auto">
      <p class="lead"><b>{{ __('admin.order.statistics.totalOrders') }}:</b> {{ $viewData["totalOfOrders"] }}</p>
      <p class="lead"><b>{{ __('admin.order.statistics.totalSold') }}:</b> ${{ $viewData["totalSold"] }}</p>
    </div>
    <div class="col-lg-4 ms-auto">
      <p class="lead"><b>{{ __('admin.order.statistics.avgPrice') }}:</b> ${{ $viewData["averagePrice"] }}</p>
      <p class="lead"><b>{{ __('admin.order.statistics.numCategories') }}:</b> ${{ $viewData["totalCategories"] }}</p>
    </div>
  </div>
</div>
@endsection