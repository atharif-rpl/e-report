<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");
$report_unsolved = query("SELECT  COUNT(status) as status FROM reports WHERE status = 0");
$report_solved = query("SELECT COUNT(status) as status FROM reports WHERE status = 1");


include_once($_SERVER['DOCUMENT_ROOT'] . "/utils/functions.php");

$user_id = $_SESSION['user_id'];
$role_name = $_SESSION['role_name'];

if ($role_name !== 'masyarakat') {
    $reports = query("SELECT reports.*, users.name FROM reports JOIN users ON users.id = reports.user_id");
} else {
    $reports = query(
        "SELECT reports.*, users.name FROM reports JOIN users ON users.id = reports.user_id WHERE user_id = '$user_id'"
    );
}

?>
<style>
  @keyframes border-animate {
    0% {
      background-position: 0% 50%;
    }
    100% {
      background-position: 100% 50%;
    }
  }

  .group-hover\:animate-border-animate {
    background-image: linear-gradient(90deg, rgba(255, 0, 150, 0.8), rgba(255, 255, 0, 0.8), rgba(0, 204, 255, 0.8));
    background-size: 200% 200%;
    animation: border-animate 5s linear infinite;
  }
</style>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
    <div class="border-2 border-dashed rounded-full border-gray-300 dark:border-gray-600 h-32 md:h-64 p-4">
    <a href="#" class="group relative flex flex-col justify-center items-center text-center w-full h-full bg-white border border-gray-200 rounded-full shadow hover:bg-gray-100 dark:bg-purple-600 dark:border-purple-500 dark:hover:bg-purple-700">
    <!-- Konten utama -->
    <div class="relative z-10 p-4">
        <h5 class="js-count-upp mb-2 text-xl md:text-7xl font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-yellow-300 transition-transform duration-300 group-hover:scale-105">
            <?= $report_unsolved[0]['status'] ?>
        </h5>
        <p class="font-normal text-gray-300 text-xl group-hover:text-gray-200 transition-opacity duration-300">
            Laporan diterima
        </p>
    </div>

    <!-- Efek cahaya mengelilingi tombol -->
    <span class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-yellow-300 transition-all duration-500">
        <span class="absolute inset-0 w-full h-full border-2 border-yellow-300 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-glow"></span>
    </span>
</a>

<!-- CSS Animasi Cahaya Berkeliling -->
<style>
    @keyframes glow {
        0% {
            box-shadow: 0 0 10px rgba(255, 223, 51, 0.2), 0 0 20px rgba(255, 223, 51, 0.3), 0 0 30px rgba(255, 223, 51, 0.4);
            transform: scale(1);
        }
        50% {
            box-shadow: 0 0 30px rgba(255, 223, 51, 0.5), 0 0 40px rgba(255, 223, 51, 0.6), 0 0 50px rgba(255, 223, 51, 0.7);
            transform: scale(1.05);
        }
        100% {
            box-shadow: 0 0 10px rgba(255, 223, 51, 0.2), 0 0 20px rgba(255, 223, 51, 0.3), 0 0 30px rgba(255, 223, 51, 0.4);
            transform: scale(1);
        }
    }

    .group-hover\:animate-glow {
        animation: glow 1.5s infinite ease-in-out;
    }
</style>
   

    </div>
    <div class="border-2 border-dashed rounded-full border-gray-300 dark:border-gray-600 h-32 md:h-64 p-4">
      <a href="#" class="group relative flex flex-col justify-center items-center text-center w-full h-full bg-white border border-gray-200 rounded-full shadow hover:bg-gray-100 dark:bg-purple-600 dark:border-purple-500 dark:hover:bg-purple-700">
    <!-- Konten utama -->
    <div class="relative z-10 p-4">
        <h5 class="js-count-up mb-2 text-xl md:text-7xl font-bold tracking-tight text-gray-900 dark:text-white group-hover:text-yellow-300 transition-transform duration-300 group-hover:scale-105">
            <?= $report_solved[0]['status'] ?>
        </h5>
        <p class="font-normal text-gray-300 text-xl group-hover:text-gray-200 transition-opacity duration-300">
            Laporan Selesai
        </p>
    </div>

    <!-- Efek cahaya mengelilingi tombol -->
    <span class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-yellow-300 transition-all duration-500">
        <span class="absolute inset-0 w-full h-full border-2 border-yellow-300 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-glow"></span>
    </span>
</a>

<!-- CSS Animasi Cahaya Berkeliling -->
<style>
    @keyframes glow {
        0% {
            box-shadow: 0 0 10px rgba(255, 223, 51, 0.2), 0 0 20px rgba(255, 223, 51, 0.3), 0 0 30px rgba(255, 223, 51, 0.4);
            transform: scale(1);
        }
        50% {
            box-shadow: 0 0 30px rgba(255, 223, 51, 0.5), 0 0 40px rgba(255, 223, 51, 0.6), 0 0 50px rgba(255, 223, 51, 0.7);
            transform: scale(1.05);
        }
        100% {
            box-shadow: 0 0 10px rgba(255, 223, 51, 0.2), 0 0 20px rgba(255, 223, 51, 0.3), 0 0 30px rgba(255, 223, 51, 0.4);
            transform: scale(1);
        }
    }

    .group-hover\:animate-glow {
        animation: glow 1.5s infinite ease-in-out;
    }
</style>

    </div>


    

    
    <script>
    // Ambil nilai dari PHP
    var countTarget = <?php echo $report_solved[0]['status']; ?>;

    function countItUp(numb) {
      var secondsLabel = document.querySelector(".js-count-up");
      var totalSeconds = 0;

      var countdown = setInterval(function () {
        totalSeconds++;
        secondsLabel.innerHTML = totalSeconds;

        if (totalSeconds >= numb) {
          clearInterval(countdown);
        }
      }, 200); // 0.1 detik interval
    }

    // Panggil fungsi countItUp dengan nilai dari PHP
    countItUp(countTarget);
    </script>

<script>
    // Ambil nilai dari PHP
    var countTargett = <?php echo $report_unsolved[0]['status']; ?>;

    function countItUp(numb) {
      var secondsLabel = document.querySelector(".js-count-upp");
      var totalSeconds = 0;

      var countdown = setInterval(function () {
        totalSeconds++;
        secondsLabel.innerHTML = totalSeconds;

        if (totalSeconds >= numb) {
          clearInterval(countdown);
        }
      }, 200); // 0.1 detik interval
    }

    // Panggil fungsi countItUp dengan nilai dari PHP
    countItUp(countTargett);
    </script>
</div>

<div class="relative overflow-x-auto sm:rounded-lg mt-10 w-full">
    <table class="text-sm text-left rtl:text-right text-gray-500 w-full" id="pagination-table">
        <thead class="text-xs text-white uppercase bg-gradient-to-br from-blue-600 via-indigo-500 to-purple-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Sender
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <?php if ($role_name !== 'masyarakat') : ?>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($reports)) : ?>
                <tr>
                    <td colspan="6" class="bg-blue-400 px-6 py-4 text-center text-white">
                        Data kosong
                    </td>
                </tr>
            <?php else :
                $no = 1;
            ?>
                <?php foreach ($reports as $report) : ?>
                    <tr class="bg-gradient-to-br from-blue-600 via-indigo-500 to-purple-700 border-b hover:bg-gradient-to-br hover:from-indigo-600 hover:via-blue-600 hover:to-purple-800 hover:scale-105 hover:shadow-xl text-white transition-all duration-300 transform hover:translate-x-2">
                        <td class="px-6 py-4 font-bold">
                            <?= $no++ ?>
                        </td>
                        <td class="px-6 py-4 font-bold">
                            <?= $report['name'] ?>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-white whitespace-nowrap">
                            <?= $report['title'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $report['created_at'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $report['status'] == 0 ?  "Not solved" : "Solved" ?>
                        </td>
                        <?php if ($role_name !== 'masyarakat') : ?>
                            <td class="px-6 py-4 flex justify-start items-center ">
                                <?php if ($report['status'] == 0) : ?>
                                    <a href="#" onclick="confirmApprove('reports_approve', 'id', <?= $report['id'] ?>)" class="font-medium text-white hover:text-yellow-300 hover:underline">
                                        <svg class="mr-4 w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </a>
                                <?php endif ?>

                                <a href="index.php?page=detail&id=<?= $report['id'] ?>" class="font-medium text-white hover:text-yellow-300 hover:underline">
                                    <svg class="mr-4 w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <a href="#" onclick="confirmDelete('reports_delete', 'id',<?= $report['id'] ?>)" class="font-medium text-white hover:text-yellow-300 hover:underline">
                                    <svg class="w-4 h-4 md:w-5 md:h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>

<style>
    .hover\:bg-gradient-to-br:hover {
        background-image: linear-gradient(to bottom right, #3B82F6, #6366F1, #8B5CF6); /* Gradasi biru ke ungu */
    }

    .transition-all {
        transition: all 0.3s ease; /* Transisi untuk animasi yang lebih halus */
    }

    .hover\:scale-105:hover {
        transform: scale(1.05); /* Sedikit perbesaran saat dihover */
    }

    .hover\:shadow-xl:hover {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08); /* Bayangan yang lebih besar */
    }

    .transform {
        transform: translateX(0); /* Posisi default */
    }

    .hover\:translate-x-2:hover {
        transform: translateX(8px); /* Geser ke kanan sedikit saat hover */
    }

    .text-white {
        color: white; /* Teks berwarna putih */
    }
</style>


<?php
if (isset($_POST['submit'])) {
    handleFormSubmit($_POST, 'users', 'add');
}

if (isset($_POST['update'])) {
    handleFormSubmit($_POST, 'users', 'update');
}
?>


