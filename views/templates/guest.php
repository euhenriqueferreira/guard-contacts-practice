<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Schibsted+Grotesk&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Guard</title>
    <style>
        html,
        body {
            font-family: "Schibsted Grotesk", serif;
        }
    </style>
</head>

<body>
    <div class="flex">
        <div class="w-4/6 h-screen overflow-hidden relative bg-[#111111] pl-24 pt-12">
            <img src="assets/Linha.png" alt="" class="absolute left-0 top-0  w-full h-full object-cover blur-md ">
            <img src="assets/logo-big.png" alt="" class="w-[131px] h-auto">
        </div>

        <div class="bg-[#1b1b1b] w-2/6 h-screen py-10 px-20 flex flex-col">
            <?php require base_path("views/$view.view.php"); ?>
        </div>
    </div>
</body>

</html>