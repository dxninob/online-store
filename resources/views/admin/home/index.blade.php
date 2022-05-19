@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
  <div class="card-header">
    {{ __('admin.home.index.panel') }}
  </div>
  <div class="card-body">
  {{ __('admin.home.index.description') }}
  </div>
</div>
@endsection