@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    {{ __('admin.order.statistics.view') }}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <div class="row">
      <div class="col">
        <div class="mb-3 row">
          <p class="lead"><b>{{ __('admin.order.statistics.totalOrders') }}:</b> {{ $viewData["totalOfOrders"] }}</p>
          <p class="lead"><b>{{ __('admin.order.statistics.totalSold') }}:</b> ${{ $viewData["totalSold"] }}</p>
        </div>
      </div>
      <div class="col">
        <div class="mb-3 row">
          <p class="lead"><b>{{ __('admin.order.statistics.avgPrice') }}:</b> ${{ $viewData["averagePrice"] }}</p>
          <p class="lead"><b>{{ __('admin.order.statistics.numCategories') }}:</b> ${{ $viewData["totalCategories"] }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
