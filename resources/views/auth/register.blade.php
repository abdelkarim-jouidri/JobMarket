@extends('layouts.auth')

@section('content')
    <div class="shadow-md rounded-md bg-white relative mt-8">
            <div class="w-24 rounded-full border-black h-24 border-1 bg-[#000] flex justify-center items-center absolute -top-12   left-[50%] -translate-x-[50%]">
                <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                </svg>
            
            </div>
            <div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8 ">
                <div class="w-full max-w-md space-y-8 ">
                
                    <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create your account and join us</h2>

                    <form class="mt-8 " action="/register" method="POST">
                        @csrf
                        
                        <input type="hidden" name="remember" value="true">
                        <div class="-space-y-px rounded-md shadow-sm flex flex-col gap-5">
                            <div class="flex gap-4 items-center justify-center ">
                                <span class=" font-bold mr-2 text-[#3b82f6] " id="candidate">Candidat</span>
                                <input type="checkbox" name="original_checkbox" id="check" value="candidate" class="hidden peer">
                                <input type="hidden" name="checkbox" value="candidate" id="check2">
                                <!-- <input type="checkbox" class="focus:outline peer hidden " name="account-type" value="type" id="check"> -->
                                <label for="check" class="relative flex items-center text-[40px] peer-checked:text-red-600 
                                                before:content-[''] before:w-[1.1em] before:h-[.3em] before:bg-[#dbeafe] 
                                                before:rounded-[1em]  after:content-[''] after:w-[.5em] after:-left-[.3em]
                                                after:h-[.5em] after:bg-[#3b82f6] after:rounded-[.7em]  after:absolute 
                                                peer-checked:after:bg-[#3b82f6] peer-checked:after:translate-x-[230%] 
                                                before:transition-[1s] after:transition-[1s]
                                                ">
                                                
                                </label>
                                <span class=" font-bold text-[#ddd] " id="Recruteur">Recruteur</span>

                            </div>
                            <div>
                                <label for="email-address" class="sr-only">Full Name</label>
                                <input id="full-name" name="fullname" type="text" value="{{old('fullname')}}" class="relative block w-full rounded-md border-2 border-black-600 py-1.5 text-gray-900  placeholder:text-gray-400 focus:z-10 focus:ring-1 ring-inset focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" placeholder="Full name">
                                @error('fullname')
                                <span class="text-red-700 text-xs">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="email-address" class="sr-only">Email address</label>
                                <input id="email-address" name="email" type="email" autocomplete="email" value="{{old('email')}}"  class="relative block w-full rounded-md border-2 border-black-600 py-1.5 text-gray-900  placeholder:text-gray-400 focus:z-10 focus:ring-1 ring-inset focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" placeholder="Email address">
                                @error('email')
                                <span class="text-red-700 text-xs">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="sr-only">Password</label>
                                <input id="password" name="password" type="password" autocomplete="current-password"  class="relative block w-full rounded-md border-2 border-black-600 py-1.5 text-gray-900  placeholder:text-gray-400 focus:z-10 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" placeholder="Password">
                                @error('password')
                                <span class="text-red-700 text-xs">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="sr-only">Confirm Password</label>
                                <input id="password-confirmation" name="password_confirmation" type="password"   class="relative block w-full rounded-md border-2 border-black-600 py-1.5 text-gray-900  placeholder:text-gray-400 focus:z-10 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" placeholder="Password confirmation">
                            </div>
                        </div>

                    

                        <div class="flex flex-col gap-1">
                            <div>
                                <button type="submit" class="mt-2 group relative flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-bg-blue-400">
                                
                                Register
                                </button>
                            </div>
                            <div class="flex justify-center items-center  text-slate-300 text-lg" id="divider">
                                <hr class="border-t-1  border-slate-300  grow">
                                <span>
                                    or
                                </span>
                                <hr class="border-t-1  border-slate-300 grow">

                            </div>
                            <div>
                                <button type="submit" class="group relative flex w-full justify-center rounded-md bg-sky-400 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                
                                Signin here
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection