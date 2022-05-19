@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
  <div class="card-header">
    {{ __('order.purchase.completed') }}
  </div>
  <div class="card-body">
    <div class="alert alert-success" role="alert">
        {{ __('order.purchase.message') }} <b>#{{ $viewData["order"]->getId() }}</b>
    </div>
  </div>
</div>
@endsection
