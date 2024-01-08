<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project List
        </h2>
    </x-slot>
    <x-flashmessage/>
    <x-list-projects-ofthe-inp :projectsofinp="$projectsofinp" :user="$user"/>
            
</x-app-layout>
