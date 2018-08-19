@extends('layouts.index')

@section('content')
<div class="container-fluid navbar-wrapper">
  <div class="container">
    <div class="row">
      <ul class="nav">
        <li class="nav-item">
          <img height="50px;" src="{{ asset('assets/logo.png') }}" alt="" class="nav-link">
        </li>
        <li class="nav-item justify-content-end">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col">
      <h3>VenciPro</h3>
    </div>
  </div>
</div>
@endsection
