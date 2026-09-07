<html>
 <head>
    <title></title>
 </head>   
<body>
    <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>

        {{-- Meta Info --}}
        <div class="text-sm text-gray-500 mb-6">
            Published <time>{{ $post->created_at->diffForHumans() }}</time>
        </div>

        {{-- Image --}}
        @if($post->thumbnail)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="rounded-xl w-full max-h-96 object-cover">
            </div>
        @endif

        {{-- Body Content (Form Textarea Data) --}}
        <div class="prose max-w-none text-gray-800 leading-relaxed text-lg space-y-4">
            {!! $post->body !!}
        </div>

        {{-- Back Button --}}
        <div class="mt-8">
            <a href="/" class="text-blue-500 hover:underline">&larr; Back to Posts</a>
        </div>
</body>    
</html>    