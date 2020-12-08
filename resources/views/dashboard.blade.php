<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse container" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('welcome') }}">Welcome <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route("article") }}">article</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route("backoffice") }}">Back Office</a>
            </li>
            
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class=" btn btn-danger underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Logout') }}
                    </button>
                </form>
            </li>
            
        </div>
      </nav>
</header>
<link rel="stylesheet" href="{{ asset("css/app.css") }}">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
