@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <form method="POST" action="{{ route('notes.destroy') }}">
                @csrf
                <input type='hidden' name='id' value='{{ $note->id }}'>
                <button type="submit" class="btn btn-danger">
                    DELETE
                </button>
            </form> --}}
            <a href="{{ route('notes.index') }}" style="text-decoration: none;">Back to my notes</a>
            <div class="card">
                <div class="card-header">{{ __('Edit note') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('notes.update') }}">
                        @csrf
                        <input type='hidden' name='id' value='{{ $note->id }}'>
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $note->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" rows="5">{{ $note->description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    SAVE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
