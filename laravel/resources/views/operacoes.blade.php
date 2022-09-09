@extends('layouts.app')

@section('main')
<div class="wrapper">
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Cpf</th>
                <th>Carto</th>
                <th>Hora</th>
                <th>Dono</th>
                <th>Loja</th>
                <th>Descricao</th>
                <th>Natureza</th>
                <th>Sinal</th>
                <th>Saldo Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->tipo}}</td>
                    <td>{{ $item->data}}</td>
                    <td>{{ $item->valor}}</td>
                    <td>{{ $item->cpf}}</td>
                    <td>{{ $item->cartao}}</td>
                    <td>{{ $item->hora}}</td>
                    <td>{{ $item->dono}}</td>
                    <td>{{ $item->loja}}</td>
                    <td>{{ $item->descricao}}</td>
                    <td>{{ $item->natureza}}</td>
                    <td>{{ $item->sinal}}</td>
                    @if ($loop->last)
                        <td>{{ $saldo->total }}</td>
                        
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection