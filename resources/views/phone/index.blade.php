@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($phones['data'] as $phone)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-12-family-select-2021?wid=940&hei=1112&fmt=jpeg&qlt=90&.v=1617135051000" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('phone.show', ['id'=> $phone['linkToMobile'][-1]]) }}" class="btn bg-primary text-white">{{ $phone['name'] }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection