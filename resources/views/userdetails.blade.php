<!DOCTYPE html>
<html>
<head>
    <title>Tell us more</title>
    <!-- Add the Tailwind CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add Font Awesome icons link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <div class="bg-white rounded-lg shadow-lg p-8 w-3/4 mx-auto">
            <h2 class="text-3xl font-bold mb-6">Tell us more</h2>
            <form action="{{route('submit_details')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <!-- About Me -->
                <div class="mb-6">
                    <label for="about_me" class="block text-lg font-semibold mb-2">About Me:</label>
                    <textarea id="about_me" name="about_me" rows="8" class="form-textarea mt-1 block w-full rounded-md shadow-sm resize-none" placeholder="Tell us about youself" required></textarea>
                    @error('about_me')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Resume -->
                <div class="mb-6">
                    <label for="resume" class="block text-lg font-semibold mb-2">Upload Resume:</label>
                    <div class="flex items-center justify-center w-full h-32 border-dashed border-2 border-gray-300 rounded-lg">
                        <label for="resume_upload" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt fa-4x text-gray-400"></i>
                            <p class="mt-2 text-gray-600">Drag and drop your resume here or click to select a file(Maximum File Size - 2MB)</p>
                        </label>
                        <input type="file" id="resume" name="resume" accept=".pdf,.doc,.docx" required>
                        @error('resume')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Skills -->
                <div class="mb-6">
                    <label class="block text-lg font-semibold mb-2">Select Your Skills:</label>
                    <div class="grid grid-cols-2 gap-2" required>
                        <div>
                            <label for="skill1" class="flex items-center">
                                <input type="checkbox" id="skill1" name="skills[]" value="Content Creation" class="form-checkbox h-5 w-5 text-blue-500">
                                <span class="ml-2">Content Creation</span>
                            </label>
                            <label for="skill2" class="flex items-center">
                                <input type="checkbox" id="skill2" name="skills[]" value="Graphic Designing" class="form-checkbox h-5 w-5 text-blue-500">
                                <span class="ml-2">Graphic Designing</span>
                            </label>
                            
                        </div>
                        <div>
                            <label for="skill3" class="flex items-center">
                                <input type="checkbox" id="skill3" name="skills[]" value="Arts and Crafts" class="form-checkbox h-5 w-5 text-blue-500">
                                <span class="ml-2">Arts and Crafts</span>
                            </label>
                            <label for="skill4" class="flex items-center">
                                <input type="checkbox" id="skill4" name="skills[]" value="Digital Marketing" class="form-checkbox h-5 w-5 text-blue-500">
                                <span class="ml-2">Digital Marketing</span>
                            </label>
                            
                        </div>
                        @error('skills')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors duration-300">
                        <i class="fas fa-check-circle mr-2"></i>Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
