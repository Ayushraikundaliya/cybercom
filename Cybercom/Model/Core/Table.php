<?php

namespace Model\Core;
\Mage::getModel('Model\Core\Adapter');

class Table {
	protected $adapter = Null;
	protected $primaryKey = Null;
	protected $tableName = Null;
	protected $data = [];

	public function setPrimaryKey($primaryKey) {
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function getPrimaryKey() {
		return $this->primaryKey;
	}

	public function setTableName($tableName) {
		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName() {
		return $this->tableName;
	}

	public function setAdapter($adapter = Null) {
		if(!$adapter) {
			$adapter = new Adapter();
		}
		$this->adapter = $adapter;
		return $this;
	}

	public function getAdapter() {
		if(!$this->adapter) {
			$this->setAdapter();
		}
		return $this->adapter;
	}

	public function __set($key,$value) {
		$this->data[$key] = $value;
		return $this;
	}

	public function __get($key) {
		if(!array_key_exists($key, $this->data)) {
			return Null;
		}
		return $this->data[$key];
	}

	public function setData(array $data) {
		$this->data = array_merge($this->data,$data);
		return $this;
	}

	public function getData() {
		return $this->data;
	}

	public function load($value) {
        $value = (int)$value;
        $query = "SELECT * from `{$this->getTableName()}` where `{$this->getPrimaryKey()}`='{$value}'";
        return $this->fetchRow($query);
    }

    public function fetchAll($query = NULL) {   
        if (!$query) {
           $query = "SELECT * FROM `{$this->getTableName()}`";
        }
        $rows = $this->getAdapter()->fetchAll($query);

        if (!$rows) {
            return false;
        }
        foreach ($rows as $key => $value) {
            $rows = new $this;
            $rows->setData($value);
            $rowArray[] = $rows;
        }
        return $rowArray;
    }

    public function fetchRow($query) {
        $row = $this->getAdapter()->fetchRow($query);
        if (!$row) {
            return false;
        }
        $this->data = $row;
        return $this;
    }

    public function save() {
        if(array_key_exists($this->getPrimaryKey(),$this->getData())) {
            $keys = [];

            foreach($this->getData() as $key => $value){
                $keys[] = "`".$key."` = '".$value."'";
            }

            $id = $this->getData()[$this->getPrimaryKey()];
            array_shift($keys);
            $keys = implode(',',$keys);

            $query = "update `{$this->getTableName()}` set {$keys} where `{$this->getPrimaryKey()}` = {$id}";
            return $this->getAdapter()->update($query);
        } else {
            $keys = implode(",",array_keys($this->getData()));
            $values = array_values($this->getData());
            for($i = 0 ; $i < count($values); $i++){
                $values[$i] = "'".$values[$i]."'";
            }

            $values = implode(",",$values);
            $query = "insert into `{$this->getTableName()}` ({$keys}) values ({$values})";
            //$this->getMessage()->setSuccess('Inserted Record Successfully');
            return $this->getAdapter()->insert($query);
        }
    }

    public function deleteData($id) {
        $id = (int)$id;
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`=$id";
        return $this->getAdapter()->delete($sql);
    }

    public function fetchPairs($query) {
        if(!$query){
            $query = "SELECT * FROM `{$this->getTableName()}`";
        }
        $rows = $this->getAdapter()->fetchAll($query);
        
        if(!$rows) {
            return false;
        }
        foreach ($rows as $key => $value) {
            $rows = new $this();
            $rows->setData($value);
            $rowArray[] = $rows;
        }
        $collectionClassName = get_class($this).'\Collection';
        $collection = \Mage::getModel($collectionClassName);
        $collection->setData($rowArray);
        unset($rows);
        return $collection;
    }
}

?>