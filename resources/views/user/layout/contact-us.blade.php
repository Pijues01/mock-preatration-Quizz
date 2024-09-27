 <!-- Contact Us Section -->
 <section id="contact-section" class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row contact-container">
                    <!-- Left Column: Image -->
                    <div class="col-md-6">
                        <img src="{{url('/')}}/img/contact-us1.jpg" alt="Contact Image" class="contact-image">
                    </div>
                    <!-- Right Column: Form -->
                    <div class="col-md-6">
                        <form class="contact-form">
                            <h3 class="text-center mb-4">Contact Us</h3>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
