                             
                             
                <!-- Main Content-->
        <main class="mb-4">
            <div class="container px-4 px-lg-5">
         <form  action="index.php?page=sign-in" method="POST">
                                <div class="form-floating">
                                    <input class="form-control" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                    <label for="name">Name</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" name="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                                    <label for="email">Email address</label>
                                    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                    <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                                </div>
                                 <div class="form-floating">
                                    <input class="form-control" name="password" type="password" placeholder="Enter your password..." data-sb-validations="required" />
                                    <label for="password">Password</label>
                                    <div class="invalid-feedback" data-sb-feedback="password:required">A password is required.</div>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" name="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                                    <label for="phone">Phone Number</label>
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                                </div>
                              
                              
                                <!-- Submit Button-->
                                <button class="btn btn-primary text-uppercase "  type="submit">Send</button>
                            </form>
                    </div>
        </main>