<section class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card text-left table-responsive alert-info" style="max-height:75vh;">
                    <div class="card-header h4">
                        Compose Email
                    </div>
                    <div class="card-body py-1 px-3">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="recipients">To:</label>
                                <textarea id="recipients" name="recipients" rows="2" class="form-control" placeholder="Enter email addresses separated by commas..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter email subject" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea class="form-control" id="message" name="message" rows="3" placeholder="Compose your email" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="attachment">Attachment:</label>
                                <input type="file" class="form-control" id="attachment" name="attachment">
                            </div>
                            <button type="submit" class="btn btn-primary" name="send_email">Send Mail</button>
                        </form>
                    </div>
                    <p class="message"><?= $mail_result ?></p>
                </div>
            </div>
        </div>
    </div>
</section>