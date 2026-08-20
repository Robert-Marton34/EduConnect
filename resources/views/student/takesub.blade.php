@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 max-w-4xl">
      <h2 class="text-2xl font-bold mb-6 text-center">Available Subjects</h2>

      <!-- List of Available Subjects -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

      @foreach($subjects as $subject)
        <div class="bg-white shadow-lg p-6 rounded-xl">
          <h3 class="text-xl font-semibold text-blue-600 mb-4">{{ $subject->name }}</h3>
          <p class="mb-2"><strong>Description:</strong> {{ $subject->description }}</p>
          <p class="mb-2"><strong>Credit Value:</strong> {{ $subject->credit }}</p>
          <p class="mb-4"><strong>Teacher's Name:</strong> {{ $subject->teacher->name }}</p>

          <form action="{{ route('student.subjects.enroll', $subject->id) }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition text-sm">
              Take Subject
            </button>
          </form>
        </div>
      @endforeach

      </div>

      <!-- Go to Homepage Button -->
      <div class="text-center mt-8">
        <a href="homepage" class="bg-blue-600 text-white px-8 py-4 text-lg rounded-lg hover:bg-blue-700 transition w-full">
          Go to Homepage
        </a>
      </div>

    </section>
  </main>
@endsection