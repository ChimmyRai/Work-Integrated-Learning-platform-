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
                                    
                                    

    

                                    <form method="post" action="{{ route('ProjectStore') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                                        @csrf
                                        @method('post')

                                       
                                               
                                                    <button type="submit"
                                                            class="bg-blue-500 pl-5 px-4 py-2 font-semibold text-white 
                                                            inline-flex items-center space-x-2 rounded mr-4">
                                                        
                                                                <span>Create</span>
                                                    </button>

                                                  
                                                
                                              
                                        <input type="hidden" id="inP_name" name="inP_name" value="hidden_value">

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Project Ttile:</td>
                                            <td class="whitespace-nowrap px-6 py-4"><x-text-input id="title" name="title" type="text" class="mt-1 block w-full font-medium" :value="old('title')" required autofocus autocomplete="name" />
                                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                            </td>
                                            
                                        </tr>

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Number of participants required</td>
                                            <td class="whitespace-nowrap px-6 py-4"><x-text-input id="number_of_student" name="number_of_student" type="number" class="mt-1 block w-full font-medium" :value="old('number_of_student')"  autofocus autocomplete="number_of_student" />
                                                <x-input-error class="mt-2" :messages="$errors->get('number_of_student')" />
                                            </td>
                                            
                                        </tr>

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Project Description</td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <textarea class=" font-medium text-left block  w-full rounded border-gray-300 focus:border-indigo-500"  
                                                    id="description"  name="description" autofocus autocomplete="description" 
                                                    rows="5" value="old('description')">
                                                    {{ old('description') }}
                                                </textarea>
                                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                                            </td>
                                        </tr>
                                       
                                               

                                                <tr class="border-b ">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium "> Offering Trimester</td>
                                                    <td class="whitespace-nowrap px-6 py-4"><x-text-input id="trimester" name="trimester" type="number" class="mt-1 block w-full font-medium" :value="old('trimester')"  autofocus autocomplete="trimester" /> 
                                                        <x-input-error class="mt-2" :messages="$errors->get('trimester')" />
                                                    </td>
                                                    
                                                </tr>

                                                <tr class="border-b ">
                                                    <td class="whitespace-nowrap px-6 py-4 font-medium ">Offering Year</td>
                                                    <td class="whitespace-nowrap px-6 py-4"><x-text-input id="year" name="year" type="number" class="mt-1 block w-full font-medium" :value="old('year' )"  autofocus autocomplete="year" /> 
                                                        <x-input-error class="mt-2" :messages="$errors->get('year')" />
                                                    </td>
                                                    
                                                </tr>

                                                <tr class="border-b ">
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        Files
                                                    </td>
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