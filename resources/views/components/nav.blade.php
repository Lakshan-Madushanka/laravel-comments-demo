@php use Illuminate\Support\Facades\Auth; @endphp
<ul class="bg-black text-white p-4 flex justify-center items-center gap-x-4">
    <li
        @class([
            "hover:bg-gray-500 p-1 rounded transition",
             'bg-gray-500' => url()->current() === route('posts.show', ['post' => 1]),
        ])
    >
        <a href="{{route('posts.show', ['post' => 1])}}">Guest Mode</a>
    </li>
    <li class="h-6 w-[2px] bg-white"></li>
    <li
        @class([
            "hover:bg-gray-500 p-1 rounded transition",
             'bg-gray-500' => url()->current() === route('secure.posts.show', ['post' => 1]),
        ])
    >
        <a href="{{route('secure.posts.show', ['post' => 1])}}">Secure Guest Mode</a>
    </li>
    <li class="h-6 w-[2px] bg-white"></li>
    <li
        @class([
            "hover:bg-gray-500 p-1 rounded transition",
             'bg-gray-500' => url()->current() === route('articles.show', ['article' => 1]),
        ])
    >
        <a href="{{route('articles.show', ['article' => 1])}}">Auth Mode</a>
    </li>
    <li class="h-6 w-[2px] bg-white"></li>

    <li
        @class([
            "hover:bg-gray-500 p-1 rounded transition",
             'bg-gray-500' => url()->current() === route('admin'),
        ])
    >
        <a href="{{route('admin')}}">Admin Panel</a>
    </li>

    @if(Auth::check())
        <li class="h-6 w-[2px] bg-white"></li>

        <li>
            <form action="{{route('logout')}}" method="POST">
                <button>Logout</button>
            </form>
        </li>
    @endif
</ul>
