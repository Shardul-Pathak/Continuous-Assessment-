<?php

class Todo
{
    public string $description;
    public string $dueDate;
    public bool $isCompleted = false;
    public int $id;
    
    public function __construct(string $description, string $dueDate, int $id)
    {
        $this->description = $description;
        $this->dueDate = $dueDate;
        $this->id = $id;
    }
    
    public function markAsCompleted()
    {
        $this->isCompleted = true;
        return $this;
    }

    public function formatDueDate()
    {
        return date('F jS, Y', strtotime($this->dueDate));
    }
}