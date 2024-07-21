<?php 

class ListNode { 
	public $data = NULL; 
	public $next = NULL; 

	public function __construct($data = NULL) { 
		$this->data = $data; 
	} 
} 

class LinkedList { 
	private $firstNode = NULL; 

	// Add a new node to the end of the list 
	public function insert($data) { 
		$newNode = new ListNode($data); 
		if ($this->firstNode === NULL) { 
			$this->firstNode = $newNode; 
		} else { 
			$currentNode = $this->firstNode; 
			while ($currentNode->next !== NULL) { 
				$currentNode = $currentNode->next; 
			} 
			$currentNode->next = $newNode; 
		} 
	} 

	// Traverse the list 
	public function traverse() { 
		$currentNode = $this->firstNode; 
		while ($currentNode !== NULL) { 
			echo $currentNode->data . "\n"; 
			$currentNode = $currentNode->next; 
		} 
	} 

	// Reverse the list 
	public function reverse() { 
		$prev = NULL; 
		$current = $this->firstNode; 
		while ($current !== NULL) { 
			$next = $current->next; 
			$current->next = $prev; 
			$prev = $current; 
			$current = $next; 
		} 
		$this->firstNode = $prev; 
	} 

	// Delete a node from the list 
	public function delete($data) { 
		$current = $this->firstNode; 
		$prev = NULL; 
		while ($current !== NULL) { 
			if ($current->data === $data) { 
				if ($prev === NULL) { 
					$this->firstNode = $current->next; 
				} else { 
					$prev->next = $current->next; 
				} 
				return; 
			} 
			$prev = $current; 
			$current = $current->next; 
		} 
	} 
} 

$list = new LinkedList(); 
$list->insert(1); 
$list->insert(2); 
$list->insert(3); 

echo "Linked List: \n"; 
$list->traverse(); 

$list->reverse(); 
echo "Reversed Linked List: \n"; 
$list->traverse(); 

$list->delete(2); 
echo "Linked List after deleting 2: \n"; 
$list->traverse(); 

?>
