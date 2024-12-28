<?php
require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager('', '', '', '');

$id = $_GET['id'] ?? null;
if ($id == null) {
    header("location: ../index.php");
}
$vehicles  =  $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;
if (!$vehicle) {
    header("location: ../index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicle = new vehicleManager('', '', '', '');
    $vehicle->editVehicle($id, [
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image'],
    ]);
    header("location: ../index.php");
    exit();
}


include './header.php';
?>


<div class="container my-4">
    <h1>Edit Vehicle</h1>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Vehicle Name</label>
            <input type="text" name="name" class="form-control" value="<?= $vehicle['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Vehicle Type</label>
            <input type="text" name="type" class="form-control" value="<?= $vehicle['type']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="<?= $vehicle['price']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="<?= $vehicle['image']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Vehicle</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>

</html>