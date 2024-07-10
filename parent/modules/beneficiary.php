<?php include "../header.php";
include "dashboards/dash_dash.php";
date_default_timezone_set('Asia/Manila');
?>
<main class="content px-3 py-2">
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- Post content-->
                <?php
                if ($announcements) {
                    foreach ($announcements as $ann) {
                ?>
                        <article class="bg-white p-5">
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1"><?php echo $ann['title']; ?></h1>
                                <!-- Post meta content-->
                           
                                <?php if ($ann['date_inserted'] == date("F d,Y")) { ?>
                                    <span class="badge text-bg-success">NEW RELEASE ANNOUNCEMENTS!</span>
                                <?php } else { ?>
                                    <!-- BLANK -->
                                <?php } ?>
                                <div class="text-muted fst-italic mb-2">Posted on <?php echo $ann['date_inserted']; ?></div>
                                
                                <!-- Post categories-->

                          
                            </header>
                            <!-- Preview image figure-->
                            <div class="text-center">
                            <figure class="mb-4"><img class="img-fluid rounded" width="60%" src="../../admin/modules/announcements_news/uploads/<?php echo $ann['photo']; ?>" alt="No Photo" /></figure>
                            </div>
                            
                            <!-- Post content-->
                            <section class="mb-5">
                                <div class="col-md-12 mb-3">
                                            <div class="card h-100">
                                                <div class="card-body">
                                                    <h6><?php echo $ann['activity_desc']; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                            </section>
                        </article>
                        <hr>
                    <?php
                    }
                } else {
                    ?>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</main>
<?php include "../footer.php"; ?>