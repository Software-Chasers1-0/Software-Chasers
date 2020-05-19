<?php
namespace SoftwareChasers10\SoftwareChasers;
class init{
  public function world(){
    return 'world';
  }
}
echo (new init())->world();
?>