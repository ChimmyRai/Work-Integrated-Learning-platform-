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
                                    
                                    

    

                                    <form method="post" action="{{ route('StudentProfileStore') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                                        @csrf
                                        @method('post')

                                       
                                               
                                        <button type="submit"
                                                class="bg-blue-500 pl-5 px-4 py-2 font-semibold text-white 
                                                inline-flex items-center space-x-2 rounded mr-4">
                                            
                                                    <span>Add Info</span>
                                        </button>
                                        <input type="hidden" id="user_id " name="user_id" value="{{Auth::id()}}">
                                        <x-input-error class="mt-2" :messages="$errors->get('user_id')" />
                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">GPA:</td>
                                            <td class="whitespace-nowrap px-6 py-4"><x-text-input id="GPA" name="GPA" type="number" class="mt-1 block w-full font-medium" :value="old('GPA')" required autofocus autocomplete="GPA" />
                                                <x-input-error class="mt-2" :messages="$errors->get('GPA')" />
                                            </td>
                                            
                                        </tr>

                                        <tr class="border-b ">
                                            <td class="whitespace-nowrap px-6 py-4 font-medium ">Roles</td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                            <input type="checkbox" name="roles[]" value="software_developer" {{ in_array('software_developer', old('roles', [])) ? 'checked' : '' }}> Software Developer
                                            <br>
                                            <input type="checkbox" name="roles[]" value="project_manager" {{ in_array('project_manager', old('roles', [])) ? 'checked' : '' }}> Project Manager
                                            <br>
                                            <input type="checkbox" name="roles[]" value="business_analyst" {{ in_array('business_analyst', old('roles', [])) ? 'checked' : '' }}> Business Analyst
                                            <br>
                                            <input type="checkbox" name="roles[]" value="tester" {{ in_array('tester', old('roles', [])) ? 'checked' : '' }}> Tester
                                            <br>
                                            <input type="checkbox" name="roles[]" value="client_liaison" {{ in_array('client_liaison', old('roles', [])) ? 'checked' : '' }}> Client Liaison
                                            <br>
                                                <x-input-error class="mt-2" :messages="$errors->get('roles')" />
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