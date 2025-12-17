<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>

  </head>
  <body>
<?php include $_SERVER['DOCUMENT_ROOT']."/forgeassignments/partials/header.php"?>

<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "fa";

$conn = new mysqli($servername, 
            $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failure: " 
        . $conn->connect_error);
} 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['full_name'])) {

        $full_name = $_POST['full_name'];

    } else {

        $full_name = $_POST['full_name'];

    }
    $email = $_POST['email'];
    $hostel = $_POST['hostel'];
    $branch = $_POST['branch'];
    $phone_number = $_POST['phone_number'];
    $pages = $_POST['pages'];
    $price = $_POST['price'];
    $message = $_POST['message'];

    if(strlen($full_name) == 0 || strlen($phone_number) == 0 || strlen($pages) == 0 || strlen($price) == 0 || strlen($message) == 0 ){
            // echo "<script>alert('Fill the incomplete information')</script>";
            echo $full_name." ";
            echo $email." ";
            echo $phone_number." ";
            echo $pages." ";
            echo $price." ";
            echo $message." ";
        }
        else{
            $insertsql = "INSERT INTO `host` (`full_name`, `hostel`, `branch`, `email` ,`phone_number`,`pages`,`price`,`message`,`timestamp`) VALUES ('$full_name', '$hostel', '$branch', '$email', '$phone_number','$pages','$price','$message',current_timestamp())";
            $result = mysqli_query($conn, $insertsql);
            if(mysqli_affected_rows($conn) != 0){
                echo "<script>alert('Assignment Hosted Successfully');window.location.replace('/forgeassignments/');</script>";
            }
            else{
                echo "<script>alert('Unknown error occurred');window.location.reload()</script>";
            }
        }
}


?>

<div class="isolate bg-gray-900 px-6 py-24 sm:py-32 lg:px-8">
  <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
    <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
  </div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">Host Assignment</h2>
    <p class="mt-2 text-lg/8 text-gray-400">Find People who can do your Assignment</p>
  </div>
  <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-10">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div>
        <label for="first-name" class="block text-sm/6 font-semibold text-white">Full name</label>
        <div class="mt-2.5">
          <input id="name" type="name" name="full_name" autocomplete="email" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <br>

      <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      
      <div>
        <label for="first-name" class="block text-sm/6 font-semibold text-white">Hostel</label>

      <select id="countries" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" style="color:white" name="hostel">
    <option value="H2" name="H2" style="color:black">H2</option>
    <option value="H3" name="H3" style="color:black">H3</option>
    <option value="H4" name="H4" style="color:black">H4</option>
    <option value="H5" name="H5" style="color:black">H5</option>
    <option value="H6" name="H6" style="color:black">H6</option>
    <option value="H7" name="H7" style="color:black">H7</option>
    <option value="H8" name="H8" style="color:black">H8</option>
    <option value="H9" name="H9" style="color:black">H9</option>
    <option value="H10AB" name="H10AB" style="color:black">H10AB</option>
    <option value="H10CD" name="H10CD" style="color:black">H10CD</option>
    <option value="H11" name="H11" style="color:black">H11</option>
    <option value="H12" name="H12" style="color:black">H12</option>
  </select>
        </div>
      </div>
        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      
      <div>
        <label for="first-name" class="block text-sm/6 font-semibold text-white">Branch</label>

      <select id="countries" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" style="color:white" name="branch">
    <option value="Chemical Engineering" name="chem" style="color:black">Chemical Engineering</option>
    <option value="Civil Engineering" name="civ" style="color:black">Civil Engineering</option>
    <option value="Computer Science and Engineering" name="cse" style="color:black">Computer Science and Engineering</option>
    <option value="Electrical Engineering" name="ee" style="color:black">Electrical Engineering</option>
    <option value="Electronics and Communication Engineering" name="ece" style="color:black">Electronics and Communication Engineering</option>
    <option value="Materials Science and Metallurgical Engineering" name="mme" style="color:black">Materials Science and Metallurgical Engineering</option>
    <option value="Mechanical Engineering" name="mech" style="color:black">Mechanical Engineering</option>
    <option value="Planning" name="plan" style="color:black">Planning</option>
    <option value="Architecture" name="arch" style="color:black">Architecture</option>
    <option value="Mathematics and Data Science" name="mds" style="color:black">Mathematics and Data Science</option>
    <option value="Energy and Electrical Vehicle Engineering" name="ev" style="color:black">Energy and Electrical Vehicle</option>
    <option value="Engineering and Computational Mechanics" name="ecm" style="color:black">Engineering and Computational Mechanics</option>
  </select>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm/6 font-semibold text-white">Email</label>
        <div class="mt-2.5">
          <input id="email" type="email" name="email" autocomplete="email" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="phone-number" class="block text-sm/6 font-semibold text-white">Phone number</label>
        <div class="mt-2.5">
          <div class="flex rounded-md bg-white/5 outline-1 -outline-offset-1 outline-white/10 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-500">

            <input id="phone-number" type="number" name="phone_number" placeholder="(+91)" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
          </div>
        </div>
      </div>

      <div class="sm:col-span-2">
        <label for="phone-number" class="block text-sm/6 font-semibold text-white">Pages</label>
        <div class="mt-2.5">
          <div class="flex rounded-md bg-white/5 outline-1 -outline-offset-1 outline-white/10 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-500">

            <input id="phone-number" type="number" name="pages" placeholder="No. of pages the assignment has" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
          </div>
        </div>
      </div>

      <div class="sm:col-span-2">
        <label for="phone-number" class="block text-sm/6 font-semibold text-white">Price</label>
        <div class="mt-2.5">
          <div class="flex rounded-md bg-white/5 outline-1 -outline-offset-1 outline-white/10 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-500">

            <input id="phone-number" type="number" name="price" placeholder="Money you can give for assignment to be completed" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
          </div>
        </div>
      </div>
      
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm/6 font-semibold text-white">Message</label>
        <div class="mt-2.5">
          <textarea id="message" name="message" rows="4" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" placeholder="Additional Information You Want to Give"></textarea>
        </div>
      </div>
      <
    </div>
    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Host Assignment</button>
    </div>
  </form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/forgeassignments/partials/footer.php'?>
</body>
</head>