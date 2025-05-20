<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($venue) ? 'Edit Venue' : 'Add Venue'; ?></h2>
<form action="index.php?entity=venue&action=<?php echo isset($venue) ? 'update&id=' . $venue['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Venue Name:</label>
        <input type="text" name="venue_name" value="<?php echo isset($venue) ? htmlspecialchars($venue['venue_name']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Location:</label>
        <input type="text" name="location" value="<?php echo isset($venue) ? htmlspecialchars($venue['location']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
