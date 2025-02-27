
<?php
// require_once '../app/controllers/authcontroller.php';

//   $dbConnection = new DbConnection();
//    $db = $dbConnection->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="../assets/gym.png"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body style="margin: 0;
            padding: 0;
            background-image: url('../assets/scriptsql/img/multi-verse-7970350_1280.jpg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;">

<div class="flex flex-col items-center justify-between pt-0 pr-10 pb-0 pl-10 mt-14 mr-auto mb-0 ml-auto max-w-7xl xl:px-5 lg:flex-row">
    <div class="flex flex-col items-center w-full pt-5 pr-10 pb-20 pl-10 lg:pt-20 lg:flex-row">
        <div class="w-full bg-cover relative max-w-md lg:max-w-2xl lg:w-7/12">
            <div class="flex flex-col items-center justify-center w-full h-full relative lg:pr-10" data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-duration="800">
                <h1 class="text-9xl text-white font-bold" style="text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.75);">
                    Objection! Your Honor
                </h1>
            </div>
        </div>
        <div class="w-full mt-20 mr-0 mb-0 ml-0 relative z-10 max-w-2xl lg:mt-0 lg:w-5/12">
            <div class="flex flex-col items-start justify-start pt-10 pr-10 pb-10 pl-10 bg-white shadow-2xl rounded-xl relative z-10">

            <form method="POST" action="/cabinetmedical/public/register" class="w-full mt-6 mr-0 mb-0 ml-0 relative space-y-8" enctype="multipart/form-data">
    <!-- Name -->
    <div class="relative">
        <p class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">Nom</p>
        <input type="text" id="nom" name="nom" placeholder="Nom" class="border placeholder-gray-400 focus:outline-none focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white border-gray-300 rounded-md"/>
    </div>

    <!-- Prenom -->
    <div class="relative">
        <p class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">Prenom</p>
        <input type="text" id="prenom" name="prenom" placeholder="Prenom" class="border placeholder-gray-400 focus:outline-none focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white border-gray-300 rounded-md"/>
    </div>

    <!-- Email -->
    <div class="relative">
        <p class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">Email</p>
        <input type="email" id="email" name="email" placeholder="Example123@gmail.com" class="border placeholder-gray-400 focus:outline-none focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white border-gray-300 rounded-md"/>
    </div>

    <!-- Role -->
    <div class="relative">
        <p class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">Role</p>
        <select name="role" id="role" class="border focus:outline-none focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white border-gray-300 rounded-md" onchange="toggleSpecialiteField()">
            <option value="patient" class="text-gray-400">Patient</option>
            <option value="medecin" class="text-gray-400">Medecin</option>
        </select>
    </div>

    <!-- Specialité (hidden by default) -->
    <div class="relative" id="specialite-field" style="display: none;">
        <p class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">Specialité</p>
        <input type="text" id="specialite" name="specialite" placeholder="Specialité" class="border placeholder-gray-400 focus:outline-none focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white border-gray-300 rounded-md"/>
    </div>

    <!-- Password -->
    <div class="relative">
        <p class="bg-white pt-0 pr-2 pb-0 pl-2 -mt-3 mr-0 mb-0 ml-2 font-medium text-gray-600 absolute">Password</p>
        <input type="password" id="password" name="password" placeholder="............." class="border placeholder-gray-400 focus:outline-none focus:border-black w-full pt-4 pr-4 pb-4 pl-4 mt-2 mr-0 mb-0 ml-0 text-base block bg-white border-gray-300 rounded-md"/>
    </div>

    <div class="relative">
        <button type="submit" name="submit" class="w-full inline-block pt-4 pr-5 pb-4 pl-5 text-xl font-medium text-center text-white bg-green-500 rounded-lg transition duration-200 hover:bg-green-600 ease">Register</button>
    </div>

    <div class="relative">
        <p class="text-center font-medium text-gray-600">Already have an account? <a href="loginViews" class="text-green-600 font-bold">Login</a></p>
    </div>
</form>


            </div>
        </div>
    </div>
</div>


<script>


function toggleSpecialiteField() {
    var roleSelect = document.getElementById("role");
    var specialiteField = document.getElementById("specialite-field");
    if (roleSelect.value === "medecin") {
        specialiteField.style.display = "block";
    } else {
        specialiteField.style.display = "none";
    }
}


function validateForm() {
    let nom = document.getElementById("nom").value;
    let prenom = document.getElementById("prenom").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("Motdepasse").value;
    let emailP = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    let nameP= /^[A-Za-z]+$/;
    let passwordP = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    if (!nameP.test(nom)) {
        alert("Le nom ne doit contenir que des lettres.");
        return false;
    }

    if (!nameP.test(prenom)) {
        alert("Le prénom ne doit contenir que des lettres.");
        return false;
    }

    if (!emailP.test(email)) {
        alert("L'adresse e-mail est invalide.");
        return false;
    }

    if (!passwordP.test(password)) {
        alert("Le mot de passe doit contenir au moins 8 caractères, dont des lettres et des chiffres.");
        return false;
    }

    return true;
}

  AOS.init();
</script>

</body>
</html>