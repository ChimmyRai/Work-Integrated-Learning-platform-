<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         All students
        </h2>
    </x-slot>
    <x-flashmessage/>
    <x-list-students :students="$students"/>
            
</x-app-layout>
