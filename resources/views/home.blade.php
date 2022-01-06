@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="m4">
                <a class="button btn btn-success" href="{{ route("notes.create") }}"><strong>+</strong> ADD</a>
            </div>
        </div>
        @if(!$notes->count())
        <div class="col-md-8 mt-5">
            <h3>It looks like you don't have any notes, why don't you create one?</h3>
        </div>
        @else
        <div class="col-md-8 mt-5">
            <h1 style="float:left;">Your notes</h1>
            <div class="d-flex justify-content-end">{{$notes->links('pagination::bootstrap-4')}}</div>
        </div>
        @endif
    </div>
    @foreach($notes AS $note)
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><strong>{{ $note->title }}</strong></h4> 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('notes.edit') }}">
                        @csrf
                        <input type='hidden' name='id' value='{{ $note->id }}'>
                        <div class="row mb-3">
                            <p>{{ $note->description }}</p>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            EDIT
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
