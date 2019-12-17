@extends('layouts.Myapp')
@section('content')

            <div class="page-title">Contacts</div>
            <!-- PAGE CONTAINER -->
            <section class="pagecontainer using-grid">
                <!-- GRID -->
                <div class="grid">
                        <hr/>
                        <h3>Contact Form</h3>
                        <!-- CONTACT FORM -->
                        <form id="contactForm" action="http://sporty.wp4life.com/processform.php" method="post">
                            <label>Your Name:</label>
                            <input type="text" name="senderName" id="senderName" required="required" maxlength="40" />
                            <label>Your Email:</label>
                            <input type="email" name="senderEmail" id="senderEmail" required="required" maxlength="50" />
                            <label>Your Message:</label>
                            <textarea name="message" id="message" required="required"></textarea>
                            <input type="submit" id="sendMessage" name="sendMessage" class="button" value="Send Message" />
                        </form>
                    </div>
                </div>
            </section>






@endsection
