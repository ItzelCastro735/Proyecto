<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="form-group col-md-12 mb-5">
            <label for="">Photo</label>
            <div class="avatar-upload">
                <div>
                    <input type="file" id="imageUpload" name="photo" accept=".png, .jpg, .jpeg" onchange="previewImage(this)"/>
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url('{{ url('/img/avatar.png')}}')"></div>
            </div>
            @error("photo")
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <script type="text/javascript">
            function previewImage(input) {
                if (input.file && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = functiom(e){
                        $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                        $("#imagePreview").hide();
                        $("#imagePreview").fadeIn(700);
                    }
                    reader.reaAsDataURL(input.files[0]);
                }
            }
    </form>
</x-guest-layout>

<style>
    .avatar-upload {
        position: relative;
        max-widht: 205px;
    }

    .avatar-upload .avatar-preview{
        widht: 67%;
        height: 147px;
        position: relative;
        border-radius: 3%;
        border: 6px solid #F8F8F8;
    }

    .avatar-upload .avatar-preview>div{
        widht: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

</style>