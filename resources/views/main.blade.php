<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EduConnect</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold text-blue-600">EduConnect</h1>
      <div class="space-x-4">
        <a href="{{route('login')}}" class="text-blue-600 hover:underline">Login</a>
        <a href="{{route('register')}}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Register</a>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="flex-grow">
    <section class="container mx-auto px-4 py-16 text-center">
      <h2 class="text-3xl font-bold mb-4">Empowering Teachers. Engaging Students.</h2>
      <p class="text-lg text-gray-700 max-w-2xl mx-auto">
        EduConnect is a seamless platform that bridges the gap between teachers and students. With tools for task management, progress tracking, and direct interaction, teachers can create a more dynamic and personalized learning environment. Whether it’s assigning homework, posting announcements, or evaluating performance, EduConnect simplifies every step.
      </p>
    </section>
  </main>

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
