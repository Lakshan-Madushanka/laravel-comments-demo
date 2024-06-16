<x-layout>
    <div class="mb-10">
        <h1 class="mb-4 font-bold text-2xl">{{$article->title}}</h1>
        <div>
            {{$article->text}}
        </div>
    </div>

    <x-comments::index :model="$article" />

</x-layout>
