<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> -->
    <!-- <script src="https://unpkg.com/vue-router@4.0.15/dist/vue-router.global.js"></script> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./js/app.js"></script>
    @vite(['resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div id="app">
    <h1>Hello App!</h1>
  <p>
    <!-- use the router-link component for navigation. -->
    <!-- specify the link by passing the `to` prop. -->
    <!-- `<router-link>` will render an `<a>` tag with the correct `href` attribute -->
    <router-link to="/">Go to Home</router-link>
    <router-link to="/about">Go to About</router-link>
  </p>
  <!-- route outlet -->
  <!-- component matched by the route will render here -->
  <router-view></router-view>
    </div>
</body>
<script>



</script>
</html>