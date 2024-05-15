<?php


interface Observer {
    public function update($state);
}


interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}


//company
class ConcreteSubject implements Subject {
    private $observers = [];
    private $state;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $newObservers = [];
        foreach ($this->observers as $obs) {
            if ($obs !== $observer) {
                $newObservers[] = $obs;
            }
        }
        $this->observers = $newObservers;
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->state);
        }
    }

    public function setState($state) {
        $this->state = $state;
        $this->notify();
    }

    public function getState() {
        return $this->state;
    }
}

//user
class ConcreteObserver implements Observer {
    private $name;
    private $subject;

    public function __construct($name, Subject $subject) {
        $this->name = $name;
        $this->subject = $subject;
        $this->subject->attach($this);
        //$_SESSION['observer'] = $this;

    }


    public function update($state) {
       
        $file = fopen("notification.txt", "a+") or die("Unable to open file!");
        $concat = $this->name . $state;
        fwrite($file, $concat);
        echo "New {$this->name} has been added:  {$concat}\n";
        fclose($file);
}
}





?>
