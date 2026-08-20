@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 max-w-4xl">

      <!-- Subject Details -->
      <div class="bg-white shadow-lg p-6 rounded-xl mb-8">
        <h2 class="text-2xl font-semibold text-blue-600 mb-4">Subject Details</h2>


        <p><strong>Subject Name:</strong> {{ $subject->name }}</p>
        <p><strong>Description:</strong> {{ $subject->description }}</p>
        <p><strong>Code:</strong> {{ $subject->subject_code }}</p>
        <p><strong>Credits:</strong> {{ $subject->credit }}</p>
        <p><strong>Created At:</strong> {{ $subject->created_at->format('Y-m-d') }}</p>
        <p><strong>Last Modification:</strong> {{ $subject->updated_at->format('Y-m-d') }}</p>
        <p><strong>Number of Assigned Students:</strong> {{ $subject->students->count() }}</p>
        <p><strong>Teacher Name:</strong> {{ $subject->teacher->name }}</p>
        <p><strong>Email:</strong> {{ $subject->teacher->email }}</p>
      </div>

      <!-- List of Students -->
      <div class="bg-white shadow-lg p-6 rounded-xl mb-8">
        <h3 class="text-xl font-semibold text-blue-600 mb-4">Students</h3>
        <table class="w-full table-auto border-collapse">
          <thead>
            <tr class="bg-gray-100">
              <th class="px-4 py-2 text-left">Name</th>
              <th class="px-4 py-2 text-left">Email</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($subject->students as $student)
            <tr>
              <td class="px-4 py-2">{{ $student->name }}</td>
              <td class="px-4 py-2">{{ $student->email }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>

      <!-- List of Tasks -->
      <div class="bg-white shadow-lg p-6 rounded-xl mb-8">
        <h3 class="text-xl font-semibold text-blue-600 mb-4">Tasks</h3>
        <table class="w-full table-auto border-collapse">
          <thead>
            <tr class="bg-gray-100">
              <th class="px-4 py-2 text-left">Task Name</th>
              <th class="px-4 py-2 text-left">Points</th>
              <th class="px-4 py-2 text-left">Submitted</th>
              <th class="px-4 py-2 text-left">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $task)
              <tr>
                <td class="px-4 py-2">{{ $task->name }}</td>
                <td class="px-4 py-2">{{ $task->points }}</td>
                <td class="px-4 py-2">
                  @if ($task->solutions->where('user_id', auth()->id())->first())
                    Yes
                  @else
                    No
                  @endif
                </td>
                <td class="px-4 py-2">
                  <a href="{{ route('student.submit-solution', $task->id) }}">
                      <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm">
                        Submit Task
                      </button>
                    </a>
                    
                </td>
              </tr>
            @endforeach
            <!-- More task rows can be added here -->
          </tbody>
        </table>
      </div>

    </section>
  </main>
@endsection