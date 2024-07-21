<?php 

class DoublyNode { 
	public $data; 
	public $next; 
	public $prev; 

	public function __construct($data) { 
		$this->data = $data; 
		$this->next = null; 
		$this->prev = null; 
	} 
} 

class DoublyLinkedList { 
	private $head; 

	public function __construct() { 
		$this->head = null; 
	} 

	public function insert($data) { 
		$newNode = new DoublyNode($data); 
		$newNode->next = $this->head; 
		if ($this->head !== null) { 
			$this->head->prev = $newNode; 
		} 
		$this->head = $newNode; 
	} 

	public function append($data) { 
		$newNode = new DoublyNode($data); 
		$newNode->next = null; 

		if ($this->head === null) { 
			$newNode->prev = null; 
			$this->head = $newNode; 
			return; 
		} 

		$last = $this->head; 
		while ($last->next !== null) { 
			$last = $last->next; 
		} 

		$last->next = $newNode; 
		$newNode->prev = $last; 
	} 

	public function delete($data) { 
		$current = $this->head; 

		while ($current !== null && $current->data !== $data) { 
			$current = $current->next; 
		} 

		if ($current === null) { 
			return; 
		} 

		if ($current->prev !== null) { 
			$current->prev->next = $current->next; 
		} else { 
			$this->head = $current->next; 
		} 

		if ($current->next !== null) { 
			$current->next->prev = $current->prev; 
		} 
	} 

	public function display() { 
		$current = $this->head; 
		while ($current !== null) { 
			echo $current->data . " "; 
			$current = $current->next; 
		} 
	} 
} 

$doublyList = new DoublyLinkedList(); 
$doublyList->insert(3); 
$doublyList->insert(7); 
$doublyList->insert(10); 
$doublyList->append(5); 

$doublyList->display(); // Output: 10 7 3 5 
$doublyList->delete(7); 
$doublyList->display(); // Output: 10 3 5 

?> 
