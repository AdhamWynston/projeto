@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection
