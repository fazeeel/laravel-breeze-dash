<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign direct permission to ' ) }}: {{$user->name}} User.
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('users.syncpermission',$user->id)}}">
                        @csrf
                        
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Choose permissions
                </h2>
                   
<select multiple id="permissiontoassign" name="permissiontoassign[]" 
class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    @foreach($permissions as $permission)
   <option value="{{$permission->id}}"
    @selected($user->hasAnyDirectPermission($permission->id))>{{$permission->name}}</option>
   @endforeach
</select>
<x-primary-button class="mt-3">
                    {{ __('Assign Permissions to user') }}
                </x-primary-button>
</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
