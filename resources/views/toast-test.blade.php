<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toaster Debug</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-gray-100 p-10">
<h1 class="text-2xl font-bold mb-4">Toaster Debug Test</h1>
<p>i made this file with ai to test if my toaster works, it returns true but no toaster is being shown maybe toaster is not supported with tailwind 4</p>
<button
    onclick="window.dispatchEvent(new CustomEvent('toaster:push', { detail: { message: '🧈 TOASTED SUCCESSFULLY!', type: 'success' } }))"
    class="bg-blue-600 px-4 py-2 rounded shadow hover:bg-blue-700">
    Click Me To Toast
</button>
<script>
    document.addEventListener('alpine:init', () => {
        console.log('🔥 Alpine is initialized');
    });

    document.addEventListener('DOMContentLoaded', () => {
        console.log('✅ DOM Loaded, Toaster element:',
            document.querySelector('#toaster'));
    });

    window.addEventListener('toaster:push', e => {
        console.log('🍞 Toast Event:', e.detail);
    });
</script>

<x-toaster-hub />

</body>
</html>
