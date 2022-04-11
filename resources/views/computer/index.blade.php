@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  <div class="col-md-12 mb-3">
    <form action="{{ route('computer.index') }}">
      <label for="cars">{{ __('computer.index.sortPrice') }}</label>
      <select name="sort" id="sort">
        <option value="" selected disabled hidden></option>
        <option value="1">{{ __('computer.index.sortPrice.removeFilter') }}</option>
        <option value="2">{{ __('computer.index.sortPrice.lowToHigh') }}</option>
        <option value="3">{{ __('computer.index.sortPrice.highToLow') }}</option>
      </select>
      <input type="submit" class="btn bg-primary text-white" value="Sort">
    </form>

  </div>

  @foreach ($viewData["computers"] as $computer)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/images/'.$computer->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('computer.show', ['id'=> $computer->getId()]) }}" class="btn bg-primary text-white">{{ $computer->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection