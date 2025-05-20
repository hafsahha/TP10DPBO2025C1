<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($event) ? 'Edit Event' : 'Add Event'; ?></h2>
<form action="index.php?entity=event&action=<?php echo isset($event) ? 'update&id=' . $event['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Event Name:</label>
        <input type="text" name="event_name" value="<?php echo isset($event) ? htmlspecialchars($event['event_name']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Event Date:</label>
        <input type="date" name="event_date" value="<?php echo isset($event) ? $event['event_date'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
