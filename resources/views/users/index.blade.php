<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('users.create')}}" class=" inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent 
    rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300">
                Create User </a>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-lg text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    User name
                </th>
                <th scope="col" class="py-3 px-6">
                   Action
                </th>
                
            </tr>
        </thead>
        <tbody>
            @empty($users)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                No users
                </th>

            @endempty

        @foreach($users as $user)
               
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$user->name}}
                </th>
                <td class="py-4 px-6">
                    <div class="flex">
                   <a href="{{route('users.edit',$user->id)}}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent 
    rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-yellow-300">
                        edit
</a>
<form method="post" class="flex" action="{{route('users.destroy',$user->id)}}">
    @csrf
    @method('delete')
<button class="
inline-flex items-center px-4 py-2 bg-red-500 border border-transparent 
    rounded-md font-semibold text-xs text-white uppercase tracking-widest
     hover:bg-red-700 active:bg-red-900 ml-4 focus:outline-none focus:border-red-900 
     focus:ring ring-gray-300">
                

delete</button>
</form>

<a href="{{route('users.assignrole',$user->id)}}" class="inline-flex items-center px-4 py-2 bg-green-400 border border-transparent 
    rounded-md font-semibold text-xs text-white ml-4 uppercase tracking-widest hover:bg-green-600 active:bg-green-800 focus:outline-none focus:border-green-900 focus:ring ring-green-300">
                        Assign Role
</a>

<a href="{{route('users.assignpermission',$user->id)}}" class="inline-flex items-center px-4 py-2 bg-green-400 border border-transparent 
    rounded-md font-semibold text-xs text-white ml-4 uppercase tracking-widest hover:bg-green-600 active:bg-green-800 focus:outline-none focus:border-green-900 focus:ring ring-green-300">
                        Assign permission
</a>

<div>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
    
</div>
    
        </div>
        </div>
    </div>

</x-app-layout>
