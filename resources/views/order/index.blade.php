@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
  <div class="card-header">
    Computers in Order
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
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
        <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
        @if (count($viewData["computers"]) > 0)
        <a href="{{ route('order.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a>
        <a href="{{ route('order.delete') }}">
          <button class="btn btn-danger mb-2">
            Remove all computers from Order
          </button>
        </a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
