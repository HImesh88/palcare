<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donors</title>
  <link rel="shortcut icon" href="../assets/logo.png" type="image/x-icon">k
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="styles/style.css">
</head>

<body class="flex items-center  min-h-screen bg-gradient-to-tr from-gray-100 via-gray-200 to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 p-6 flex-col">
   <div class="w-full flex justify-between items-center">
    <p class="text-xl md:text-3xl text-green-700 font-extrabold">Our Donors</p>
    <p><i class="fa-solid fa-arrow-left text-green-700 text-md cursor-pointer" id="donback"> Back</i></p>
   </div> 
    
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto mt-4">
    <?php
        include '../connections/conn.php';

        $query = "SELECT * FROM doner_details WHERE status = 'approved'";
        $res = mysqli_query($conn, $query);
        if ($res) {
            while($row = mysqli_fetch_array($res)) {

                $name = $row['name'];
                $phone = $row['phone'];
                $address = $row['address'];
                $bloodgrp = $row['blood_group'];
                $age = $row['age'];

                echo '
                     <div class="w-full max-w-md bg-white rounded-2xl shadow-lg overflow-hidden dark:bg-gray-800 dark:border dark:border-gray-700 flex flex-col justify-between p-6 transition-transform transform hover:scale-105 duration-300">
            <div>
                <h5 class="text-2xl font-extrabold tracking-wide text-gray-900 dark:text-white mb-2 text-center">
                '.$name.'
                </h5>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 text-center">
                '.$address.'
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 text-center">
                '.$bloodgrp.'
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 text-center">
                Age = ' .$age.'
                </p>
            </div>
            <a href="https://wa.me/+977'.$phone.'?text=Hey!%20Could%20you%20please%20help%20me%20with%20blood" target="_blank"
               class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white bg-gradient-to-r from-green-500 to-green-700 rounded-lg hover:from-green-600 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-green-500" data-ripple-light="true">
                <i class="fab fa-whatsapp mr-2"></i> WhatsApp
            </a>
        </div>
                ';
            }
        }
        
        

    ?>
  </div>
  <script>
    const backButton = document.getElementById('donback');
    if (backButton) {
        backButton.addEventListener('click', function() {
            window.location.href = "../index.html";
        });
    }
  </script>
</body>
</html>
