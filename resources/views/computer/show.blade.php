@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/images/'.$viewData['computer']->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $viewData["computer"]->getName() }} (${{ $viewData["computer"]->getPrice() }})
        </h5>
        <p class="card-text">{{ __('computer.cpu') }}: {{ $viewData["computer"]->getCpu() }}</p>
        <p class="card-text">{{ __('computer.ram') }}: {{ $viewData["computer"]->getRam() }} GB</p>
        <p class="card-text">{{ __('computer.gpu') }}: {{ $viewData["computer"]->getGpu() }}</p>
        <p class="card-text">{{ __('computer.storage') }}: {{ $viewData["computer"]->getStorage() }} GB</p>

        <p>{{ __('computer.categories') }}:</p>
        @foreach($viewData["computer"]->getCategories() as $category)
        <p>- {{ $category->getName() }}</p>
        @endforeach

        <p class="card-text">
        <form method="POST" action="{{ route('order.add', ['id'=> $viewData['computer']->getId()]) }}">
          <div class="row">
            @csrf
            <div class="col-auto">
              <div class="input-group col-auto">
                <div class="input-group-text">{{ __('computer.show.quantity') }}</div>
                <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
              </div>
            </div>
            <div class="col-auto">
              <button class="btn bg-primary text-white" type="submit">{{ __('computer.show.addToOrder') }}</button>
            </div>
          </div>
        </form>
        <br><a class="btn bg-primary text-white" href="https://api.whatsapp.com/send?text={{ $viewData['shareText'] }}{{ route('computer.show', ['id'=> $viewData['computer']->getId()]) }}">{{ __('computer.show.share') }}</a>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection