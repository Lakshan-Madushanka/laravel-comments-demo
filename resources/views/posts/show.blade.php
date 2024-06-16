<x-layout>
{{--    <div class="mb-10">--}}
{{--        <h1 class="mb-4 font-bold text-2xl">{{$post->title}}</h1>--}}
{{--        <div>--}}
{{--            {{$post->text}}--}}
{{--        </div>--}}
{{--    </div>--}}

    <x-comments::index :model="$post" />

</x-layout>
