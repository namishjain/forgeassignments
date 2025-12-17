
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
<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">

  <?php
      $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fa";

    $conn = new mysqli($servername, 
            $username, $password,$database);
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['full_name'])){
        $full_name = $_POST['full_name'];
    }
    else{
        $full_name = '';
    }

    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $assignment_id = $_POST['id'];

    $query = "INSERT INTO `find` (`full_name`, `email` ,`phone_number`,`assignment_id`,`timestamp`) VALUES ('$full_name', '$email', '$phone_number','$assignment_id',current_timestamp())";

    $result = mysqli_query($conn, $query);
    if(mysqli_affected_rows($conn) != 0){

                echo '<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">Application Sent</p>
      <p class="text-sm">More Information Regarding the Host will be delievered to your email address</p>
    </div>

    <script>
    const myTimeout = setTimeout(myStopFunction, 3000);

function myStopFunction() {
  window.location.href = "/forgeassignments/";
}
    </script>
  </div>
</div>
';
            }
            else{
                echo "<script>alert('Unknown error occurred');window.location.reload()</script>";
            }

    
}
else{
if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  else{
    $id = '';
  }

  $query =     $query = "SELECT * FROM host
WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = $result->fetch_assoc();
echo '
<div>
  <div class="px-4 sm:px-0">
    <h3 class="text-base/7 font-semibold text-white">Assignment Information</h3>
  </div>
  <div class="mt-6 border-t border-white/10">
    <dl class="divide-y divide-white/10">
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-100">Host name</dt>
        <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">'. $row['full_name'] .'</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-100">Branch</dt>
        <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">'. $row['branch'] .'</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-100">Hostel</dt>
        <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">'. $row['hostel'] .'</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-100">Pages</dt>
        <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">'. $row['pages'] .'</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-100">Reward</dt>
        <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">₹'. $row['price'] .'</dd>
      </div>
      <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
        <dt class="text-sm/6 font-medium text-gray-100">Additional Information</dt>
        <dd class="mt-1 text-sm/6 text-gray-400 sm:col-span-2 sm:mt-0">'. $row['message'] .'</dd>
      </div>



</div>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Apply for the Assignment</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form action="#" method="POST" class="space-y-6">
      

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-100">Your Full Name</label>

        </div>
        <div class="mt-2">
          <input id="name" type="text" name="full_name" required autocomplete="current-password" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-100">Your Email address</label>
        <div class="mt-2">
          <input id="email" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
      </div>
      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-100">Your Phone Number</label>
        <div class="mt-2">
          <input id="email" type="number" name="phone_number" required autocomplete="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        </div>
      </div>

<input id="email" type="number" name="id" autocomplete="email" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" style="opacity:0;cursor:default" value="'. $row['id'] .'"/>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Apply</button>
      </div>
    </form>

  </div>
</div>

';

}

  
  ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/forgeassignments/partials/footer.php'?>

</body>
</head>