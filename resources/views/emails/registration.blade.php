@php
    $sitedetails = \App\Models\SiteSetting::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Booking - New User Registration</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-3xl mx-auto p-10 bg-white shadow-2xl rounded-3xl relative">
    <!-- Header Section -->
    <div class="text-center mb-10">
      <img src="{{asset('admin/siteImage/logo/' . $sitedetails->logo)}}" alt="logo" class="w-24 h-24 mx-auto mb-4">
      <h2 class="text-3xl font-bold text-gray-800 animate-fade-in">Welcome to {{ $sitedetails->site_title ?? 'Our Hostel' }}</h2>
      <p class="text-gray-600 mt-2">Your perfect stay, just one step away!</p>
    </div>

    <!-- User Info Section -->
    <div class="bg-gray-50 p-6 rounded-xl space-y-6 animate-slide-up">
      <div>
        <h3 class="text-xl font-semibold text-gray-700">User Information</h3>
        <p><span class="font-medium">Name:</span> {{ $data['name'] }}</p>
        <p><span class="font-medium">Email:</span> {{ $data['email'] }}</p>
        <p><span class="font-medium">Phone:</span> {{ $data['phone'] }}</p>
        <p><span class="font-medium">Message:</span> {{ $data['message'] }}</p>
      </div>

      @if(isset($data['subject']))
      <div>
        <p><span class="font-medium">Subject:</span> {{ $data['subject'] }}</p>
      </div>
      @endif

      @if(isset($data['check_in']) && isset($data['check_out']))
      <div>
        <h3 class="text-xl font-semibold text-gray-700">Booking Information</h3>
        <p><span class="font-medium">Check-in:</span> {{ $data['check_in'] }}</p>
        <p><span class="font-medium">Check-out:</span> {{ $data['check_out'] }}</p>
      </div>
      @endif
    </div>
  </div>

  <!-- Animation Script -->
  <script>
    gsap.from(".animate-slide-up", { duration: 1, y: 50, opacity: 0 });
    gsap.from(".animate-fade-in", { duration: 1.2, opacity: 0, delay: 0.3 });
  </script>
</body>
</html>
