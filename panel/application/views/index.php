<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('includes/head.php'); ?>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->

    <?php $this->load->view('includes/navbar.php'); ?>

    <?php $this->load->view('includes/aside.php'); ?>

    <main id="app-main" class="app-main">
        <div class="wrap">
            <section class="app-content">

                content

            </section><!-- #dash-content -->
        </div><!-- .wrap -->

        <?php $this->load->view('includes/footer.php'); ?>

    </main>

    <?php $this->load->view('includes/customizer.php'); ?>

    <?php $this->load->view('includes/script.php'); ?>
</body>

</html>