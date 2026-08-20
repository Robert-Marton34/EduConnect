@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 max-w-4xl">

      <!-- Task Submission Form -->
      <div class="bg-white shadow-lg p-6 rounded-xl mb-8">
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">Submit a Task</h2>

        <!-- Task Information -->
        <p><strong>Subject Name:</strong> {{ $subject->name }}</p>
        <p><strong>Teacher Name:</strong> {{ $teacher->name }}</p>
        <p><strong>Task Description:</strong> {{ $task->description }}</p>
        <p><strong>Points:</strong> {{ $task->points }}</p>

        <!-- Task Submission Form -->
        <form action="{{ route('student.submit_solution', $task->id) }}" method="POST" class="mt-6">
          @csrf
          <label for="task-description" class="block text-sm font-medium text-gray-700 mb-2">Task Solution</label>
          <textarea id="solution" name="solution" rows="6" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none" placeholder="Enter your solution here..." >{{ old('solution', $existingSolution->solution ?? '')}}</textarea>
          @error('solution')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
          
          <div class="mt-6 text-center">
              <button type="submit" class="bg-blue-600 text-white px-8 py-4 text-lg rounded-lg hover:bg-blue-700 transition">
                  Submit
              </button>
          </div>
      </form>
      </div>

    </section>
  </main>
@endsection