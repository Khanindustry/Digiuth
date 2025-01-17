@extends('layouts.app')

@section('title', __('third.forgot_password'))

@section('content')
    <section class="form-section">
        <form class="digiuth_form pt-80" id="reset_password" action="{{ route('reset.password.get', $token) }}"
              method="POST">
            @csrf
            @if(\Illuminate\Support\Facades\Lang::has('third.reset_password.msg'))
                <p>
                    {{ __('third.reset_password.msg') }}
                </p>
            @else
                <p></p>
            @endif
            <div class="form-group">
                <input class="form-control" type="password" name="password" id="password"
                       placeholder="{{ __('third.password') }}">
                <span class="show-password">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="d-none" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                    </svg>
                </span>
            </div>

            <div class="form-group">
                <input class="form-control input2" type="password" name="password_confirmation" id="password"
                       placeholder="{{ __('third.repassword') }}">
            </div>

            <div class="error-message">
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            @if(\Illuminate\Support\Facades\Lang::has('third.submit'))
                <div class="form-btns">
                    <button type="submit" class="btn-c">{{ __('third.submit') }}</button>
                </div>
            @endif
        </form>
    </section>
@endsection
@section('js')
    <script>
        $('.show-password').on('click', function () {
            let type = $('#password').attr('type')
            if (type === 'password') {
                $('.show-password svg:first').addClass('d-none')
                $('.show-password svg:last').removeClass('d-none')
                $('.input2').attr("type", 'text')
            } else {
                $('.show-password svg:last').addClass('d-none')
                $('.show-password svg:first').removeClass('d-none')
                $('.input2').attr("type", 'password')
            }

            $('#password').attr('type', type === 'password' ? 'text' : 'password')
        })
    </script>
@endsection