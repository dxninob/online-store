@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    {{ __('admin.computer.index.createComputer') }}
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.computer.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.name') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ old('name') }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.price') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ old('price') }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.cpu') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="cpu" value="{{ old('cpu') }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.ram') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="ram" value="{{ old('ram') }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.gpu') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="gpu" value="{{ old('gpu') }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{ __('admin.storage') }}:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="storage" value="{{ old('storage') }}" type="number" class="form-control">
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
            <input type="checkbox" name="categories[]" value="{{ $category->getName() }}"> {{ $category->getName() }}<br />
          @endforeach
        </div>        
      </fieldset>

      <button type="submit" class="btn btn-primary">{{ __('admin.submit') }}</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    {{ __('admin.computer.index.manageComputers') }}
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">{{ __('admin.id') }}</th>
          <th scope="col">{{ __('admin.name') }}</th>
          <th scope="col">{{ __('admin.edit') }}</th>
          <th scope="col">{{ __('admin.delete') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["computers"] as $computer)
        <tr>
          <td>{{ $computer->getId() }}</td>
          <td>{{ $computer->getName() }}</td>
          <td>
            <a class="btn btn-primary" href="{{route('admin.computer.edit', ['id'=> $computer->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.computer.delete', $computer->getId())}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
