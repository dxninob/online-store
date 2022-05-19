@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-12-family-select-2021?wid=940&hei=1112&fmt=jpeg&qlt=90&.v=1617135051000" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $phone['data']['name'] }} (${{ $phone['data']['price'] }})
        </h5>
        <p class="card-text">{{ __('phone.brand') }}: {{ $phone['data']['brand'] }}</p>
        <p class="card-text">{{ __('phone.model') }}: {{ $phone['data']['model'] }}</p>
      </div>
    </div>
  </div>
</div>
@endsection