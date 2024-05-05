<!--
Ejemplo de: https://mdbootstrap.com/docs/standard/extended/login/
-->
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="post" action="../public/index.php?controller=UserController&action=register" class="needs-validation" novalidate>
                    <input type="hidden" value="<?php echo $user['id_user'] ?>">
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <div class="input-group has-validation">
                            <input type="text" id="form3Example3" class="form-control form-control-lg" value="<?php echo $user['username'] ?>"
                                   placeholder="Enter a valid username " name="username" required />
                            <div class="invalid-feedback">
                                Enter a valid username
                            </div>
                        </div>
                        <label class="form-label" for="form3Example3">Username</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <div class="input-group has-validation">
                            <input type="password" id="form3Example4" class="form-control form-control-lg" value="<?php echo $user['password'] ?>"
                                   placeholder="Enter password" name="password" required />
                            <div class="invalid-feedback">
                                Enter a valid password
                            </div>
                        </div>
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <div class="input-group has-validation">
                            <input type="email" id="form3Example4" class="form-control form-control-lg" value="<?php echo $user['email'] ?>"
                                   placeholder="Enter password" name="email" required />
                            <div class="invalid-feedback">
                                Enter a valid email
                            </div>
                        </div>
                        <label class="form-label" for="form3Example4">Email</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <div class="input-group has-validation">
                            <input type="text" id="form3Example4" class="form-control form-control-lg" value="<?php echo $user['phone_number'] ?>"
                                   placeholder="Enter phone number" name="phone" required />
                            <div class="invalid-feedback">
                                Enter a valid phone number
                            </div>
                        </div>
                        <label class="form-label" for="form3Example4">Phone Number</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <div class="input-group has-validation">
                            <input type="date" id="form3Example4" class="form-control form-control-lg" value="<?php echo $user['birth'] ?>"
                                   placeholder="Enter birthday" name="date" required />
                            <div class="invalid-feedback">
                                Enter a valid birthday
                            </div>
                        </div>
                        <label class="form-label" for="form3Example4">Birthday</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <div class="input-group has-validation">
                            <input type="text" id="form3Example4" class="form-control form-control-lg" value="<?php echo $user['enrollment'] ?>"
                                   placeholder="Enter enrollment" name="enrollment" required />
                            <div class="invalid-feedback">
                                Enter a valid enrollment
                            </div>
                        </div>
                        <label class="form-label" for="form3Example4">Enrollment</label>
                    </div>

                    <div class="form-group">
                        <div class="form-check-inline">
                            <?php $checked1 = $user['type'] == 'student' ? 'checked' : ''; ?>
                            <?php $checked2 = $user['type'] == 'teacher' ? 'checked' : ''; ?>
                            <input class="form-check-input" type="radio" name="type" value="student" <?php echo $checked1 ?> required>
                            <label class="form-check-label" for="studentRadio">
                                Student
                            </label>
                            <input class="form-check-input" type="radio" name="type" value="teacher" <?php echo $checked2 ?> required>
                            <label class="form-check-label" for="teacherRadio">
                                Teacher
                            </label>
                            <div class="invalid-feedback">
                                You must choose one option.
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>

</section>
