@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 max-w-4xl">
      <h2 class="text-2xl font-bold mb-6 text-center">Your Subjects</h2>

      <!-- List of Subjects Taken -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        
        <!-- Example Subject Card -->
        @foreach ($subjects as $subject)
          <div class="bg-white shadow-lg p-6 rounded-xl">
            <h3 class="text-xl font-semibold text-blue-600 mb-4">
              <a href="{{ route('student.subdetails', $subject->id) }}" class="hover:underline">
                {{ $subject->name }}
              </a>
            </h3>
            <p class="mb-2"><strong>Description:</strong> {{ $subject->description }}</p>
            <p class="mb-2"><strong>Subject Code:</strong> {{ $subject->subject_code }}</p>
            <p class="mb-2"><strong>Credit Value:</strong> {{ $subject->credit }}</p>
            <p class="mb-4"><strong>Teacher's Name:</strong> {{ $subject->teacher->name }}</p>

            <form method="POST" action="{{ route('student.subjects.leave', $subject->id) }}">
              @csrf
              <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition text-sm">
                Leave Subject
              </button>
            </form>
          </div>
        @endforeach

        <!-- More Subject Cards can be added here -->

      </div>

      <!-- Take New Subject Button -->
      <div class="text-center mt-8">
        <a href="{{route('student.takesub')}}" class="bg-green-600 text-white px-8 py-4 text-lg rounded-lg hover:bg-green-700 transition w-full">
          Take a New Subject
        </a>
      </div>

    </section>
  </main>
@endsection