
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles()
</head>
<body>
    <livewire:employee.components.forms.quiz-start-confirmation :id="request()->route('id')" lazy />

    @livewireScripts()
</body>
</html>
