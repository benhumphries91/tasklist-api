<?php

// allows us to throw our own task exception
class TaskException extends Exception {}

class Task {

    // use of _ before variable name is is to used to define instance varaibles
    private $_id;
    private $_title;
    private $_description;
    private $_deadline;
    private $_completed;

    public function __construct($id, $title, $description, $deadline, $completed) {
        $this->setID($id);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setDeadline($deadline);
        $this->setCompleted($completed);
    }

    public function getID() {
        return $this->_id;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getDeadline() {
        return $this->_deadline;
    }

    public function getCompleted() {
        return $this->_completed;
    }

    public function setID($id) {

        // 9223372036854775807 is the maxium id value
        // we check that $this->_id is null so we do not overwrite any id's
        if(($id !== null) && (!is_numeric($id) || $id <= 0 || $id > 9223372036854775807 || $this->_id !== null)) {
            throw new TaskException("Task ID Error");
        }

        $this->_id = $id;
    }

    public function setTitle($title) {
        if(strlen($title) < 0 || strlen($title) > 255) {
            throw new TaskException("Task Title error");
        }

        $this->_title = $title;
    }

    public function setDescription($description) {
        if(($description !== null) && (strlen($description) > 16777215)) {
            throw new TaskException("Task Description error");
        }

        $this->_description = $description;
    }

    public function setDeadline($deadline) {
        // checks if the conversion of the date string passed in is converted to a date object
        // and then when that date object is converted back to the string
        // it is still the same string as what is passed in as $deadline
        if(($deadline !== null) && date_format(date_create_from_format('d/m/Y H:i', $deadline), 'd/m/Y H:i') != $deadline) {
            throw new TaskException("Task Deadline Date Time error");
        }

        $this->_deadline = $deadline;
    }

    public function setCompleted($completed) {
        if(strtoupper($completed) !== 'Y' && strtoupper($completed) !== 'N') {
            throw new TaskException("Task Completed must be 'Y' or 'N'");
        }

        $this->_completed = $completed;
    }

    public function returnTaskAsArray() {
        $task = array();
        $task['id'] = $this->getID();
        $task['title'] = $this->getTitle();
        $task['description'] = $this->getDescription();
        $task['deadline'] = $this->getDeadline();
        $task['completed'] = $this->getCompleted();
        return $task;
    }
}