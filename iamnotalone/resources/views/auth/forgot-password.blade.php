<x-guest-layout>
    <div class="container" style="justify-content: center;display: flex;padding-top: 168px;">
        <div class="row justify-content-center" style="--tw-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    box-shadow: tomato;
    padding-top: 14px;
    background-color: ghostwhite;">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="background-color: ghostwhite; max-width:425px">
                <div class="mb-4 text-sm text-gray-600" style="text-align: center;">
                    Forgot your password? No problem. Just let us know your email address and we will email you a
                    password reset link that will allow you to choose a new one.
                </div>
                
                <!-- Session Status -->
                @if (Session::has('status'))
                
                <div class="alert alert-success" role="alert" style="color: green;padding: 15px 68px;">
                    {{ Session::get('status') }}
                </div>
                @endif
                <!-- Validation Errors -->

                <form method="POST" action="{{ route('password.email') }}" style="padding: 20px;">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <label class="block font-medium text-sm text-gray-700" for="email" style="padding: 10px;">
                            Email
                        </label>

                        <input
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full form-control"
                            id="email" type="email" name="email" required="required" autofocus="autofocus" style="padding: 10px;width: 73%;">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4" style="padding: 26px 0px 0px 98px;">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" style="padding: 7px;">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
