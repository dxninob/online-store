@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
  <div class="card-header">
    {{ __('order.index.inOrder') }}
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th scope="col">{{ __('order.id') }}</th>
          <th scope="col">{{ __('order.name') }}</th>
          <th scope="col">{{ __('order.price') }}</th>
          <th scope="col">{{ __('order.quantity') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["computers"] as $computer)
        <tr>
          <td>{{ $computer->getId() }}</td>
          <td>{{ $computer->getName() }}</td>
          <td>${{ $computer->getPrice() }}</td>
          <td>{{ session('computers')[$computer->getId()] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="text-end">
        <a class="btn btn-outline-secondary mb-2"><b>{{ __('order.index.totalPay') }}</b> ${{ $viewData["total"] }}</a>
        @if (count($viewData["computers"]) > 0)
        <a href="{{ route('order.purchase') }}" class="btn bg-primary text-white mb-2">{{ __('order.index.purchase') }}</a>
        <a href="{{ route('order.delete') }}">
          <button class="btn btn-danger mb-2">
            {{ __('order.index.removeAll') }}
          </button>
        </a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
