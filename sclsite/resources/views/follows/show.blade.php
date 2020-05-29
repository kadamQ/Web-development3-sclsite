@extends('_layout.master')

@section('content')
<div class="d-flex">
    <div class="col-8 mx-auto">
    @foreach($posts as $post)
        @include('posts._item')
     @endforeach
    </div>
</div>
@endsection