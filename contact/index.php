
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->

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
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $message = $_POST['message'];

    $insertsql = "INSERT INTO `contact` (`first_name`, `last_name`, `email` ,`phone_number`,`message`,`timestamp`) VALUES ('$first_name', '$last_name', '$email', '$phone_number','$message',current_timestamp())";
    $result = mysqli_query($conn, $insertsql);
    if(mysqli_affected_rows($conn) != 0){
                echo "<script>alert('Record Submitted Successfully! We will contact you soon');window.location.replace('/forgeassignments/');</script>";
            }
            else{
                echo "<script>alert('Unknown error occurred');window.location.reload()</script>";
            }

}
?>
<div class="isolate bg-gray-900 px-6 py-24 sm:py-32 lg:px-8">
  <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
    <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
  </div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">Contact Us</h2>
  </div>
  <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div>
        <label for="first-name" class="block text-sm/6 font-semibold text-white">First name</label>
        <div class="mt-2.5">
          <input id="first-name" required type="text" name="first_name" autocomplete="given-name" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <div>
        <label for="last-name" class="block text-sm/6 font-semibold text-white">Last name</label>
        <div class="mt-2.5">
          <input id="last-name" required type="text" name="last_name" autocomplete="family-name" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm/6 font-semibold text-white">Email</label>
        <div class="mt-2.5">
          <input id="email" required type="email" name="email" autocomplete="email" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="phone-number" class="block text-sm/6 font-semibold text-white">Phone number</label>
        <div class="mt-2.5">
          <div class="flex rounded-md bg-white/5 outline-1 -outline-offset-1 outline-white/10 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-500">

            <input id="phone-number" required type="text" name="phone_number" placeholder="(+91)" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
          </div>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm/6 font-semibold text-white">Message</label>
        <div class="mt-2.5">
          <textarea id="message" required name="message" rows="4" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500"></textarea>
        </div>
      </div>

    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Submit</button>
    </div>
  </form>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/forgeassignments/partials/footer.php'?>

</body>
</html>