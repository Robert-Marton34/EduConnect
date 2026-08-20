@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16">
      <h2 class="text-2xl font-bold mb-8 text-center">My Subjects</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Subject Cards with Clickable Titles -->
        @foreach($subjects as $subject)
          <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold mb-2">
              <a href="/teacher/subject/{{ $subject->id }}" class="text-blue-700 hover:underline">{{ $subject->name }}</a>
            </h3>
            <p class="text-gray-600 mb-2">{{ $subject->description }}</p>
            <p class="text-sm text-gray-500">Code: {{ $subject->subject_code }}</p>
            <p class="text-sm text-gray-500">Credits: {{ $subject->credit }}</p>
          </div>
        @endforeach 

      </div>
    </section>
  </main>
@endsection