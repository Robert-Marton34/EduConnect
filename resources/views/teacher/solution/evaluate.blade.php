@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 max-w-xl">
      <h2 class="text-2xl font-bold mb-8 text-center">Evaluate Solution</h2>
      <form class="space-y-6" action="{{route('solutions.update', ['solution' => $solution->id])}}" method="post" >
        @csrf
        @method("put")
        <!-- Task Description -->
        <div>
          <label class="block font-medium mb-1" for="task-description">Task Description</label>
          <p id="task-description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>{{ old('description', $task->description) }}</p>
        </div>

        <!-- Solution -->
        <div>
          <label class="block font-medium mb-1" for="solution">Student's Solution</label>
          <p id="solution" name="solution" rows="6" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" readonly>{{ old('solution', $solution) }}</p>
        </div>

        <!-- Grade -->
        <div>
          <label class="block font-medium mb-1" for="grade">Grade</label>
          <input type="number" id="grade" name="grade" min="0" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" 
          value = "{{ old('grade', $solution)}}">
          @error('grade')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
            Submit Evaluation
          </button>
        </div>

      </form>
    </section>
  </main>
@endsection