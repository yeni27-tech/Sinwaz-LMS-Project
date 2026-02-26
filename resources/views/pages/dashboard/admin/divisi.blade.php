@extends('layouts.admin')

@section('content')
    <div class="p-6">
        <h1 class="text-xl font-semibold mb-4">Data Divisi</h1>
        <form action="{{ route('divisi.store') }}" method="post">
            @csrf
            <input type="text" name="name" id="">

            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
