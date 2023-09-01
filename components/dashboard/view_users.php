<section class="wrapper" style="margin-left:20%;margin-top: -10%; background-color: #212529;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (isset($errMsg)): ?>
                    <div style="color:#FF0000;text-align:center;font-size:17px;"><?= $errMsg ?></div>
                <?php endif; ?>
                <h2>List Of Users</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <th scope="row"><?= $key + 1 ?></th>
                                    <td><?= $value['fullname'] ?></td>
                                    <td><?= $value['email'] ?></td>
                                    <td><?= $value['username'] ?></td>
                                    <td><?= $value['role'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
