<?php
require_once 'viewmodel/EventViewModel.php';
require_once 'viewmodel/VenueViewModel.php';
require_once 'viewmodel/TicketViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'event';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'event') {
    $viewModel = new EventViewModel();
    if ($action == 'list') {
        $eventList = $viewModel->getEventList();
        require_once 'views/event_list.php';
    } elseif ($action == 'add') {
        require_once 'views/event_form.php';
    } elseif ($action == 'edit') {
        $event = $viewModel->getEventById($_GET['id']);
        require_once 'views/event_form.php';
    } elseif ($action == 'save') {
        $viewModel->addEvent($_POST['event_name'], $_POST['event_date']);
        header('Location: index.php?entity=event');
    } elseif ($action == 'update') {
        $viewModel->updateEvent($_GET['id'], $_POST['event_name'], $_POST['event_date']);
        header('Location: index.php?entity=event');
    } elseif ($action == 'delete') {
        $viewModel->deleteEvent($_GET['id']);
        header('Location: index.php?entity=event');
    }
} elseif ($entity == 'venue') {
    $viewModel = new VenueViewModel();
    if ($action == 'list') {
        $venueList = $viewModel->getVenueList();
        require_once 'views/venue_list.php';
    } elseif ($action == 'add') {
        require_once 'views/venue_form.php';
    } elseif ($action == 'edit') {
        $venue = $viewModel->getVenueById($_GET['id']);
        require_once 'views/venue_form.php';
    } elseif ($action == 'save') {
        $viewModel->addVenue($_POST['venue_name'], $_POST['location']);
        header('Location: index.php?entity=venue');
    } elseif ($action == 'update') {
        $viewModel->updateVenue($_GET['id'], $_POST['venue_name'], $_POST['location']);
        header('Location: index.php?entity=venue');
    } elseif ($action == 'delete') {
        $viewModel->deleteVenue($_GET['id']);
        header('Location: index.php?entity=venue');
    }
} elseif ($entity == 'ticket') {
    $viewModel = new TicketViewModel();
    if ($action == 'list') {
        $ticketList = $viewModel->getTicketList();
        require_once 'views/ticket_list.php';
    } elseif ($action == 'add') {
        $events = $viewModel->getEvents();
        $venues = $viewModel->getVenues();
        require_once 'views/ticket_form.php';
    } elseif ($action == 'edit') {
        $ticket = $viewModel->getTicketById($_GET['id']);
        $events = $viewModel->getEvents();
        $venues = $viewModel->getVenues();
        require_once 'views/ticket_form.php';
    } elseif ($action == 'save') {
        $viewModel->addTicket($_POST['event_id'], $_POST['venue_id'], $_POST['price']);
        header('Location: index.php?entity=ticket');
    } elseif ($action == 'update') {
        $viewModel->updateTicket($_GET['id'], $_POST['event_id'], $_POST['venue_id'], $_POST['price']);
        header('Location: index.php?entity=ticket');
    } elseif ($action == 'delete') {
        $viewModel->deleteTicket($_GET['id']);
        header('Location: index.php?entity=ticket');
    }
} else {
    // Default fallback
    header('Location: index.php?entity=event&action=list');
}
