<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    
                    <div class="flex flex-col overflow-x-auto">
                        <div class="sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-x-auto">
                            
                           
                                <table class="min-w-2/4 text-left text-sm font-light ">
                                
                                <tbody>
                                    
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">Industry Partner:</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $creator->name}}</td>
                                    </tr>

                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">Partner Email:</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $creator->email }}</td>
                                    </tr>

                                    @if(auth()->user()->userType === 'student')
                                            <a href="{{ route('ApplicationCreateForm',['id' => $project->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center mt-2 mr-2 ml-2">
                                                <span>Apply to do this project</span>
                                            </a>
                                            
                                       
                                    @endif

                                    @if(auth()->user()->userType === 'inP' && auth()->user()->id===$creator->id)

                                   <!-- Delete Button -->
                                        <button onclick="openDeleteModal()" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 m-2">
                                            Delete
                                        </button>
                                        <x-input-error id="project-error" class="mt-2" :messages="$errors->get('project_id')" />

                                        <x-input-error class="mt-2" :messages="$errors->get('title')" />

                                        <div  id="deleteModal" class="hidden fixed inset-0 flex items-center justify-center z-50">
                                               
                                                <div class="modal-content bg-white p-8 rounded shadow-lg">
                                                    <p class="mb-4">Are you sure you want to delete this project?</p>
                                                    <div class="flex justify-end">
                                                        <button onclick="closeDeleteModal()" class="mr-2 text-gray-600">Cancel</button>
                                                        <!-- Form to delete the project -->
                                                        <form action="{{ route('ProjectDelete') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}">
                                                            
                                                            <button type="submit" class="text-red-600 font-medium hover:text-red-800">Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                        </div>
                                    @endif

                                    <form method="post" action="{{ route('ProjectUpdate', ['id' => $project->id]) }}"  enctype="multipart/form-data" class="mt-6 space-y-6">
                                        @csrf
                                        @method('patch')

                                        @auth
                                                
                                                @if(auth()->user()->userType === 'inP' && auth()->user()->id===$creator->id)
                                                    <button type="submit"
                                                            class="bg-blue-500 pl-5 px-4 py-2 font-semibold text-white 
                                                            inline-flex items-center space-x-2 rounded mr-4">
                                                        
                                                                <span>Update</span>
                                                    </button>

                                                    
                                                
                                              
                                        <input type="hidden" id="inP_name" name="inP_name" value="hidden_value">

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Project Ttile:</td>
                                            <td class="whitespace-nowrap px-6 py-4"><x-text-input id="title" name="title" type="text" class="mt-1 block w-full font-medium" :value="old('title',$project->title )" required autofocus autocomplete="name" />
                                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                            </td>
                                            
                                        </tr>

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Number of participants required</td>
                                            <td class="whitespace-nowrap px-6 py-4"><x-text-input id="number_of_student" name="number_of_student" type="number" class="mt-1 block w-full font-medium" :value="old('number_of_student',$project->number_of_student)"  autofocus autocomplete="number_of_student" />
                                                <x-input-error class="mt-2" :messages="$errors->get('number_of_student')" />
                                            </td>
                                            
                                        </tr>

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Project Description</td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <textarea class=" font-medium text-left block  w-full rounded border-gray-300 focus:border-indigo-500"  
                                                    id="description"  name="description" autofocus autocomplete="description" 
                                                    rows="5" value="old('description',$project->description)">

                                                    {{ old('description', $project->description) }}
                                                </textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                            </td>
                                        </tr>
                                       
                                               

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium "> Offering Trimester</td>
                                            <td class="whitespace-nowrap px-6 py-4"><x-text-input id="trimester" name="trimester" type="number" class="mt-1 block w-full font-medium" :value="old('trimester',$project->trimester )"  autofocus autocomplete="trimester" /> 
                                                <x-input-error class="mt-2" :messages="$errors->get('trimester')" />
                                            </td>
                                            
                                        </tr>

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Offering Year</td>
                                            <td class="whitespace-nowrap px-6 py-4"><x-text-input id="year" name="year" type="number" class="mt-1 block w-full font-medium" :value="old('year',$project->year )"  autofocus autocomplete="year" /> 
                                                <x-input-error class="mt-2" :messages="$errors->get('year')" />
                                            </td>
                                            
                                        </tr>

                                                
                                        <tr>
                                                <td></td>
                                                <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                                        <div class="mb-3">
                                                                <label
                                                                    for="formFileMultiple"
                                                                    class="mb-2 inline-block text-neutral-700 dark:text-neutral-200"
                                                                    >Multiple files input</label
                                                                >
                                                                <input
                                                                    class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                                                                    type="file"
                                                                    name="files[]" 
                                                                    id="formFileMultiple"
                                                                    multiple />
                                                        </div>
                                                            @error('files')
        `                                                       <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                                            @enderror
                                                            @if($errors->has('files.*'))
                                                                @foreach ($errors->get('files.*') as $error)
                                                                    <span class="text-red-500">{{ $error[0] }}</span><br>
                                                                @endforeach
                                                            @endif

                                                </td>
                                    </tr>  
                                       
                                    </form>
                                    
                                    
                                    @else
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">Project Ttile:</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $project->title }} </td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">Number of participants required</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{ $project->number_of_student }} </td>
                                    </tr>

                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">Project Description</td>
                                        <td class="whitespace-nowrap px-6 py-4 break-all">{{ $project->description }} </td>
                                    </tr>

                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">Offering Trimester</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{$project->trimester}} </td>
                                    </tr>

                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">Offering Year</td>
                                        <td class="whitespace-nowrap px-6 py-4">{{$project->year}}</td>
                                    </tr>
                                    

                                    @endif
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">Asscoiate Files</td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <div class="grid grid-cols-4 gap-2">                                        
                                                @foreach($files as $file)
                                                    @php
                                                        $extension = pathinfo($file->file_path, PATHINFO_EXTENSION);
                                                    @endphp

                                                    @if ($extension === 'pdf')
                                                        <a href="{{ asset('uploads/' . $file->file_path) }}" download>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                            </svg>

                                                             Download PDF
                                                        </a>
                                                    @elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                                        <img src="{{ asset('uploads/' . $file->file_path) . '?' . filemtime(public_path('uploads/' . $file->file_path)) }}" class="rounded w-full h-auto sm:w-1/2 md:w-2/3 lg:w-1/4 xl:w-1/5" alt="Image">
                                                    @else
                                                        <p>File type not supported: {{ $file->filename }}</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </td>
                                    </tr> 
                                    @if(count($applicants) > 0)
                                    <tr>
                                        <td colspan=2>
                                                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-bold">Applicants</td>
                                        <td class="font-bold">Justification for their application</td>
                                    </tr>
                                    
                                    @foreach($applicants as $applicant)
                                        <tr>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                            {{ $applicant->user->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                            {{ $applicant->justification }} 
                                            </td>
                                        </tr>
                                    @endforeach

                                    @else
                                        <tr>
                                            <td>
                                                 <p>No applicants found for this project.</p>
                                            </td>                                   
                                        </tr>
                                    @endif
                                   
                                </tbody>
                                </table>

                               
                                @endauth
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>