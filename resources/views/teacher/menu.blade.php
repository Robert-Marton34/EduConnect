@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 text-center">
      <h2 class="text-2xl font-bold mb-10">Teacher Dashboard</h2>
      <div class="flex justify-center gap-8 flex-wrap">
        <a href="{{route('teacher.homepage')}}" class="bg-blue-600 text-white w-64 h-24 flex items-center justify-center text-xl font-medium rounded-xl shadow hover:bg-blue-700 transition">
          My Subjects
        </a>
        <a href="{{route('subject.newsub')}}" class="bg-green-600 text-white w-64 h-24 flex items-center justify-center text-xl font-medium rounded-xl shadow hover:bg-green-700 transition">
          New Subject
        </a>
      </div>
    </section>
  </main>
@endsection