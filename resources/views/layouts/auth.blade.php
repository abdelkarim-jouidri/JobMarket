<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="grid place-items-center h-screen bg-[#cae1ff26]">
    @yield('content')
    
</body>

<script>
    originalCheckBox = document.getElementById('check')
    originalCheckBox.value = 'candidate'
    originalCheckBox.addEventListener('change',(e)=>{
        if(!e.target.checked){
            e.target.value = 'candidate'
            document.getElementById('Recruteur').classList.remove('text-[#3b82f6]')
            document.getElementById('Recruteur').classList.add('text-[#ddd]')
            document.getElementById('candidate').classList.add('text-[#3b82f6]')
            document.getElementById('candidate').classList.remove('text-[#ddd]')
        }
        else {
            e.target.value = 'recruteur'
            document.getElementById('candidate').classList.remove('text-[#3b82f6]')
            document.getElementById('candidate').classList.add('text-[#ddd]')
            document.getElementById('Recruteur').classList.add('text-[#3b82f6]')
            document.getElementById('Recruteur').classList.remove('text-[#ddd]')
            
            
        }
        document.getElementById('check2').value = e.target.value
        // console.log(e.target.value)

    })
    // candidate.addEventListener('click',()=>alert('clicked'))
</script>
</html>