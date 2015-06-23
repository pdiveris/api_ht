<?php
/**
 * JISC APIs
 *
 * Helpers
 *
 * Various Helpers
 *
 * @package      HT_Api
 * @subpackage   
 * @category     API
 * @author       Petros Diveris <petros.diveris@jisc.ac.uk>
 *
 * @todo         Implement XML serialisation as an injectable dependency
 * @todo         Write unit tests for XML encoding
 * @version      1.0
 */
namespace Jisc\api;

/**
 * Class Helpers
 */
class Helpers
{

  /**
   * @param $var
   * @param bool $indent
   * @param int $i
   * @return string
   */
  public static function myXMLEncode($var, $indent = true, $i = 0)
  {
    $version = "1.0";
    if (!$i) {
      $data = '<?xml version="1.0"?>' . ($indent ? "\r\n" : '')
        . '<root vartype="' . gettype($var) . '" xml_encode_version="' . $version . '">' . ($indent ? "\r\n" : '');
    } else {
      $data = '';
    }

    foreach ($var as $k => $v) {
      $data .= ($indent ? str_repeat("\t", $i) : '') . '<var vartype="' . gettype($v) . '" varname="' . htmlentities($k) . '"';

      if ($v == "") {
        $data .= ' />';
      } else {
        $data .= '>';
        if (is_array($v)) {
          $data .= ($indent ? "\r\n" : '') . self::myXMLEncode($v, $indent, ($i + 1)) . ($indent ? str_repeat("\t", $i) : '');
        } else if (is_object($v)) {
          $data .= ($indent ? "\r\n" : '') . self::myXMLEncode(json_decode(json_encode($v), true), $indent, ($i + 1)) . ($indent ? str_repeat("\t", $i) : '');
        } else {
          $data .= htmlentities($v);
        }
        $data .= '</var>';
      }
      $data .= ($indent ? "\r\n" : '');
    }

    if (!$i) {
      $data .= '</root>';
    }
    return $data;
  }

  /**
   * Encode an object as XML string
   *
   * @param Object $obj
   * @param string $root_node
   * @return string $xml
   */
  public static function encodeObj($obj, $root_node = 'response')
  {
    $xml = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
    $xml .= self::encode($obj, $root_node, $depth = 0);
    return $xml;
  }

  /**
   * Encode an object as XML string
   *
   * @param Object|array $data
   * @param $node
   * @param int $depth Used for indentation
   * @internal param string $root_node
   * @return string $xml
   */
  private static function encode($data, $node, $depth)
  {
    $xml = str_repeat("\t", $depth);
    $xml .= "<{$node}>" . PHP_EOL;

    foreach ($data as $key => $val) {
      $key = str_replace('*', '', $key);

      if (strpos(utf8_decode($key), 'options') == false) { // code specific to the API. refactoring is due

        if (is_array($val) || is_object($val)) {
          if ($key == '0' || intval($key) > 0) {
            $key = 'item';
          }

          $xml .= self::encode($val, $key, ($depth + 1));
        } else {
          $xml .= str_repeat("\t", ($depth + 1));
          $xml .= "<{$key}>" . htmlspecialchars($val) . "</{$key}>" . PHP_EOL;
        }
      }
    }
    $xml .= str_repeat("\t", $depth);
    $xml .= "</{$node}>" . PHP_EOL;
    return str_replace(chr(0x0), '', $xml);
  }

  /**
   * Encode an object as XML string
   *
   * @param Object|array $data
   * @param $node
   * @param int $depth Used for indentation
   * @param string $subNode
   * @internal param string $root_node
   * @return string $xml
   */
  private static function itemEncode($data, $node, $depth, $subNode)
  {
    $xml = str_repeat("\t", $depth);

    if (utf8_decode($node) == 'item') {
      $node = get_class($data);
      $node = str_replace('\\', '_', $node);
      $node = str_replace('MIMAS_Service_Jorum_', '', $node);
      $node = str_replace('MIMAS_Service_Hairdressing_', '', $node);

      $node = strtolower($node);
    }

    if (strpos(utf8_decode($node), 'items') == false) { // code specific to the API. refactoring is due
      $xml .= "<{$node}>" . PHP_EOL;
    }

    foreach ($data as $key => $val) {
      $key = str_replace('*', '', $key);

      if (strpos(utf8_decode($key), 'options') == false && strpos(utf8_decode($key), 'Jisc\api\Service') == false) { // code specific to the API. refactoring is due

        if (is_array($val) || is_object($val)) {
          if ($key == '0' || intval($key) > 0) {
            $key = 'item';
          }
          $xml .= self::itemEncode($val, $key, ($depth + 1), $subNode);
        } else {
          $xml .= str_repeat("\t", ($depth + 1));
          /*
           * This code is specific to the way dcAttrs are exposed as arrays by the PHP API
           * @todo: Refactor so that either we get a comma separated list or we get a series of the same attribute (repeated)
           *
           */
          if ($key == '0' || intval($key) > 0) {
            $comma = intval($key) > 0 ? ', ' : '';
            $xml .= "$comma" . htmlspecialchars($val) . "" . PHP_EOL;
          } else {
            $xml .= "<{$key}>" . htmlspecialchars($val) . "</{$key}>" . PHP_EOL;
          }
        }
      }
    }

    $xml .= str_repeat("\t", $depth);
    if (strpos(utf8_decode($node), 'items') == false) { // code specific to the API. refactoring is due
      $xml .= "</{$node}>" . PHP_EOL;
    }

    return str_replace(chr(0x0), '', $xml);
  }


  /**
   * Encode items as XML string
   *
   * @param Object $obj
   * @param string $root_node
   * @param string $subNode
   * @return string $xml
   */
  public static function encodeItems($obj, $root_node = 'itemList', $subNode)
  {
    $xml = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL;
    $xml .= self::itemEncode($obj, $root_node, $depth = 0, $subNode);
    return $xml;
  }

  /**
   * Create a preview URL based onthe first viewable bitstream
   *
   * @param $bitstreams
   * @return mixed|string
   */
  public static function mainPreviewUrl( $bitstreams) {
    if ($bitstreams) {
      $originals = array();
      $sequenceId = 666;
      foreach ($bitstreams as $id => $stream) {
        # code...
        if ($stream->getBundleName() == 'ORIGINAL' || $stream->getBundleName()=='URL_BUNDLE') {
          $originals[$stream->getSequenceId()] = $stream;
          if ($sequenceId > $stream->getSequenceId()) {
            $sequenceId = $stream->getSequenceId();
          }
        }
      }
      if ($sequenceId<>666) {
        $url = $originals[$sequenceId]->getPreviewUrl();
        $url = str_replace('www.duckduck.go', 'www.duckduckgo.com', $url);
      }
    } else {
      $url = 'http://mapping.mimas.ac.uk/preview/256325';

    }
    return $url;
  }

  /**
   * As above, tell us the Mime
   *
   * @param array $bitstreams
   * @return string
   */
  public static function mainPreviewMime( $bitstreams = array()) {
    if ($bitstreams) {
      $originals = array();
      $sequenceId = 666;
      foreach ($bitstreams as $id => $stream) {
        # code...
        if ($stream->getBundleName() == 'ORIGINAL' || $stream->getBundleName()=='URL_BUNDLE') {
          $originals[$stream->getSequenceId()] = $stream;
          if ($sequenceId > $stream->getSequenceId()) {
            $sequenceId = $stream->getSequenceId();
          }
        }
      }
      if ($sequenceId<>666) {
        $mime = $originals[$sequenceId]->getMimeType();
      }
    } else {
      $mime = 'Unknown';
    }
    return $mime;
  }

  /**
   * Produce a human readable Mime
   *
   * @param string $mime
   * @return string
   */
  public static function humanMime($mime = '') {
    $humanMime = $mime;
    switch ($mime) {
      case 'application/zip':
        $humanMime = 'zip';
        break;
      case 'application/pdf':
        $humanMime = 'pdf';
        break;
      case 'text/plain':
        $humanMime = 'text';
        break;
      case 'Unknown':
        $humanMime = 'n/a';
        break;
      case 'application/x-shockwave-flash':
        $humanMime = 'flash';
        break;
      case 'application/octet-stream':
        $humanMime = 'stream';
        break;
      case 'application/msword':
      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
        $humanMime = 'word';
        break;
      case 'text/richtext':
        $humanMime = 'rtf';
        break;
      case 'application/vnd.ms-excel':
      case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
        $humanMime = 'excel';
        break;
      case 'video/quicktime':
        $humanMime = 'QT';
        break;
      case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
      case 'application/vnd.ms-powerpoint':
        $humanMime = 'ppt';
        break;
      case 'text/html':
        $humanMime = 'html';
        break;
      case 'image/jpeg':
        $humanMime = 'image';
        break;
      case 'image/gif':
      case 'audio/x-aiff':
      case 'video/x-flv':
        $humanMime = $mime;
        break;
    }
    return $humanMime;
  }

 

 /**
  * Debug function for the purpose of the great refactoring
  * @return string
  */
  public static function hello() {
    return 'hello';
  }
}