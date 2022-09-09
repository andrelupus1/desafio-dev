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
    @if( session()->get('operacao'))
    <div>
      <form method="GET" action = "{{ route('exibirOperacoes') }}" id = "form" enctype = "multipart/form-data">
        @csrf
        <div>
          <div class="input-group">
            <input type = "search" name = "loja" placeholder="Pesquisar loja...">
            <input type="submit" value="Search" >
          </div>
    </div>
    </form>
    </div>
    @endif
    
    
  </div>
  
@endsection