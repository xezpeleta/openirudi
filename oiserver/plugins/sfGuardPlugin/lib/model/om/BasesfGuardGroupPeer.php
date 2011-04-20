<?php


abstract class BasesfGuardGroupPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_guard_group';

	
	const CLASS_DEFAULT = 'plugins.sfGuardPlugin.lib.model.sfGuardGroup';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'sf_guard_group.ID';

	
	const NAME = 'sf_guard_group.NAME';

	
	const DESCRIPTION = 'sf_guard_group.DESCRIPTION';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Description', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'name', 'description', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::NAME, self::DESCRIPTION, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'description', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Description' => 2, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'name' => 1, 'description' => 2, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::NAME => 1, self::DESCRIPTION => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'description' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new sfGuardGroupMapBuilder();
		}
		return self::$mapBuilder;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(sfGuardGroupPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfGuardGroupPeer::ID);

		$criteria->addSelectColumn(sfGuardGroupPeer::NAME);

		$criteria->addSelectColumn(sfGuardGroupPeer::DESCRIPTION);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(sfGuardGroupPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			sfGuardGroupPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}
	
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = sfGuardGroupPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return sfGuardGroupPeer::populateObjects(sfGuardGroupPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			sfGuardGroupPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(sfGuardGroup $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof sfGuardGroup) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or sfGuardGroup object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} 
	
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; 	}
	
	
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
				if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = sfGuardGroupPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = sfGuardGroupPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = sfGuardGroupPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				sfGuardGroupPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

  static public function getUniqueColumnNames()
  {
    return array(array('name'));
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return sfGuardGroupPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(sfGuardGroupPeer::ID) && $criteria->keyContainsValue(sfGuardGroupPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.sfGuardGroupPeer::ID.')');
		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(sfGuardGroupPeer::ID);
			$selectCriteria->add(sfGuardGroupPeer::ID, $criteria->remove(sfGuardGroupPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += sfGuardGroupPeer::doOnDeleteCascade(new Criteria(sfGuardGroupPeer::DATABASE_NAME), $con);
			$affectedRows += BasePeer::doDeleteAll(sfGuardGroupPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												sfGuardGroupPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof sfGuardGroup) {
						sfGuardGroupPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfGuardGroupPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								sfGuardGroupPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			$affectedRows += sfGuardGroupPeer::doOnDeleteCascade($criteria, $con);
			
																if ($values instanceof Criteria) {
					sfGuardGroupPeer::clearInstancePool();
				} else { 					sfGuardGroupPeer::removeInstanceFromPool($values);
				}
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

						sfGuardGroupPermissionPeer::clearInstancePool();

						sfGuardUserGroupPeer::clearInstancePool();

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected static function doOnDeleteCascade(Criteria $criteria, PropelPDO $con)
	{
				$affectedRows = 0;

				$objects = sfGuardGroupPeer::doSelect($criteria, $con);
		foreach ($objects as $obj) {


						$c = new Criteria(sfGuardGroupPermissionPeer::DATABASE_NAME);
			
			$c->add(sfGuardGroupPermissionPeer::GROUP_ID, $obj->getId());
			$affectedRows += sfGuardGroupPermissionPeer::doDelete($c, $con);

						$c = new Criteria(sfGuardUserGroupPeer::DATABASE_NAME);
			
			$c->add(sfGuardUserGroupPeer::GROUP_ID, $obj->getId());
			$affectedRows += sfGuardUserGroupPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(sfGuardGroup $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfGuardGroupPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfGuardGroupPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(sfGuardGroupPeer::DATABASE_NAME, sfGuardGroupPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfGuardGroupPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = sfGuardGroupPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(sfGuardGroupPeer::DATABASE_NAME);
		$criteria->add(sfGuardGroupPeer::ID, $pk);

		$v = sfGuardGroupPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(sfGuardGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(sfGuardGroupPeer::DATABASE_NAME);
			$criteria->add(sfGuardGroupPeer::ID, $pks, Criteria::IN);
			$objs = sfGuardGroupPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BasesfGuardGroupPeer::DATABASE_NAME)->addTableBuilder(BasesfGuardGroupPeer::TABLE_NAME, BasesfGuardGroupPeer::getMapBuilder());

