<?php
include "XMLParser.class";
header("Cache-Control: post-check=1,pre-check=2");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: text/xml");
echo '<?xml version = "1.0" ?>';
echo '<DATA>';
$xml = file_get_contents("Employees.xml");
$parser = new XMLParser($xml);
$parser->Parse();
$emplastname = $_GET["lname"];
foreach( $parser->document->employee as $EMPLOYEE)
{
 if (strpos(strtolower($EMPLOYEE->emplastname[0]->tagData), strtolower($emplastname)) === 0)
 {
 echo '<EMPLOYEE>';
 echo '<EMPNO>' . $EMPLOYEE->empno[0]->tagData . '</EMPNO>';
 echo '<EMPFIRSTNAME>' . $EMPLOYEE->empfirstname[0]->tagData . '</EMPFIRSTNAME>';
 echo '<EMPLASTNAME>' . $EMPLOYEE->emplastname[0]->tagData . '</EMPLASTNAME>';
 echo '<EMPPHONE>' . $EMPLOYEE->empphone[0]->tagData . '</EMPPHONE>';
 echo '<SUPEMPNO>' . $EMPLOYEE->supempno[0]->tagData . '</SUPEMPNO>';
 echo '<EMPCOMMRATE>' . $EMPLOYEE->empcommrate[0]->tagData . '</EMPCOMMRATE>';
 echo '<EMPEMAIL>' . $EMPLOYEE->empemail[0]->tagData . '</EMPEMAIL>';
 echo '</EMPLOYEE>';
 }
}
echo '</DATA>';

?>