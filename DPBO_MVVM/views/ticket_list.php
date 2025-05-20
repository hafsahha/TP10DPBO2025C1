<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Ticket List</h2>
<a href="index.php?entity=ticket&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Ticket</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Event Name</th>
        <th class="border p-2">Venue Name</th>
        <th class="border p-2">Location</th>
        <th class="border p-2">Price</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($ticketList as $ticket): ?>
    <tr>
        <td class="border p-2"><?php echo htmlspecialchars($ticket['event_name']); ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($ticket['venue_name']); ?></td>
        <td class="border p-2"><?php echo htmlspecialchars($ticket['location']); ?></td>
        <td class="border p-2"><?php echo number_format($ticket['price'], 2); ?></td>
        <td class="border p-2 flex space-x-2">
            <a href="index.php?entity=ticket&action=edit&id=<?php echo $ticket['id']; ?>" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
            
            <form action="index.php?entity=ticket&action=delete&id=<?php echo $ticket['id']; ?>" method="POST" onsubmit="return confirm('Are you sure?');" style="display:inline;">
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
