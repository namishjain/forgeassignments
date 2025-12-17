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


<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Find Assignments</h2>
      <p class="mt-2 text-lg/8 text-gray-300">Complete Assignments on Time to Get Reward</p>
    </div>
    <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-700 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
    <?php
    
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fa";

    $conn = new mysqli($servername, 
            $username, $password,$database);

    $query = "SELECT * FROM host
WHERE resolved=0 LIMIT 30";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<article class="flex max-w-xl flex-col items-start justify-between">


        <div class="group relative grow">
          <h3 class="mt-3 text-lg/6 font-semibold text-white group-hover:text-gray-300">
            <a href="#">
              <span class="absolute inset-0"></span>
              '. $row['pages'].' Pages Assignment
            </a>
          </h3>
          <p class="mt-5 line-clamp-3 text-sm/6 text-gray-400">'. $row['message'] .'</p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4 justify-self-end">

          <div class="text-sm/6">
            <p class="font-semibold text-white">
              <a href="/forgeassignments/assignment?id='. $row['id'] .'">
                <span class="absolute inset-0"></span>
                
              </a>
            </p>
            <p class="text-gray-400">By <b>'. $row['full_name'] .'</b></p><br>
<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="/forgeassignments/assignment?id='. $row['id'] .'">
  View More
</a>
<style>
  .btn {
    @apply font-bold py-2 px-4 rounded;
  }
  .btn-blue {
    @apply bg-blue-500 text-white;
  }
  .btn-blue:hover {
    @apply bg-blue-700;
  }
</style>

          </div>
        </div>
      </article>';
    }
}
    ?>  

    </div>
  </div>
</div>

</div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'].'/forgeassignments/partials/footer.php'?>
</body>
</html>