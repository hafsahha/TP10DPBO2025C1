<?php
require_once 'model/Venue.php';

class VenueViewModel {
    private $venue;

    public function __construct() {
        $this->venue = new Venue();
    }

    public function getVenueList() {
        return $this->venue->getAll();
    }

    public function getVenueById($id) {
        return $this->venue->getById($id);
    }

    public function addVenue($venue_name, $location) {
        return $this->venue->create($venue_name, $location);
    }

    public function updateVenue($id, $venue_name, $location) {
        return $this->venue->update($id, $venue_name, $location);
    }

    public function deleteVenue($id) {
        return $this->venue->delete($id);
    }
}
?>
