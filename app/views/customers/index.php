<?php require APP_ROOT . "/views/inc/header.php"; ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
    Add New Customer
</button>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adding New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="?url=customer/addCustomer">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="John">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Doe">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter Alias</label>
                        <input type="text" name="twitter_alias" class="form-control" id="twitter" placeholder="@coder">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>


        </div>
    </div>
</div>

<table  id="customers" class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Address</th>
            <th scope="col">Twitter Alias</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['customers'] as $id => $customer): ?>
            <tr>
                <th scope="row"><?= $customer->id ?></th>
                <td><?= $customer->first_name ?></td>
                <td><?= $customer->last_name ?></td>
                <td><?= $customer->address ?></td>
                <td><?= $customer->twitter_alias ?></td>
            </tr>

        <?php endforeach; ?>


    </tbody>
</table>

<?php require APP_ROOT . "/views/inc/footer.php"; ?>