@extends('welcome')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="p-3">
    <form action="{{url('/add')}}" method="post" enctype="multipart/form-data">
        @csrf
        {{-- same name exist , this aterl massage will show --}}
        @if (session()->has('massage'))
        <div class="alert alert-primary" role="alert">            
            {{session()->get('massage')}}
        </div>
        @endif
        {{-- name --}}
        <div class="input-group mb-3 ">
            <span class="input-group-text" id="basic-addon1">Pdf Name</span>
            <input type="text" name="name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        {{-- pdf --}}
        <div class="input-group mb-3 ">
            <span class="input-group-text" id="basic-addon1">Pdf File</span>
            <input type="file" name="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>  
        {{-- submit button       --}}
        <div class="d-grid gap-2  mx-auto">
            <button class="btn btn-primary" type="submit">Add</button>        
        </div>
    </form>
</div>


@endsection
