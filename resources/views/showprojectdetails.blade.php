<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project Details
        </h2>
    </x-slot>
    <x-flashmessage/>
    <x-project-details :project="$project" :creator="$creator" :files="$files" :applicants="$applicants"/>
           
    <script>
       const  errorMessage=document.getElementById('project-error');
        // Check if the error message element exists
        if (errorMessage) {
            // Set a timeout to hide the error message after 5000 milliseconds (5 seconds)
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 5000); 
        }

        // Open the delete confirmation modal
        function openDeleteModal() {
            var modal = document.getElementById('deleteModal');
            modal.style.display = 'block';
        }

        // Close the delete confirmation modal
        function closeDeleteModal() {
            var modal = document.getElementById('deleteModal');
            modal.style.display = 'none';
        }

        
        
    </script>
</x-app-layout>
