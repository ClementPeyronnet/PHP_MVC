<?php

class Query{
    
    
    private $select;
    private $from ;
    private $where ;
    private $group ;
    private $order  ;
    private $limit  ;
    
    
    
  public function from(string $table):self
          {
      $this->from = $table;
      return $this;
      
  }
  
  
  public function select(string ...$fields):self
          {
      
      $this->select = $fields;
      return $this;
      
  }
  
  public function where(string $condition):self
          {
      $this->where[]= $condition;
      return $this;
      
  }
  
  public function _tostring()
          {
      
      $parts = ['SELECT'];
      
      if($this->select){
          $parts[] = join(', ', $this->select);
      }else {
          $parts = '*';
      }
      $parts[] = 'FROM';
      $parts[] = $this->from;
      
      return join (' ', $parts);
      
  }
        
        
    }
        


