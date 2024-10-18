<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISBN Application Form</title>
    <!-- Start CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/no-tailwind.css') }}" />

    <!-- <style>
        body ::selection {
            background-color: goldenrod; /* This is bg-blue-900 in Tailwind */
            color: white; /* This is text-white in Tailwind */
        }
    </style> -->

    <!-- end Start CSS -->

    <!-- Start JS -->
    <script src="{{ asset('assets/js/tailwind34.js') }}"></script>
    <script src="{{ asset('assets/js/darkModeHead.js') }}"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Moul&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Siemreap&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: "class", // Enables dark mode based on class
            theme: {
                extend: {
                    colors: {
                        clifford: "#da373d",
                        // primary: "#00aff0",
                        // primaryHover: "#0a9fd5",
                        primary: "{{ $websiteInfo->primary }}",
                        primaryHover: "{{ $websiteInfo->primary_hover }}",
                        bannerColor: "{{ $websiteInfo->banner_color }}",
                        warning: "#fab105",
                        warningHover: "#ffb915",
                    },
                },
                fontFamily: {
                    moul: [
                        "Moul", "Siemreap", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system",
                        "system-ui", "Segoe UI", "Helvetica Neue",
                    ],
                    siemreap: [
                        "Siemreap", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system", "system-ui",
                        "Segoe UI", "Helvetica Neue",
                    ],
                    poppins: [
                        "Poppins", "Roboto", "Arial", "Inter", "ui-sans-serif", "system-ui", "-apple-system",
                        "system-ui", "Segoe UI", "Helvetica Neue",
                    ],

                },
            },
        };
    </script>
    <script defer src="{{ asset('assets/js/darkMode.js') }}"></script>
    <!-- End JS -->

</head>

<body class="px-4 bg-gray-100">
    {{-- Start Language --}}
    <div class="items-end justify-between max-w-3xl gap-2 py-8 mx-auto md:flex">
        {{-- <div class="flex items-center gap-2">
            <div>
                <img class="object-contain w-24 p-1 aspect-square" src="{{ asset('assets/images/logo/nlclogo.png') }}" alt="">
            </div>
            <div class="flex flex-col pt-2">
                <p class="text-xl text-gray-700 font-moul">បណ្ណាល័យជាតិកម្ពុជា</p>
                <p class="font-semibold text-gray-500 text-md font-poppins">National Library of Cambodia</p>
                <p class="font-semibold text-gray-500 text-md font-poppins">Bibliothèque Nationale du Cambodge</p>
            </div>
        </div> --}}
        <div class="flex justify-start gap-1 mt-4">
            {{-- <a href="{{ route('switch-language', ['locale' => 'kh']) }}" type="button"
                class="{{ app()->getLocale() == 'kh' ? 'bg-gray-300' : '' }} inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer dark:text-white hover:bg-gray-300 dark:hover:bg-gray-200 dark:hover:text-white">
                <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/khmer.png') }}" alt="" />
            </a>
            <a href="{{ route('switch-language', ['locale' => 'en']) }}" type="button"
                class="{{ app()->getLocale() == 'en' ? 'bg-gray-300' : '' }} inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer  dark:text-white hover:bg-gray-300 dark:hover:bg-gray-300 dark:hover:text-white">
                <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/english.png') }}" alt="" />
            </a> --}}
            {{-- <a href="{{ route('switch-language', ['locale' => 'fr']) }}" type="button"
                class="{{ app()->getLocale() == 'fr' ? 'bg-gray-300' : '' }} inline-flex items-center justify-center p-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer  dark:text-white hover:bg-gray-300 dark:hover:bg-gray-300 dark:hover:text-white">
                <img class="w-5 h-5 rounded-full" src="{{ asset('assets/icons/france.png') }}" alt="" />
            </a> --}}
        </div>
    </div>
    {{-- End Language --}}
    <div class="max-w-3xl px-4 py-4 mx-auto mb-8 bg-white rounded-lg shadow">
        @yield('content')
    </div>
</body>

</html>
