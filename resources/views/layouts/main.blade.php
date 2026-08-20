<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Teacher Menu - EduConnect</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600">EduConnect</h1>
      <form action="{{route('logout')}}" method="post">
          @csrf
          <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition text-center">
            Logout
          </button>
      </form>
    </div>
  </nav>

    @yield("content")

  <!-- Footer -->
  <footer class="bg-white border-t p-4 mt-8">
    <div class="container mx-auto text-center text-sm text-gray-600">
      <p><strong>Contact:</strong></p>
      <p>Name: Robert Marton</p>
      <p>Code: AY3VBL</p>
      <p>Email: robertmarton34@gmail.com</p>
    </div>
  </footer>

</body>
</html>