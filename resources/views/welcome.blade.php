<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-[#FDCEDF] mt-[40px]">
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-[#F8E8EE] rounded-xl">
        <h1 class="text-2xl text-[#B0578D] font-bold text-center">To-Do List</h1>
        <p class="text-center text-[#D988B9]">QuickTask is a simple and efficient. This designed to help you stay organized and boost productivity. </p>

        <div class="mb-6">
            <form class="flex flex-col space-y-4 mt-[20px]" method="POST" action="/">
                @csrf

                <input type="text" name="title" placeholder="Todo List Title" class="py-3 px-4 bg-[#] rounded-xl focus:outline-[#FFB6D9]">
                <textarea name="description" placeholder="The todo description" class="py-3 px-4 bg-[#] rounded-xl focus:outline-[#FFB6D9]" cols="30" rows="4" ></textarea>
                <button class="w-30 py-3 px-8 bg-[#F1D4E5] font-bold text-[#D988B9] rounded-xl">Add</button>
            </form>
        </div>
        
        <hr class="border-[#B0578D]">
        <div class="mt-2">
            @foreach ($todos as $todo)
                <div 
                    @class([
                        'py-4 flex items-center border-b border-[#B0578D] px-3',
                        $todo->isDone ? 'bg-change' : ''
                    ])
                >
                    <div class="flex-1 pr-8">
                        <h3 class="text-lg text-[#CD6688] font-semibold">{{ $todo->title }}</h3>
                        <p class="text-[#CD6688]">{{ $todo->description }}</p>
                    </div>

                    <div class="flex space-x-3">
                        <form method="POST" action="/{{ $todo->id }}">
                        @csrf
                        @method('PATCH')
                            <button class="py-2 px-2 bg-[#AED8CC] text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </button>
                        </form>

                        <form method="POST" action="/{{ $todo->id }}">
                        @csrf
                        @method('DELETE')

                            <button class="py-2 px-2 bg-[#CD6688] text-white rounded-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>