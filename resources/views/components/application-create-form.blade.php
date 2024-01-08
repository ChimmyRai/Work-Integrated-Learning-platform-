<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    
                    <div class="flex flex-col overflow-x-auto">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                            
                           
                                <table class="w-3/4 text-left text-sm font-light">
                                
                                <tbody>
                                    <form method="post" action="{{ route('ApplicationStore') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                                        @csrf
                                        @method('post')
                                        <button type="submit"
                                                class="bg-blue-500 pl-5 px-4 py-2 font-semibold text-white 
                                                inline-flex items-center space-x-2 rounded mr-4">
                                            
                                                    <span>Apply</span>
                                        </button>
                                        <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}">
                                        <x-input-error class="mt-2" :messages="$errors->get('project_id')" />
                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Project Title</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$project->title}}</td>   
                                        </tr>
                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Year</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$project->year}}</td>   
                                        </tr>
                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Trimester</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$project->trimester}}</td>   
                                        </tr>
                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Description</td>
                                            <td class="whitespace-nowrap px-6 py-4">{{$project->description}}</td>   
                                        </tr>

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Justification(min: 3 words)</td>
                                            <td class="whitespace-nowrap px-6 py-4">

                                                    <textarea class=" font-medium text-left block  w-full rounded border-gray-300 focus:border-indigo-500"  
                                                        id="justification"  name="justification" autofocus autocomplete="justification" 
                                                        rows="5" value="old('justification')">
                                                        {{ old('justification') }}
                                                    </textarea>
                                                    <x-input-error class="mt-2" :messages="$errors->get('justification')" />
                                            </td>   
                                        </tr>
                                    </form>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>