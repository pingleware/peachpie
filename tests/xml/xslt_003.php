<?php
// Test 3: Using Parameters

function __xml_norm($str)
{
  $str = str_replace(array(" /", "?><", "\r\n"), array("/", "?>\n<", "\n"), $str);

  if ($str[strlen($str) - 1] != "\n") $str = $str . "\n";

  return $str;
}

function test() {
  $dom = new domDocument;
  $dom->load("xslt.xml");

  $xsl = new domDocument;
  $xsl->load("xslt.xsl");

  $proc = new xsltprocessor;
  $proc->importStylesheet($xsl);
  $proc->setParameter( "", "foo","hello world");

  print __xml_norm($proc->transformToXml($dom));
}

test();
