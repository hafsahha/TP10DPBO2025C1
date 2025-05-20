<?php
require_once 'model/Event.php';

class EventViewModel {
    private $event;

    public function __construct() {
        $this->event = new Event();
    }

    public function getEventList() {
        return $this->event->getAll();
    }

    public function getEventById($id) {
        return $this->event->getById($id);
    }

    public function addEvent($event_name, $event_date) {
        return $this->event->create($event_name, $event_date);
    }

    public function updateEvent($id, $event_name, $event_date) {
        return $this->event->update($id, $event_name, $event_date);
    }

    public function deleteEvent($id) {
        return $this->event->delete($id);
    }
}
?>
