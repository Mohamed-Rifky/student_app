@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('changePasswordSave') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">Current Password</label>
                                <input type="password" name="current-password"
                                       class="form-control @error('current-password') is-invalid @enderror"
                                       id="current-password"
                                       placeholder="Current Password" value="{{ old('current-password') }}">
                                @error('current-password')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">New Password</label>
                                <input type="password" name="new-password"
                                       class="form-control @error('new-password') is-invalid @enderror"
                                       id="new-password"
                                       placeholder="New Password" value="{{ old('new-password') }}">
                                @error('new-password')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">New Confrim Password</label>
                                <input type="password" name="new-password-confirm"
                                       class="form-control @error('new-password-confirm') is-invalid @enderror"
                                       id="new-password-confirm"
                                       placeholder="New Confrim Password" value="{{ old('new-password-confirm') }}">
                                @error('new-password-confirm')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>


                            <button class="btn btn-primary float-right" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
