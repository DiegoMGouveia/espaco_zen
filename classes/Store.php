<?php
class Store 
{

    private $storeId;
    private $storeOperator;
    private $storeType;
    private $storeItem;
    private $storeQtd;
    private $storePrice;


    public function getStoreOperator()
    {
        return $this->storeOperator;
    }

    public function setStoreOperator($storeOperator)
    {
        $this->storeOperator = $storeOperator;
        return $this->storeOperator;
    }


    // getter @storageId
    public function getStoreId()
    {
    
        return $this->storeId;

    }

    // setter @storageId
    public function setStoreId($storeId)
    {
    
        $this->storeId = $storeId;
        return $this->storeId;
    
    }

    public function getStoreType()
    {
    
        return $this->storeType;
    
    }

    public function setStoreType($storeType)
    {
    
        $this->storeType = filter_var($storeType, FILTER_SANITIZE_NUMBER_INT);
        return $this->storeType;
    
    }

    public function getStoreItem()
    {

        return $this->storeItem;

    }

    public function setStoreItem($storeItem)
    {

        $this->storeItem = filter_var($storeItem, FILTER_SANITIZE_STRIPPED);
        return $this->storeItem;

    }
    
    public function getStoreQtd()
    {

        return $this->storeQtd;

    }

    public function setStoreQtd($storeQtd)
    {

        $this->storeQtd = filter_var($storeQtd, FILTER_SANITIZE_NUMBER_INT);
        return $this->storeQtd;

    }

    public function getStorePrice()
    {

        return $this->storePrice;

    }

    public function setStorePrice($storePrice)
    {


        $this->storePrice = filter_var($storePrice, FILTER_SANITIZE_NUMBER_FLOAT);
        
        
        return $this->storePrice;

    }









}