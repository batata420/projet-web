<?php
class panier 
{

    public function __construct()
    {
if (!isset($_SESSION))
{
    session_start();
}
    




if (!isset($_session ['panier']))
{
    $_SESSION['panier']=array();
}

}
    
    public function add($titre)
    {
        $_SESSION['panier'][$titre]=1;
    }
}

?>