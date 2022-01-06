<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('includes/head.php'); ?>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">

    <?php $this->load->view('includes/navbar.php'); ?>

    <?php $this->load->view('includes/aside.php'); ?>

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">

                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

            </section>
        </div>

        <?php $this->load->view('includes/footer.php'); ?>

    </main>
    <!--========== APP MAIN -->

    <?php $this->load->view('includes/customizer.php'); ?>

    <?php $this->load->view('includes/script.php'); ?>

</body>

</html>