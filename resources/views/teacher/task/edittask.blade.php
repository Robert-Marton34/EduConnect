@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 max-w-xl">
      <h2 class="text-2xl font-bold mb-8 text-center">Edit Task</h2>
      <form class="space-y-6" action="{{route('tasks.update', ['task' => $task->id])}}" method="post">
        @csrf
        @method("put")
        
        <!-- Task Name -->
        <div>
          <label class="block font-medium mb-1" for="task-name">Task Name</label>
          <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" value = "{{ old('name', $task)}}">
          @error('name')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <!-- Task Description -->
        <div>
          <label class="block font-medium mb-1" for="task-description">Task Description</label>
          <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task)}}</textarea>
          @error('description')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <!-- Points -->
        <div>
          <label class="block font-medium mb-1" for="points">Points</label>
          <input type="number" id="points" name="points" min="1" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" value = "{{ old('points', $task)}}">
          @error('points')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <!-- Confirm Button -->
        <div class="text-center">
          <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition">
            Save Changes
          </button>
        </div>

      </form>
    </section>
  </main>
@endsection