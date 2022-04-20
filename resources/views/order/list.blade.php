@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@forelse ($viewData["orders"] as $order)
<div class="card mb-4">
  <div class="card-header">
    {{ __('order.order') }} #{{ $order->getId() }}
  </div>
  <div class="card-body">
    <b>{{ __('order.date') }}:</b> {{ $order->getCreatedAt() }}<br />
    <b>{{ __('order.total') }}:</b> ${{ $order->getTotal() }}<br />
  
    <table class="table table-bordered table-striped text-center mt-3">
      <thead>
        <tr>
          <th scope="col">{{ __('order.id') }}</th>
          <th scope="col">{{ __('order.name') }}</th>
          <th scope="col">{{ __('order.price') }}</th>
          <th scope="col">{{ __('order.quantity') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($order->getItems() as $item)
        <tr>
          <td>{{ $item->getId() }}</td>
          <td>
            <a class="link-success" href="{{ route('computer.show', ['id'=> $item->getComputer()->getId()]) }}">
              {{ $item->getComputer()->getName() }}
            </a>
          </td>
          <td>${{ $item->getPrice() }}</td>
          <td>{{ $item->getQuantity() }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <form action="{{ route('pdf.download', ['id'=>  $order->getId()]) }}" method="POST">
      @csrf
      <button type="submit" class="btn bg-primary text-white">Download</button>
    </form>

  </div>
</div>
@empty
<div class="alert alert-danger" role="alert">
  {{ __('order.list.message') }}
</div>
@endforelse
@endsection