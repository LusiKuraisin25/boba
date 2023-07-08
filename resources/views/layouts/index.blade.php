<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation&family=Pacifico&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Patrick+Hand&display=swap" rel="stylesheet">

     {{-- <link rel="stylesheet" href="{{ url('') }}/assets/all.min.css"> --}}

    <!-- Scripts -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/TextPlugin.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
          body {
               overflow-x: hidden;
          }
          .boba {
               font-family: 'Pacifico', cursive;
               text-shadow: 0 10px 3px grey;
          }
          .store{
               font-family: 'Edu NSW ACT Foundation', cursive;
          }

          .harga {
               font-family: 'Permanent Marker', cursive;
          }

          .product {
               font-family: 'Pacifico', cursive;
          }

          .patrick {
               font-family: 'Patrick Hand', cursive;
          }
    </style>
</head>
<body class="h-full">
    <x-navbar-boba></x-navbar-boba>
    <main>
     {{ $slot }}
</main>
<x-footer></x-footer>
     <script>
          const changeText = (id) => {
               $(`#${id}`).html('<i class="fas fa-check"></i>')
          }
     </script>
</body>
</html>