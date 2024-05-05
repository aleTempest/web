<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="../public/index.php?controller=CareerController&action=create" class="needs-validation" novalidate>
                    <input type="hidden" value="<?php echo $career['id_career'] ?>">
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <div class="input-group has-validation">
                            <input type="text" id="form3Example3" class="form-control form-control-lg" value="<?php echo $career['career_name'] ?>"
                                   placeholder="Enter a valid username " name="career_name" required/>
                            <div class="invalid-feedback">
                                Enter a valid value
                            </div>
                        </div>
                        <label class="form-label" for="form3Example3">Career Name</label>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
