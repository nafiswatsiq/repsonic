@extends('layouts.dashboard')

@section('content')

<div class="w-full px-6 mx-auto">
  <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%">
    <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-purple-700 to-pink-500 opacity-60"></span>
  </div>
  <div x-data="{ changeProfile: false, changePass: false }" class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-auto max-w-full px-3">
        <div class="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
          <img src="{{ auth()->user()->getFirstMediaUrl('avatar', 'thumb') }}" onError="this.onerror=null;this.src='{{ asset('assets/img/bruce-mars.jpg') }}'" alt="profile_image" class="w-full shadow-soft-sm rounded-xl" />
        </div>
      </div>
      <div class="flex-none w-auto max-w-full px-3 my-auto">
        <div class="h-full">
          <h5 class="mb-1">{{ auth()->user()->name }}</h5>
          <p class="mb-0 font-semibold leading-normal text-sm">Email: {{ auth()->user()->email }}</p>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
        <div class="relative right-0">
          <ul class="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl" nav-pills role="tablist">
            <li class="z-30 flex-auto text-center">
              <a x-on:click="changeProfile = ! changeProfile" class="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                <i class="mr-1 fa fa-user opacity-60"></i>
                <span class="ml-1">Edit Profile</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    @if ($errors->any())
    <div class="">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-600">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div x-show="changeProfile">
      <div class="my-6 bg-gray-50 p-6 rounded-xl">
        <div class="flex-auto p-6">
          <form action="{{ route('update-profile') }}" role="form" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">New Name</label>
            <div class="mb-4">
              <input type="text" name="name" value="{{ auth()->user()->name }}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Name" aria-label="Email" aria-describedby="email-addon" />
            </div>
            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">New Email</label>
            <div class="mb-4">
              <input type="email" name="email" value="{{ auth()->user()->email }}" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Password" aria-describedby="password-addon" />
            </div>
            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">New Password</label>
            <div class="mb-4">
              <input name="password" type="password" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Email" aria-describedby="email-addon" />
            </div>
            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Confirm Password</label>
            <div class="mb-4">
              <input name="confirmpass" type="password" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon" />
            </div>
            <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Profile</label>
            <div class="mb-4">
              <input type="file" name="avatar" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Profile" aria-label="Password" aria-describedby="password-addon" />
            </div>
            <div class="text-left">
              <button type="submit" class="inline-block px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

