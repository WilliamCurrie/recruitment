<?php require __DIR__ . '/../shared/header.php'; ?>

<a class="btn btn-outline-primary mb-4" href="/customers"><i class="fas fa-arrow-left mr-2"></i> Back to customers</a>

<?php if($this->data['message']): ?>
<div class="alert alert-<?= $this->data['signal']; ?>" role="alert"><?= $this->data['message']; ?></div>
<?php endif; ?>

<form action="//<?php echo htmlspecialchars($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" method="post">
    <input type="hidden" name="customerId" value="<?= $this->data['customerId']; ?>" />
    <div class="form-group">
        <label for="firstName">First name <span class="text-primary">*</span></label>
        <input type="text" class="form-control" id="firstName" name="firstName" value="<?= $this->data['firstName']; ?>" />
    </div>
    <div class="form-group">
        <label for="lastName">Last name <span class="text-primary">*</span></label>
        <input type="text" class="form-control" id="lastName" name="lastName" value="<?= $this->data['lastName']; ?>" />
    </div>
    <div class="form-group">
        <label for="address">Address <span class="text-primary">*</span></label>
        <input type="text" class="form-control" id="address" name="fullAddress" value="<?= $this->data['fullAddress']; ?>" />
    </div>
    <div class="form-group">
        <label for="twitterAlias">Twitter alias</label>
        <input type="text" class="form-control" id="twitterAlias" name="twitterAlias" value="<?= $this->data['twitterAlias']; ?>" />
    </div>
    <button type="submit" class="btn btn-primary mt-3"><?= empty($this->data['customerId']) ? 'Add customer' : 'Save changes'; ?></button>
</form>

<?php require __DIR__ . '/../shared/footer.php'; ?>