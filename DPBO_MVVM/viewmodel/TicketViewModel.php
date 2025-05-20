<?php
require_once 'model/Ticket.php';
require_once 'model/Event.php';
require_once 'model/Venue.php';

class TicketViewModel {
    private $ticket;
    private $event;
    private $venue;

    public function __construct() {
        $this->ticket = new Ticket();
        $this->event = new Event();
        $this->venue = new Venue();
    }

    public function getTicketList() {
        return $this->ticket->getAll();
    }

    public function getTicketById($id) {
        return $this->ticket->getById($id);
    }

    public function getEvents() {
        return $this->event->getAll();
    }

    public function getVenues() {
        return $this->venue->getAll();
    }

    public function addTicket($event_id, $venue_id, $price) {
        return $this->ticket->create($event_id, $venue_id, $price);
    }

    public function updateTicket($id, $event_id, $venue_id, $price) {
        return $this->ticket->update($id, $event_id, $venue_id, $price);
    }

    public function deleteTicket($id) {
        return $this->ticket->delete($id);
    }
}
?>
