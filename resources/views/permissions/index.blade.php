<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{route('permissions.create')}}" class="  inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent 
    rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300">
                Create Permission</a>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-gray-700 text-lg bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Permission name
                </th>
                <th scope="col" class="py-3 px-6">
                   Action
                </th>
                
            </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
               
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$permission->name}}
                </th>
                <td class="py-4 px-6">
                    <div class="flex">
                   <a href="{{route('permissions.edit',$permission->id)}}" class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent 
    rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:border-yellow-900 focus:ring ring-yellow-300">
                        edit
</a>
<form method="post" class="flex" action="{{route('permissions.destroy',$permission->id)}}">
    @csrf
    @method('delete')
<button class="
inline-flex items-center px-4 py-2 bg-red-800 border border-transparent 
    rounded-md font-semibold text-xs text-white uppercase tracking-widest
     hover:bg-red-700 active:bg-red-900 ml-4 focus:outline-none focus:border-red-900 
     focus:ring ring-red-300">
                

delete</button>

</form>
<a href="{{route('permissions.assign',$permission->id)}}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent 
    rounded-md font-semibold text-xs text-white ml-4 uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300">
                        Assign roles
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
