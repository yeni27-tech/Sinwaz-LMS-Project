<?php

use App\Livewire\Auth\Components\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class=" absolute bottom-0 left-0 right-0 bg-slate-50 px-7 py-10 rounded-t-3xl flex flex-col gap-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class=" font-bold mb-4">
        <h1 class=" font-black text-3xl text-blue-500">Login</h1>
    </div>

    <form wire:submit="login" class=" rounded-2xl min-h-full h-full">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <div class=" flex justify-end w-full mt-1">
                @if (Route::has('password.request'))
                    <a class="underline text-sm  text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-3">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center gap-4 justify-end mt-3">
            <x-primary-button class=" text-sm bg-blue-500 rounded-full min-w-full text-center flex justify-center items-center py-3 font-bold ">
                {{ __('Login') }}
            </x-primary-button>

            <a href="{{ route('google.auth.login') }}" class=" min-w-full">
                <div class=" text-lg bg-slate-50 border border-blue-500 rounded-full min-w-full text-center flex flex-row justify-center items-center gap-3 py-3 font-bold ">
                    <x-icon.google class=" w-[40px] h-[40px] "/>

                    <h1 class="text-sm text-slate-900">Login with Google</h1>
                </div>
            </a>

            <div>
                <p class=" text-sm ">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
            </div>
        </div>
    </form>
</div>


{{-- <a href="{{ route('google.auth.login') }}">Login with Google</a> --}}
