@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Escolas</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    var vue = new Vue({
        el: '#app',
        data: {
            isLoading: false
        }
    });
</script>
@endsection
