@extends('layouts.app')
@section('content')
<img src="/storage/{{$avatar}}" alt="Avatar">
<form action="profile/store" method="POST" id="updateImage" enctype="multipart/form-data">
        @csrf
        <input type="file" name="imageUpload" class="form-control @error ('imageUpload') is-invalid @enderror" />
        @error('imageUpload')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="submit" value="Subir foto">
</form>
@stop