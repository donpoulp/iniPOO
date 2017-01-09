<?php

  class BaseWarrior
  {
      public $id = -1;
      public $weapon = NULL;

      static function getWarriorBase($w, $id)
      {
        if(empty($w))
        {
          throw new Exception('Il n\'y a plus de guerriers !!');
        }
        else {
          $w = unserialize(html_entity_decode($w));
        }

        if (isset($w[$id]))
        {
            return $w[$id];
        }
        else
        {
            throw new Exception($id . ' est Mort !!');
        }
      }

      static function getWarriorsBase($w)
      {
        if(empty($w))
        {
          throw new Exception('Il n\'y a plus de guerriers !!');
        }
        else {
          $w = unserialize(html_entity_decode($w));
        }

        return $w;
      }

      public function saveNewBase($w)
      {
        if(empty($w))
        {
          $w = array();
        }
        else {
          $w = unserialize(html_entity_decode($w));
        }

        // Check if warriors are presents
        if (array_key_exists ($this->id, $w))
        {
          throw new Exception('Le guerrier existe déjà, il doit mourrir avant de renaitre de ses cendres !!');
        }

        // Check if warrior is consistent
        if ($this->id == -1)
        {
            throw new Exception('Le guerrier à un ID invalid !!');
        }
        if ($this->weapon == NULL)
        {
            throw new Exception('Le guerrier n\'a pas d\'armes !!');
        }
        if (property_exists($this,'imageUrl') && empty($this->imageUrl))
        {
            throw new Exception('Le guerrier n\'a pas d\'image  !!');
        }

        if (property_exists($this->weapon,'imageUrl') && empty($this->weapon->imageUrl))
        {
            throw new Exception('L\'arme du guerrier n\'a pas d\'image  !!');
        }

        // Append this or modify with key
        $w[$this->id] = $this;

        return $w;
      }

      function saveBase($w)
      {
        if(empty($w))
        {
          $this->saveNew();
        }

        $w = unserialize(html_entity_decode($w));

        if ($this->life <= 0)
        {
          unset($w[$this->id]);
        }
        else {
          $w[$this->id] = $this;
        }

        return $w;
      }





  };




?>
