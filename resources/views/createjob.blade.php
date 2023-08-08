<!DOCTYPE html>
<html>
<head>
    <title>Add New Job</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto my-8 px-4  ">
        <h2 class="text-2xl font-bold mb-6 flex items-center justify-center">Add New Job</h2>
        <form action="{{ route('create_job') }}" method="post" class="bg-white rounded-lg shadow-lg w-4/5 mx-auto p-8">
            @csrf

            <!-- Job Name -->
            <div class="mb-4">
                <label for="job_name" class="block text-gray-700 font-bold">Job Name:</label>
                <input type="text" id="job_name" name="job_name" required
                       class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2">
            </div>

            <!-- Job Description -->
            <div class="mb-4">
                <label for="job_description" class="block text-gray-700 font-bold">Job Description:</label>
                <textarea id="job_description" name="job_description" rows="4" required
                          class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2"></textarea>
            </div>

            <!-- Skills Required -->
            <div class="mb-4">
                <label for="skills_required" class="block text-gray-700 font-bold">Skills Required:</label>
                <input type="text" id="skills_required" name="skills_required" required
                       placeholder="Enter skills separated by commas (e.g., Skill 1, Skill 2, Skill 3)"
                       class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2">
            </div>

            <!-- Reward -->
            <div class="mb-4">
                <label for="reward" class="block text-gray-700 font-bold">Reward (₹):</label>
                <input type="number" id="reward" name="reward" step="1" required
                       class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2">
            </div>

            <!-- Submission Date -->
            <div class="mb-4">
                <label for="submission_date" class="block text-gray-700 font-bold">Submission Date:</label>
                <input type="datetime-local" id="submission_date" name="submission_date" required
                       class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2">
            </div>

            <!-- Issuer Name -->
            <div class="mb-4">
                <label for="issuer_name" class="block text-gray-700 font-bold">Issuer Name:</label>
                <input type="text" id="issuer_name" name="issuer_name" required
                       class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2">
            </div>

            <!-- Issuer Email
            <div class="mb-4">
                <label for="issuer_email" class="block text-gray-700 font-bold">Issuer Email:</label>
                <input type="email" id="issuer_email" name="issuer_email" required
                       class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2">
            </div> -->

            <!-- Issuer Phone Number -->
            <div class="mb-4">
                <label for="issuer_phone_no" class="block text-gray-700 font-bold">Issuer Phone Number:</label>
                <input type="tel" id="issuer_phone_no" name="issuer_phone_no" required
                       class="mt-1 block w-full rounded-md border-2 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Submit Job
            </button>
        </form>
    </div>
</body>
</html>
