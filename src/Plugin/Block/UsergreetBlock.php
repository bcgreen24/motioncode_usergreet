<?php

namespace Drupal\usergreet\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use \Drupal\Core\Access\AccessResult;
/**
 * Greet the logged in user
 * 
 * @Block(
 * id = "usergreet_block",
 * admin_label = @Translation("User Greet Block")
 * )
 */
class UsergreetBlock extends BlockBase{

    public function build(){
        $currentAccount = \Drupal::currentUser();
        if($currentAccount->id() != 0){
        $username = $currentAccount->getDisplayName();
        }else{
            $username = "Not logged in.";
        }

        return [
            '#type' => 'markup',
            '#markup' => '<h3>HELLO ' . $username . '!</h3>',
         ];
    }

    public function blockAccess(AccountInterface $account){
        return AccessResult::allowedIfHasPermission($account, 'edit content');
    }

}