<section class="contact-form mb-4 px-4 px-md-0">
    <div class="container text-white pt-4 pb-5 rounded">
        <div class="row py-5">
            <div class="col col-12 text-center px-4">
                <h2 class="fw-semibold">Send us your Feedback Or Apply to become a Volunteer</h2>
            </div>
        </div>
        <div class="row">
            <div class="col col-12 d-flex justify-content-center px-4">
                <div class="form">   
                    <form class="contact-form">
                        <div class="alerts"></div>
                        <div class="form-field">    
                            <label>Full Name: </label><br>
                            <input id="name" class="w-100 border-0 rounded p-2 mt-1 mb-3" name="name" type="text" placeholder="Type your name">
                        </div>
                        <div class="form-field">    
                            <label>Email Address: </label><br>
                            <input id="email" class="w-100 border-0 rounded p-2 mt-1 mb-3" name="email"  type="email" placeholder="Type a valid email">
                        </div>
                        <div class="form-field">    
                            <label>Subject: </label><br>
                            <select id="subject" class="w-100 border-0 rounded p-2 mt-1 mb-3" name="subject" id="subject">
                                <option selected value>Select an option</option>
                                <option value="feedback">Feedback</option>
                                <option value="apply">Apply</option>
                            </select>
                        </div>
                        <div class="form-field">    
                            <label>Message: </label><br>
                            <textarea id="message" class="w-100 border-0 rounded p-2 mt-1 mb-3" name="message" placeholder="Type your message"></textarea>
                        </div>
                        <?php wp_nonce_field( 'ruthcare23-contact-nonce', 'contact-security' ); ?>
                        <div class="form-field text-center">
                            <button type="submit" aria-label="Submit button to submit contact form">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>