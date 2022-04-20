@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    {{ __('admin.computer.edit.editComputer') }}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.computer.update', ['id'=> $viewData['computer']->getId()]) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.name') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['computer']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.price') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ $viewData['computer']->getPrice() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.cpu') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="cpu" value="{{ $viewData['computer']->getCpu() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.ram') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="ram" value="{{ $viewData['computer']->getRam() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.gpu') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="gpu" value="{{ $viewData['computer']->getGpu() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.storage') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="storage" value="{{ $viewData['computer']->getStorage() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.image') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input class="form-control" type="file" name="image">
            </div>
          </div>
        </div>
        <div class="col">
          &nbsp;
        </div>
      </div>

      <fieldset>
        <div class="mb-3">
          <label for="categories">{{ __('admin.categories') }}:</label><br>
          @foreach($viewData["categories"] as $category)
            @if(in_array($category->getName(), $viewData['categoryNames']))
              <input type="checkbox" checked name="categories[]" value="{{ $category->getName() }}"> {{ $category->getName() }}<br/>
            @else
              <input type="checkbox" name="categories[]" value="{{ $category->getName() }}"> {{ $category->getName() }}<br/>
            @endif
          @endforeach
        </div>
      </fieldset>

      <button type="submit" class="btn btn-primary">{{ __('admin.edit') }}</button>
    </form>
  </div>
</div>
@endsection