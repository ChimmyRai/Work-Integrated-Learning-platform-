<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <span class="font-bold"> Name of the industry partner: </span>  {{ $user->name }}<br/>
                  <span class="font-bold"> email:</span>{{ $user->email }}<br/>
                  <span class="font-bold"> Project List:</span>  
                  <ul class=" max-w-xs flex flex-col">
                        @foreach($projectsofinp as $project)
                            <li class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                            <a href="{{ route('ProjectDetail', ['id' => $project->id]) }}"> {{ $project->title }} </a>
                            </li>     
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>