@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.store') }}" method="post">
                @csrf
            @foreach($settings as $key => $setting)
                <div class="form-group">
                    <label for="app_name" class="text-capitalize">{{ str_replace('_',' ',$key) }}</label>
                    <input type="text" name="{{ $key  }}" class="form-control @error($key) is-invalid @enderror" id="{{ $key  }}"
                           placeholder="App name" value="{{ old($key, $setting) }}">
                    @error($key)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            @endforeach

                <button type="submit" class="btn btn-primary">Change Setting</button>
            </form>
        </div>
    </div>

@endsection
