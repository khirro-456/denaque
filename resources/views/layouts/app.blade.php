<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            margin: 0;
            position: relative;
            overflow-x: hidden;
        }

        /* Slideshow container styling */
        #slideshow-container {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
        }

        /* Each slide image styling */
        #slideshow-container .slide {
            position: absolute;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1s ease;
        }

        /* Active slide */
        #slideshow-container .slide.active {
            opacity: 1;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 6rem;
            position: relative;
            z-index: 1; /* Make sure container is above slideshow */
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            padding: 2rem;
            margin: 1rem 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .form-input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            margin-bottom: 1rem;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background-color: #f0fff4;
            border: 1px solid #9ae6b4;
            color: #276749;
        }

        .alert-error {
            background-color: #fed7d7;
            border: 1px solid #feb2b2;
            color: #c53030;
        }
    </style>
</head>
<body>
    <!-- Background Slideshow -->
    <div id="slideshow-container">
        <img src="/images/bg1.jpg" class="slide active" alt="Background Image 1" />
        <img src="/images/bg2.jpg" class="slide" alt="Background Image 2" />
        <img src="/images/bg3.jpg" class="slide" alt="Background Image 3" />
        <img src="/images/bg4.jpg" class="slide" alt="Background Image 4" />
    </div>

    <div class="container">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
