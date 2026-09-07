<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }

    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
    .post{
        display: flex;
        column-gap: 20px;
    }
    .new{
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        border-radius: 10px;
       width: 100px;
       height: 38px;
       background-color: #007FFF; 
       margin-left: 10px;
        
    }
    .star-rating {
    display: flex;
    flex-direction: row-reverse; /* Left-to-right fill karne ke liye reversal */
    justify-content: center;
    gap: 4px;
}

/* Default hidden radio inputs */
.star-rating input[type="radio"] {
    display: none;
}

/* Default Star Icon Style */
.star-rating label {
    font-size: 32px;
    color: #ccc; /* Unselected Star Gray Color */
    cursor: pointer;
    transition: color 0.2s ease-in-out;
}

/* Hover over star & preceding stars */
.star-rating label:hover,
.star-rating label:hover ~ label {
    color: #ffc107; /* Gold Color */
}

/* Selected state (checked star & preceding stars) */
.star-rating input[type="radio"]:checked ~ label {
    color: #ffc107;
}
</style>

<body style="font-family: Open Sans, sans-serif">
    
    <section class="" style="margin-bottom: 15px;">
        <nav class="md:flex md:justify-between md:items-center mb-2"  >
            <div class="post">
                <a href="/">
                    <img src="{{ asset('images/logo2.png') }}" alt="Laracasts Logo" width="135"  style="border-radius: 20%; object-fit:cover; height:65px; ">
                </a>
                
            </div>
            
            <div class="mt-8 md:mt-0 flex items-center" >
            @if (auth()->check() && auth()->user()->is_admin)
            <a href="/create2" class="text-xs font-bold uppercase mr-10">Category</a>
            @endif   
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">
                                Welcome, {{ auth()->user()->name }}!
                                </button>
                        </x-slot>

                        @admin
                            <x-dropdown-item
                                href="/admin/posts"
                                :active="request()->is('admin/posts')"
                            >
                                Dashboard
                            </x-dropdown-item>

                            <x-dropdown-item
                                href="/admin/posts/create"
                                :active="request()->is('admin/posts/create')"
                            >
                                New Post
                            </x-dropdown-item>
                        @endadmin

                        <x-dropdown-item
                            href="#"
                            x-data="{}"
                            @click.prevent="document.querySelector('#logout-form').submit()"
                        >
                            Log Out
                        </x-dropdown-item>

                        <form id="logout-form" method="POST" action="{{ route('log') }}" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>
                @else
                    <a href="/register"
                       class="text-xs font-bold uppercase {{ request()->is('register') ? 'text-blue-500' : '' }}">
                        Register
                    </a>

                    <a href="/login"
                       class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}">
                        Log In
                    </a>
                @endauth

                <a href="#newsletter"
                   class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 hidden">
                    Subscribe for Updates
                </a>
                @auth
                @if(in_array(auth()->id(), [1,2,3]))
                                    
                <div class="new"><a class="a1" href='/create'>New Post</a></div>
                @endif
                @endauth
            </div>
        </nav>
        
        {{ $slot }} 
        
        
        
     
        <footer id="newsletter"
                class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
        >
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">

            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10 hidden">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="{{ route('newsL') }}" class="lg:flex text-sm">
                        @csrf

                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email"
                                       name="email"
                                       type="text"
                                       placeholder="Your email address"
                                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <x-flash/> 
</body>
