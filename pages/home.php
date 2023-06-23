<?php include 'pages/includes/header.php'?>

<!-- Menu form start--->
<section class="py-5">
<div class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header ">
                    Single Image upload form
                </div>
                    <span class="text-center" style="font-size: 12px !important;">
                        <?php if (isset($_SESSION['message'])) {?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            ?>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                             </button>
                            </div>
                        <?php } ?>
                    </span>
                <div class="card-body">

                    <form action="action.php" method="post" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="col-md-3">Image One</label>
                                <div class="col-md-8 mt-2">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="col-md-3"></label>
                                <div class="col-md-8 mt-2">
                                    <input type="submit" name="btn" class="btn btn-success px-5 m-lg-2" value="Upload Image">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</section>
<!-- Menu form end--->

<?php include 'pages/includes/footer.php'?>