@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-12 max-w-4xl">
      <h2 class="text-3xl font-bold mb-6 text-center">Subject Details</h2>

      <!-- Subject Info -->
      <div class="bg-white shadow p-6 rounded-xl mb-10">
        <p><strong>Subject Name:</strong> {{ $subject->name }}</p>
        <p><strong>Description:</strong> {{ $subject->description}}</p>
        <p><strong>Subject Code:</strong> {{$subject->subject_code}}</p>
        <p><strong>Credit Value:</strong> {{$subject->credit}}</p>
        <p><strong>Date of Creation:</strong> {{ $subject->created_at->format('Y-m-d') }}</p>
        <p><strong>Last Modified:</strong> {{ $subject->updated_at->format('Y-m-d') }}</p>
        <p><strong>Number of Students:</strong> {{ $students->count() }}</p>
      </div>

      <!-- Student List -->
      <div class="bg-white shadow p-6 rounded-xl mb-10">
        <h3 class="text-xl font-semibold mb-4">Enrolled Students</h3>
        <ul class="list-disc list-inside space-y-2">
          @foreach($students as $student)
            <li><strong>{{$student->name}}</strong> – {{ $student->email }}</li>
          @endforeach
        </ul>
      </div>

      <!-- Task List -->
      <div class="bg-white shadow p-6 rounded-xl mb-10">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-xl font-semibold">Task List</h3>
          <a href="{{route('subject.tasks.create', ['subject' => $subject->id])}}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Create New Task</a>
        </div>
        <table class="w-full text-left border">
          <thead class="bg-gray-100">
            <tr>
              <th class="py-2 px-4 border-b">Task Name</th>
              <th class="py-2 px-4 border-b">Points</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tasks as $task)
              <tr class="hover:bg-gray-50">
                <td class="py-2 px-4 border-b">
                  <a href="{{route('tasks.show', ['task' => $task->id])}}" class="text-blue-600 hover:underline">{{ $task->name }}</a>
                </td>
                <td class="py-2 px-4 border-b"> {{ $task->points }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{route('subject.subedit', ['subject' => $subject->id])}}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition text-center">
          Edit Subject
        </a>
        <form action="{{route('subject.subdelete', ['subject' => $subject->id])}}" method="post">
          @csrf
          @method("delete")
          <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition text-center">
            Delete Subject
          </button>
        </form>
      </div>

    </section>
  </main>

@endsection