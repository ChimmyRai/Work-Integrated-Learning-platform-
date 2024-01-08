<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
            <div class="p-6 text-gray-900">
                   List of Students
                    <ul class=" max-w-xs flex flex-col">
                        @foreach($students as $student)
                            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            <a href="{{ route('StudentDetail', ['id' => $student->id]) }}"> {{ $student->name }} </a>
                            </li>     
                        @endforeach
                    </ul>
                </div>
                   <!-- Pagination links -->
                    <div class="mt-4">
                        {{ $students->links() }}
                    </div>
            </div>
          
        </div>
       
    </div>