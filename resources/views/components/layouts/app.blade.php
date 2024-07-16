<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @include('components.layouts.styles')
        <title>{{ $title ?? 'Laravel 10 Livewire User Registration and Login - AllPHPTricks.com' }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>

        <livewire:navbar/>
        <div class="container-fluid">
            <!-- <h3 class="mt-3 mb-5 text-center">Laravel 10 Livewire User Registration and Login - <a href="https://www.allphptricks.com/">AllPHPTricks.com</a></h3> -->

            @if (session()->has('message'))
                <div class="row justify-content-center text-center mt-3">
                    <div class="col-md-8">
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            @endif
        
            {{ $slot }}

            <!-- <div class="row justify-content-center text-center mt-3">
                <div class="col-md-12">
                    <p>Back to Tutorial: 
                        <a href="https://www.allphptricks.com/laravel-10-livewire-user-registration-and-login/"><strong>Tutorial Link</strong></a>
                    </p>
                    <p>
                        For More Web Development Tutorials Visit: <a href="https://www.allphptricks.com/"><strong>AllPHPTricks.com</strong></a>
                    </p>
                </div>
            </div> -->

        </div>
        <livewire:sidebar/>
            
        <script data-navigate-once src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>