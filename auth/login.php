<?php
session_start();
if (isset($_SESSION['login'])) {
    header('Location: /index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <title>Document</title>
</head>


<body class="bg-gray-200 font-sans text-gray-700 flex align-middle ">
    <div class="container mx-auto p-8 flex">
        <div class="max-w-md w-full mx-auto">
           

            <div class="bg-white rounded-lg overflow-hidden shadow-2xl h-[30rem]">

            <div class="container flex flex-col justify-center items-center">
                
                    <h1 class="text-4xl text-center pt-11 font-bold ">Login</h1>
             

            </div>
                <div class="p-8">
                    <form method="POST" action="../utils/auth.php">
                        <div class="mb-5">
                          <p class="font-bold">Username</p>
                            <input placeholder="Username" type="text" name="username" class="block w-full p-3 rounded-xl bg-gray-200 border border-transparen  focus:outline-none">
                        </div>


                        <div class="mb-5">
                            <p class="font-bold">Password</p>
                            <input placeholder="*********" type="password" name="password" class="block w-full p-3 rounded-xl bg-gray-200 border border-transparent focus:outline-none">
                        </div>
                        

                        <button type="submit" name="login" class="mt-10 w-full rounded-2xl border-2 border-dashed border-black bg-white px-6 py-3 font-semibold uppercase text-black transition-all duration-300 hover:translate-x-[-4px] hover:translate-y-[-4px] hover:rounded-md hover:shadow-[4px_4px_0px_black] active:translate-x-[0px] active:translate-y-[0px] active:rounded-2xl active:shadow-none">Login</button>
                    </form>
                </div>

                <?php
                if (isset($_GET['notification'])) {
                    echo $_GET['notification'];
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>