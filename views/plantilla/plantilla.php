<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->template->load_header(); ?>
        <?php $this->load->view('plantilla/css.php'); ?>
    </head>
    <body id="page-top">
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <!-- Container Fluid-->
                    <main class="contenidos">
                        <?= $contents ?>
                    </main>
                    <!---Container Fluid-->
                </div>
                <!-- Footer -->
                <?php $this->template->load_footer(); ?>
                <!-- Footer -->
            </div>
        </div>
        <!-- Scroll to top -->
            
<!--        <a class="scroll-to-top rounded" href="#page-top" style="background-color: #c90e14">
            
        </a>-->
        <?php $this->load->view('plantilla/js.php'); ?>
        <script>
            URLs = "<?= base_url().'index.php/' ?>";
        </script>
    </body>
</html>


