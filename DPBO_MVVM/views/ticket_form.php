<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($ticket) ? 'Edit Ticket' : 'Add Ticket'; ?></h2>
<form action="index.php?entity=ticket&action=<?php echo isset($ticket) ? 'update&id=' . $ticket['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Event:</label>
        <select name="event_id" class="border p-2 w-full" required>
            <?php foreach ($events as $event): ?>
            <option value="<?php echo $event['id']; ?>" <?php echo isset($ticket) && $ticket['event_id'] == $event['id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($event['event_name']); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Venue:</label>
        <select name="venue_id" class="border p-2 w-full" required>
            <?php foreach ($venues as $venue): ?>
            <option value="<?php echo $venue['id']; ?>" <?php echo isset($ticket) && $ticket['venue_id'] == $venue['id'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($venue['venue_name']); ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Price:</label>
        <input type="number" name="price" value="<?php echo isset($ticket) ? $ticket['price'] : ''; ?>" class="border p-2 w-full" required min="0" step="0.01">
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
