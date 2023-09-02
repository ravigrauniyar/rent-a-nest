<section class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <?php if (isset($errMsg)): ?>
                    <div style="color:#FF0000;text-align:center;font-size:17px;"><?= $errMsg ?></div>
                <?php endif; ?>
                <div class="table-responsive table-bordered p-3 mx-5" style="background-color: rgba(0,0,0,0.25); max-height: 75vh;">
                    <h2 class="mb-3">List Of Users</h2>
                    <table class="table" style="background-color: #FFF; color: #000;">
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
