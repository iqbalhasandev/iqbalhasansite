<!--=====================================================
        -------------  Contact Area Start-------------
    ========================================================-->
<section class="section  section-contact" id="contact-area">
    <div class="container">
        <div class="section-head">
            <span>say Hello</span>
            <h2>Contact </h2>
        </div>

    </div>

    <div class="contact-Otherdetails">
        <div class="container">
            <div class="contact-details">
                <h5 class="section-subHead mb-4"> Get in Touch</h5>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="contact-details--panel b-box p-4 text-center wow fadeInUp" data-wow-duration="1.5s">
                            <div class="mb-4 contact-details--icon ">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="">144 Mangan St, Miami, FL</a>
                                <p class="mt-3 font-weight-bold ">Address</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="contact-details--panel b-box p-4 text-center wow fadeInUp" data-wow-duration="1.5s">
                            <div class="mb-4 contact-details--icon ">
                                <i class="fas fa-mobile-alt  "></i>
                            </div>
                            <div class="mt-2">
                                <a href="tel:9876543210" class="">+987 654 3210</a>
                                <p class="mt-3 font-weight-bold ">Call Us</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="contact-details--panel b-box p-4 text-center wow fadeInUp" data-wow-duration="1.5s"
                            data-wow-delay=".2s">
                            <div class="mb-4 contact-details--icon ">
                                <i class="fas fa-envelope  "></i>
                            </div>
                            <div class="mt-2">
                                <a href="mailto:hello@beingeorge.com">hello@beingeorge.com</a>
                                <p class="mt-3 font-weight-bold ">Email Us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title section-subHead mb-4"> Contact Form</h5>

                        <div id="contact-nav">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link contact-nav-link active  my-1" id="pills-sales-tab"
                                        data-toggle="pill" href="#pills-sales" role="tab" aria-controls="pills-sales"
                                        aria-selected="true">
                                        <i class="fas fa-chart-line  d-block"></i>
                                        Pre-Sales
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link contact-nav-link  my-1" id="pills-proposal-tab"
                                        data-toggle="pill" href="#pills-proposal" role="tab"
                                        aria-controls="pills-proposal" aria-selected="false">
                                        <i class="fas fa-people-carry d-block"></i>
                                        Project Proposal
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link contact-nav-link  my-1" id="pills-others-tab" data-toggle="pill"
                                        href="#pills-others" role="tab" aria-controls="pills-others"
                                        aria-selected="false">
                                        <i class="fas fa-project-diagram  d-block"></i>
                                        Other
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <!-- sales -->
                            <div class="tab-pane fade show active" id="pills-sales" role="tabpanel"
                                aria-labelledby="pills-sales-tab">
                                <form method="post" action="php/contact.php" id="contactForm" data-toggle="validator">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="">Which product we can help you with? <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control b-box" name="" id="">
                                                    <option selected="selected">
                                                        Select Plugin
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input name="name" id="name" type="text" class="form-control b-box"
                                                    placeholder="Your Name *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="">Email <span class="text-danger">*</span></label>
                                                <input name="email" id="email" type="email" class="form-control b-box"
                                                    placeholder="Your Email *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Message <span class="text-danger">*</span></label>
                                                <textarea name="comments" id="comments" rows="4"
                                                    class="form-control b-box" placeholder="Your message..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-4 mb-5 text-center">
                                            <button type="submit"
                                                class="btn button-scheme my-1 button-white text-uppercase">
                                                Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- proposal -->
                            <div class="tab-pane fade" id="pills-proposal" role="tabpanel"
                                aria-labelledby="pills-proposal-tab">
                                <form method="post" action="php/contact.php" id="contactForm" data-toggle="validator">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="">Expected Project Delivery Time Frame <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control b-box" name="" id="">
                                                    <option value="null" selected="selected">—
                                                        Select —
                                                    </option>
                                                    <option value="">1 - 3 weeks
                                                    </option>
                                                    <option value="">1 Month</option>
                                                    <option value="">1 - 3 Months
                                                    </option>
                                                    <option value="">3 Months+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="">What type of project you want to be developed? <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control b-box" name="" id="">
                                                    <option value="null" selected="selected">—
                                                        Select —
                                                    </option>
                                                    <option value="">1 - 3 weeks
                                                    </option>
                                                    <option value="">1 Month</option>
                                                    <option value="">1 - 3 Months
                                                    </option>
                                                    <option value="">3 Months+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">What is your approximate budget look like? <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-control b-box" name="" id="">
                                                    <option value="null" selected="selected">—
                                                        Select —
                                                    </option>
                                                    <option value="">1 - 3 weeks
                                                    </option>
                                                    <option value="">1 Month</option>
                                                    <option value="">1 - 3 Months
                                                    </option>
                                                    <option value="">3 Months+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for=""> Name <span class="text-danger">*</span></label>
                                                <input name="name" id="name" type="text" class="form-control b-box"
                                                    placeholder="Your Name *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="">Email <span class="text-danger">*</span></label>
                                                <input name="email" id="email" type="email" class="form-control b-box"
                                                    placeholder="Your Email *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Project Descriptions <span
                                                        class="text-danger">*</span></label>
                                                <textarea name="comments" id="comments" rows="4"
                                                    class="form-control b-box"
                                                    placeholder="Your Project Descriptions..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for=""> Already have a doc about your project?
                                                <span class="text-danger">*</span></label>
                                            <input name="name" id="name" type="file" class="form-control b-box"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-4 mb-5 text-center">
                                            <button type="submit"
                                                class="btn button-scheme my-1 button-white text-uppercase">
                                                Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- others -->
                            <div class="tab-pane fade" id="pills-others" role="tabpanel"
                                aria-labelledby="pills-others-tab">
                                <form method="post" action="php/contact.php" id="contactForm" data-toggle="validator">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input name="name" id="name" type="text" class="form-control b-box"
                                                    placeholder="Your Name *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group mb-3">
                                                <label for="">Email <span class="text-danger">*</span></label>
                                                <input name="email" id="email" type="email" class="form-control b-box"
                                                    placeholder="Your Email *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Subject <span class="text-danger">*</span></label>
                                                <input name="email" id="email" type="email" class="form-control b-box"
                                                    placeholder="Your Subject *" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="">Message <span class="text-danger">*</span></label>
                                                <textarea name="comments" id="comments" rows="4"
                                                    class="form-control b-box" placeholder="Your message..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-4 mb-5 text-center">
                                            <button type="submit"
                                                class="btn button-scheme my-1 button-white text-uppercase">
                                                Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!--=====================================================
        -------------  Contact Area End-------------
    ========================================================-->
