@extends('layouts.app')

@section('main')
<div class="wrapper">
    <form method="POST" action = "{{ route('execute') }}" id = "form" enctype = "multipart/form-data">
        @csrf

        <div class="file-upload">
        <input type = "file" name = "file" id = "file">
        <i class="fa fa-arrow-up"></i>
    </div>
    </form>

  </div>
@endsection