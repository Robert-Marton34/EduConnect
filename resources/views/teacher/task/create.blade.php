@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 max-w-xl">
      <h2 class="text-2xl font-bold mb-8 text-center">Create New Task</h2>
      <form action="{{ route('subject.tasks.store', ['subject' => $subject->id])}}" method="post" class="space-y-6">
        @csrf
        <!-- Task Name -->
        <div>
          <label class="block font-medium mb-1" for="task-name">Task Name</label>
          <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value = "{{ old('name', ' ')}}">
          @error('name')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <!-- Task Description -->
        <div>
          <label class="block font-medium mb-1" for="task-description">Task Description</label>
          <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', ' ')}}</textarea>
          @error('description')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <!-- Points -->
        <div>
          <label class="block font-medium mb-1" for="points">Points</label>
          <input type="number" id="points" name="points" min="1" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
          value = "{{ old('points', ' ')}}">
          @error('points')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <!-- Confirm Button -->
        <div class="text-center">
          <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
            Create Task
          </button>
        </div>

      </form>
    </section>
  </main>
@endsection