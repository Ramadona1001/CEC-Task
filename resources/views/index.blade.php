@extends('layouts.master')

@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            
          @include('components.filter')

          @include('components.products')
            
            

        </div>
    </div>
@endsection