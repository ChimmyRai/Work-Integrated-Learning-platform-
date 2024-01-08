<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @auth
                        @if(auth()->user()->userType === 'inP')
                            <a href="{{ route('ProjectCreateForm') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-2 mr-2 ml-2">
                                                <span>Add new Project</span>
                            </a>

                            
                        @endif

                        @if(auth()->user()->userType === 'teacher')
                                <a href="{{ route('assign_stds_to_project')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-2 mr-2 ml-2">
                                                    <span>Auto Assign students to projects</span>
                                </a>     
                        @endif
                
                @endauth
            <div class="p-6 text-gray-900">
                   List of Industry Partners 
                    <ul class=" max-w-xs flex flex-col">
                        @foreach($partners as $partner)
                            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            <a href="{{ route('showProjectsList', ['id' => $partner->id]) }}"> {{ $partner->name }} </a>
                            @if(auth()->user()->userType === 'teacher' && $partner->status !== 'approved')
                                <a href="{{ route('approve',['id' => $partner->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-2 mr-2 ml-2">
                                                    <span>Approve</span>
                                </a>     
                            @endif
                            @endforeach   
                            </li>
                           
                    </ul>
                </div>
                   <!-- Pagination links -->
                    <div class="mt-4">
                        {{ $partners->links() }}
                    </div>
            </div>
          
        </div>
       
    </div>