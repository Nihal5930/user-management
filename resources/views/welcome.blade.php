<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">User Management System</h1>

    <div class="container mx-auto">
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <livewire:user-form>
            </div>
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <livewire:user-data>
            </div>
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <livewire:user-details>
            </div>
        </div>
    </div>

    @livewireScripts
</body>
</html>
