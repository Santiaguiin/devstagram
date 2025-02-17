<div>
    @if ($posts->count())

    <div class="grid md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-6">
        @foreach ( $posts as $post)
            <div>
                <a href="{{route('posts.show', ['post' => $post, 'user' => $post->user])}}">
                    <img class="rounded-lg" src="{{asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                </a>
            </div>
        @endforeach
    </div>

    <div class="my-10">
        {{ $posts->links('pagination::tailwind') }}
    </div>

    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts, sigue a alguien para ver sus publicaciones</p>
    @endif
</div>