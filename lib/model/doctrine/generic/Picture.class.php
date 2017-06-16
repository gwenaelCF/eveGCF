<?php

/**
 * Picture
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    e-venement
 * @subpackage model
 * @author     Baptiste SIMON <baptiste.simon AT e-glop.net>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Picture extends PluginPicture
{
  public function render(array $attributes = array())
  {
    return $this->getHtmlTag($attributes);
  }
  public function getUrl(array $attributes = array())
  {
    sfApplicationConfiguration::getActive()->loadHelpers(array('CrossAppLink'));
    return cross_app_url_for(
      isset($attributes['app']) ? $attributes['app'] : 'default',
      'picture/display?id='.$this->id,
      isset($attributes['absolute']) && $attributes['absolute'] ? true : false);
  }
  public function getHtmlTag(array $attributes = array())
  {
    if ( !$this->id )
      return '';
    
    $attributes['src'] = $this->getUrl($attributes);
    
    // this is a workaround for crappy ISPs that rewrite HTML for "optimization"
    if ( isset($attributes['add-data-src']) && $attributes['add-data-src'] )
      $attributes['data-src'] = $attributes['src'];
    
    foreach ( array('app', 'add-data-src') as $attr )
    if ( isset($attributes[$attr]) )
      unset($attributes[$attr]);
    
    return $this->_getImageTag($attributes);
  }
  public function getBase64Data()
  {
    return 'data:'.$this->type.';base64,'.$this->content;
  }
  public function getHtmlTagInline(array $attributes = array())
  {
    $attributes['src'] = $this->getBase64Data();
    return $this->_getImageTag($attributes);
  }
  protected function _getImageTag(array $attributes = array())
  {
    if ( !isset($attributes['alt']) )
      $attributes['alt'] = $this->name;
    
    $tmp = array();
    foreach ( $attributes as $key => $value )
      $tmp[] = $key.'="'.$value.'"';
    $tag = '<img '.implode(' ',$tmp).' />';
    return $tag;
  }
  
  public function getContentStream()
  {
    return $this->rawGet('content');
  }
  public function getDecodedContent()
  {
    return base64_decode($this->getContent());
  }
  public function getContent()
  {
    if ( !is_resource($this->rawGet('content')) )
      return $this->rawGet('content');
    
    rewind($this->rawGet('content'));
    return stream_get_contents($this->rawGet('content'));
  }
}