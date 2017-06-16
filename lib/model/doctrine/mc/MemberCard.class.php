<?php

/**
 * MemberCard
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    e-venement
 * @subpackage model
 * @author     Baptiste SIMON <baptiste.simon AT e-glop.net>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MemberCard extends PluginMemberCard
{
  protected $value;

  public function getQRcode()
  {
      $code = array('type' => 'MemberCard', 'member_card_id' => $this->id);
      
      return json_encode($code);
  }
  
  public function getQRcodeBase64PNG() 
  {
      $bc = new liBarcode($this->QRcode);

      return base64_encode($bc);
  }
  
  public function hasPrice($price_id, $nb = 1)
  {
    foreach ( $this->MemberCardPrices as $mcp )
    {
      if ( $mcp->price_id == $price_id )
        $nb--;
      if ( $nb == 0 )
        return true;
    }
    return false;
  }
  
  public function __toString()
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('Number','I18N','Date'));
    return __($this->name).' #'.$this->id." (".format_date($this->expire_at,'D').($this->value > 0 ? ', '.format_currency($this->value,sfContext::hasInstance() ? sfContext::getInstance()->getConfiguration()->getCurrency() : '€') : '').')';
  }
  
  public function getName()
  {
    return $this->MemberCardType->name;
  }
  
  public function copy($deep = FALSE)
  {
    $t = parent::copy($deep);
    
    $t->value = $this->value;
    
    return $t;
  }
  
  public function getValue()
  {
    if ( isset($this->value) )
      return $this->value;
    
    $pdo = Doctrine_Manager::getInstance()->getCurrentConnection()->getDbh();
    $q = "SELECT -sum(value) AS value FROM payment WHERE member_card_id = :member_card_id";
    $stmt = $pdo->prepare($q);
    $stmt->execute(array('member_card_id' => $this->id));
    $rec = $stmt->fetch();
    return $this->value = $rec['value'] ? $rec['value'] : 0;
  }
  
  /**
   * @function that allows manipulating for fake the MemberCard value for local tests and checks
   *
   * @param $value    integer representing a new value
   * @returns $this
   *
   **/
  public function setValue($value)
  {
    $this->value = $value;
    return $this;
  }
  
  public function delete(Doctrine_Connection $con = NULL)
  {
    if ( $this->Payments->count() == 0 )
    {
      if ( $this->Tickets->count() == 0 )
        return parent::delete($con);
      $go = true;
      foreach ( $this->Tickets as $ticket )
      if ( ($ticket->printed_at || $ticket->integrated_at) && !$ticket->hasBeenCancelled() )
      {
        $go = false;
        break;
      }
      if ( $go )
      {
        $this->Tickets->delete();
        return parent::delete($con);
      }
    }
    
    $payments = $tickets = 0;
    foreach ( $this->Tickets as $ticket )
    if ( $ticket->Duplicatas->count() == 0 && ($ticket->integrated_at || $ticket->printed_at) && !$ticket->hasBeenCancelled() && !$ticket->cancelling )
      $tickets++;
    foreach ( $this->Payments as $payment )
      $payments += $payment->value;
    
    if ( $tickets == 0 ) // && $payments == 0 )
    {
      $this->active = false;
      return parent::save($con);
    }
    
    throw new liEvenementException('The member card cannot be deleted neither deactivated.');
  }
  public function getFormattedDate()
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('Date'));
    return format_datetime($this->expire_at,'EEEE d MMMM yyyy HH:mm');
  }
  public function getShortenedDate()
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('Date'));
    return format_datetime($this->expire_at,'EEE d MMM yyyy HH:mm');
  }
  public function getMiniDate()
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('Date'));
    return format_datetime($this->expire_at,'dd/MM/yyyy HH:mm');
  }
}
