<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project Details
        </h2>
    </x-slot>
    <x-flashmessage/>
    <x-student-details :student="$student" :studentProfile="$studentProfile" :rolesArray="$rolesArray"/>
           
    
</x-app-layout>
