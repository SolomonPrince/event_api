@props(['errors'])

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible " role="alert">
            {{$error}}
        </div>
    @endforeach
@endif
