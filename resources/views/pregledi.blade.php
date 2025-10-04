@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <livewire:pregledi-table :idpacijenta="$idpacijenta" />
</div>
@endsection

