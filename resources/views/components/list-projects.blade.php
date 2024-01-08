
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 <span class="font-bold">List of all the projects:</span>  
                  
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-5">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Trimester</th>
                                <th>Projects</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $year => $trimesters)
                                @foreach($trimesters as $trimester => $projects)
                                <tr class="border-b dark:border-gray-700">
                                    <td>{{ $year }}</td>
                                    <td>{{ $trimester }}</td>
                                    <td>
                                        @foreach($projects as $project)
                                            <a href="{{ route('ProjectDetail', ['id' => $project->id]) }}"> 
                                                {{ $project->title }}
                                            </a>    
                                            <br>
                                        @endforeach
                                    </td>   
                                </tr>           
                                    
                                @endforeach
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>