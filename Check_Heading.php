<?PHP
/*
Search form calls handler, handle checks what type of search and calls specific script which in turn calls this generic search and diplay script with $input type by user, $table and column for the specific haeding to be searched.

Calls to DbIO  to connect to Db and then to do query to search Db for $input within the specified table. (Title, Author, Publisher etc
Receives an array from the Db and the number of rows tells where matched OR a zero number of rows if not in Db
If 0 (not in) displays search screen
If 1 entry uses full page template
If 2 or more entries uses the single line format. Calls CreatePage to mix that array data with a template

Finally echo to screen the new page

*/



//20


Function EntriesZero()
{global $Article_number_data,$developer_data,$query_result;


	$template="Search";
	$Article_number_data[10]='<font color="FF0000"><b><i>'.$Article_number_data[2].'</i> Not found</b></font>';
	

		$developer_data.=$x.'<b> is not in Db?</b> <br>';//don't try to read details
	require_once'../CreatePage/CreatePage.php';
	$template="Search";
	$page_string=Create_Page::insert($Article_number_data,"Check_Title", $template); 
return $page_string;
}//end of function

Function EntriesOne()
{global $Article_number_data,$developer_data,$query_result;


	$row = mysql_fetch_row($query_result);

	$ID=$row[0]; //is zero if not in Db
	$Article_number_data[0]=$ID;
		$developer_data.='Article ID $Article_number_data[0]='.$ID.'<br> Number of finds='.$number_of_entries;
		//echo $developer_data;
		$developer_data.=('The url is record number:::'.$ID.':::<br>'); 
	
	//$template="Update";

	require_once'../Database/Read_Database.php';
	ReadDatabase::ReadAllArticleDetailsIntoAnArray($ID);
		//echo $developer_data;

	require_once'../CreatePage/CreatePage.php';
	
	$template='Update';
	$page_string=Create_Page::insert($Article_number_data,"Check_Title", $template); 
return $page_string;
} //end of function



Function EntriesGreaterThanOne()
{
global $Article_number_data,$developer_data,$query_result;

//Have read Db - found more than 1 articles in which the searched for words are in the title. Got them in an array and need to build a page with a variable sized middle bit...

	$number_of_entries = mysql_num_rows($query_result);
	$Article_number_data[10].='<b>Found '.$number_of_entries.' entries of '.$input.'</b>';

	require_once'../CreatePage/CreatePage.php';

	//build page out of header + ,multiple single line displays + footer
	$template='Header';
	$Header=Create_Page::insert($Article_number_data,"Is_Cited", $template);

	$template='Line_display';	
		$developer_data.=('Number of places this appears: '.$number_of_entries.'<br>');
		$developer_data.='$Article_number_data[0]='.$ID.'<br> [15]='.$Article_number_data[15];
		//echo $developer_data;

	//build the multiple entry part of page using single line template
	for($i=0;$i<$number_of_entries;$i++)
		{
		$row = mysql_fetch_row($query_result);
		$ID=$row[0]; //is zero if not in Db
		$Article_number_data[0]=$ID;//is this pointless here?
		ReadDatabase::ReadAllArticleDetailsIntoAnArray($ID);
		//use create page to build the single line display and add it to the previous one
		$Single_line.=Create_Page::insert($Article_number_data,"Is_Cited", $template);
		}

	//finish off page with a footer
	$template='Footer';
	$Footer=Create_Page::insert($Article_number_data,"Is_Cited", $template);

	$page_string=$Header.$Single_line.$Footer;

return $page_string;

} //end function




Function CheckIfXInTableReturnNumberOfEntries($input,$table,$column)
{// search method needs to be better.

global $Article_number_data, $developer_data, $query_result;
$Article_number_data[2]=$input;
require_once'../Database/Read_Database.php';

$query_string="SELECT `Article_ID` FROM`".$table."` WHERE `".$column."`LIKE'%".$input."%'";

	$developer_data.=$query_string.'<br>';

$query_result=mysql_query($query_string);
$number_of_entries = mysql_num_rows($query_result);

	$developer_data.=('Number of places this url appears: '.$number_of_entries.'<br>');

return $number_of_entries;
}//end of function




Function CheckHeading($input,$table,$column)
{
global $Article_number_data,$query_result,$developer_data;  //keeps track of what doing-just for developer
	$developer_data.='Inside CheckHeading Function checkheading()<br>The input is=  '.$input.'#end<br>';


require_once'../database/DbIO.class';
DbIO::Connect(); //separate class to handle Db
require_once'../database/Clean_Text.inc';
//70
$input=clean_text($input);
	$developer_data.= 'Cleaned $input='.$input.'<br>';

$number_of_entries=CheckIfXInTableReturnNumberOfEntries($input,$table,$column);



Switch($number_of_entries)
	{	
		case 0:$page_string=EntriesZero();break;
		case 1:$page_string=EntriesOne();break;
		default:$page_string=EntriesGreaterThanOne();

	}//end switch

				//echo $developer_data;


echo $page_string;

}  //  end of function main()




?>