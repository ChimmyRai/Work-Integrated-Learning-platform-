<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Application Form
        </h2>
    </x-slot>
    <x-flashmessage/>
    <x-application-create-form :project="$project" />
           
    
</x-app-layout>