<form action="" method="POST">
    <input type="name" name="name">
    <input type="age" name="age" >
    <button type="submit">send</button>
</form>

<?php if (isset($formData)): ?>
<h3>Your name:</h3>
<?= $formData['name'] ?>
<h3>Your age:</h3>
<?= $formData['age'] ?>

<?php endif; ?>
