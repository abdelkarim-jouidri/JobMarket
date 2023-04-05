<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="grid place-items-center h-screen bg-[#cae1ff26]">
    <div class="shadow-md rounded-md bg-white relative ">
        <div class="w-24 rounded-full border-black h-24 border-1 bg-[#000] flex justify-center items-center absolute -top-12   left-[50%] -translate-x-[50%]">
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
            </svg>
          
        </div>
        <div class="flex min-h-full items-center justify-center px-4 py-12 sm:px-6 lg:px-8 ">
        <div class="w-full max-w-md space-y-8">
            <div>
            <div class="rounded-full  border-black">
                <!-- <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> -->

            </div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>

            </div>
            <form class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="-space-y-px rounded-md shadow-sm flex flex-col gap-5">
                <div>
                <label for="email-address" class="sr-only">Email address</label>
                <input id="email-address" name="email" type="email" autocomplete="email" required class="relative block w-full rounded-md border-2 border-black-600 py-1.5 text-gray-900  placeholder:text-gray-400 focus:z-10 focus:ring-1 ring-inset focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" placeholder="Email address">
                </div>
                <div>
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full rounded-md border-2 border-black-600 py-1.5 text-gray-900  placeholder:text-gray-400 focus:z-10 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-2" placeholder="Password">
                </div>
            </div>

            

            <div>
                <button type="submit" class="group relative flex w-full justify-center rounded-md bg-blue-500 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-bg-blue-400">
                
                Sign in
                </button>
            </div>
            <div class="flex justify-center items-center gap-2  text-slate-300 text-lg" id="divider">
                <hr class="border-t-1  border-slate-300  grow">
                <span>
                    or
                </span>
                <hr class="border-t-1  border-slate-300 grow">

            </div>
            <div>
                <button type="submit" class="group relative flex w-full justify-center rounded-md bg-sky-400 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                
                Signup here
                </button>
            </div>
            </form>
        </div>
        </div>
    </div>
    
</body>
</html>