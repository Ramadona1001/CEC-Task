<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('components.head')
 
<body>
<!-- partial:index.partial.html -->
@include('components.navbar')

@yield('content')

<!-- partial -->
 @include('components.scripts')
</body>

</html>
