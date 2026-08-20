@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-12 max-w-4xl">
      <h2 class="text-3xl font-bold mb-6 text-center">Task Details</h2>

      <!-- Task Info -->
      <div class="bg-white shadow p-6 rounded-xl mb-10">
        <p><strong>Task Name:</strong> {{ $task->name }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Points:</strong> {{ $task->points }}</p>
        <p><strong>Number of Submitted Solutions:</strong> 5</p>
        <p><strong>Number of Evaluated Solutions:</strong> 3</p>
        <div class="text-center mt-6">
          <a href="{{route('tasks.edit', ['task' => $task->id])}}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            Edit Task
          </a>
        </div>
      </div>

      <!-- Submitted Solutions List -->
      <div class="bg-white shadow p-6 rounded-xl">
        <h3 class="text-2xl font-semibold mb-4">Submitted Solutions</h3>
        <table class="w-full text-left border">
          <thead class="bg-gray-100">
            <tr>
              <th class="py-2 px-4 border-b">Date of Submission</th>
              <th class="py-2 px-4 border-b">Name</th>
              <th class="py-2 px-4 border-b">Email</th>
              <th class="py-2 px-4 border-b">Earned Points</th>
              <th class="py-2 px-4 border-b">Evaluation Time</th>
              <th class="py-2 px-4 border-b">Evaluate</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($solutions as $solution)
            <tr class="hover:bg-gray-50">
            <td class="py-2 px-4 border-b">{{ $solution->updated_at->format('Y-m-d') }}</td>
            <td class="py-2 px-4 border-b">{{ $solution->user->name }}</td>
            <td class="py-2 px-4 border-b">{{ $solution->user->email }}</td>
            <td class="py-2 px-4 border-b">{{ $solution->grade }}</td>
            <td class="py-2 px-4 border-b">{{ $solution->updated_at->format('H:i') }}</td> 
              <td class="py-2 px-4 border-b">
                <a href="{{route('solutions.edit', ['solution' => $solution->id])}}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                  Evaluate
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </main>
@endsection