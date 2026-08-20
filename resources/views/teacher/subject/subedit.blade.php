@extends("layouts.main")

@section("content")
<main class="flex-grow">
    <section class="container mx-auto px-4 py-16 max-w-xl">
      <h2 class="text-2xl font-bold mb-8 text-center">Edit Subject</h2>
      <form class="space-y-6" action="{{route('subject.subedit', ['subject' => $subject->id])}}" method="post">
        @csrf
        @method("put")

        <!-- Subject Name -->
        <div>
          <label class="block font-medium mb-1" for="subject-name">Subject Name</label>
          <input type="text" id="subject-name" name="name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" 
            value="{{ old('name', $subject) }}"/>
            @error('name')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div>
          <label class="block font-medium mb-1" for="description">Description</label>
          <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $subject) }}</textarea>
        </div>

        <!-- Subject Code -->
        <div>
          <label class="block font-medium mb-1" for="subject-code">Subject Code</label>
          <input type="text" id="subject-code" name="subject_code" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('subject_code', $subject) }}">
          @error('subject_code')
          <div class="text-red-500">{{ $message }}</div>
          @enderror
        </div>

        <!-- Credit Value -->
        <div>
          <label class="block font-medium mb-1" for="credit">Credit Value</label>
          <input type="number" id="credit" name="credit" min="1" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('credit', $subject) }}">
          @error('credit')
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