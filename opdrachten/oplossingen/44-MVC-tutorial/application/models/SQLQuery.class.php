<?php

class SQLQuery {

    protected $_dbHandle;
    protected $_result;

    function connect($address, $account, $pwd, $name){
        $this->_dbHandle = @mysql_connect($address, $account, $pwd);
        if ($this->_dbHandle != 0){
            if(mysql_select_db($name,$this->_dbHandle)){
                return 1;

            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    function disconnect(){
        if (@mysql_close($this->_dbHandle) != 0){
            return 1;

        } else {
            return 0;
        }
    }

    function selectAll(){
        
    }
}