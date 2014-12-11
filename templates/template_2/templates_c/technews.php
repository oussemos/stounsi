<?php
/*

Class RSSParser: 2 October 2002
Original Author: Duncan Gough
Overview: An RSS parser that uses PHP and freely available RSS/RDF/XML feeds 
	  to add fresh news content to your site.
Installation: Decompress the file into your webroot and include it from 
	  whichever pages on which you want to display the data, e.g; 
	  include("rss.php"); Hackers Note: can also be called as SSI
	  from a .shtml page by using: <!--include virtual="rss.php"-->
Usage: As above, just include the rss.php file from within your PHP page, 
	  and the news will appear.  You should find the HTML code in the 
	  functions endElement(), show_title() and show_list_box() below, 
	  feel free to modify these to match your site.
Single Feed Hack: By Gregg 't3h GeeK' van der Sluys, http://geek.scorpiorising.ca
	  12-13-03. Permission granted from Duncan Gough to re-release under 
	  the GPL. This code will output raw text and will validate as XHTML 1.0
	  Transitional.
Bugs graciously worked out by Russell Najar, http://www.sicomm.us
	  02-28-06
*/

class RSSParser	{

    var $title			= "";
    var $link 			= "";
    var $description 	= "";
    var $inside_item 	= true;

	// This is an example default that I chose to display on my site - http://geek.scorpiorising.ca/
	// Add new RSS feeds using this format;
	// "http://www.wherever.com/path/to/rss/"	=> "Display name",
    var $all_rss_urls = array(
							"http://news.google.com/news?ned=us&topic=t&output=rss"	=> "",
				);

	function startElement( $parser, $name, $attrs='' ){
		global $current_tag;

		$current_tag = $name;

		if( $current_tag == "ITEM" )
			$this->inside_item = true;

	} // endfunc startElement

	function endElement( $parser, $tagName, $attrs='' ){
		global $current_tag;

    	if ( $tagName == "ITEM" ) {

			printf( "\t<br /><b><a href='%s' rel='lyteframe' rev='width: 1020px; height: 500px; scrolling: yes;'>%s</a></b>\n", $this->link , $this->title);
    		printf( "\t<br />%s<br />\n", $this->description);

    		$this->title = "";
    		$this->description = "";
    		$this->link = "";
    		$this->inside_item = false;

    	}

	} // endfunc endElement

	function characterData( $parser, $data ){
		global $current_tag;

		if( $this->inside_item ){
			switch($current_tag){

				case "TITLE":
					$this->title .= $data;
					break;
				case "DESCRIPTION":
					$this->description .= $data;
					break;
				case "LINK":
					$this->link .= $data;
					break;

				default:
					break;

			} // endswitch

		} // end if

	} // endfunc characterData

	function parse_results( $xml_parser, $rss_parser, $file )	{

		xml_set_object( $xml_parser, &$rss_parser );
		xml_set_element_handler( $xml_parser, "startElement", "endElement" );
		xml_set_character_data_handler( $xml_parser, "characterData" );

		$fp = fopen("$file","r") or die( "Error reading XML file, $file" );

		while ($data = fread($fp, 4096))	{

			// parse the data
			xml_parse( $xml_parser, $data, feof($fp) ) or die( sprintf( "XML error: %s at line %d", xml_error_string( xml_get_error_code($xml_parser) ), xml_get_current_line_number( $xml_parser ) ) );

		} // endwhile

		fclose($fp);

		xml_parser_free( $xml_parser );

	} // endfunc parse_results

	function show_title( $rss_url ){
					?><span class="title">
						
					</span><?
	} // endfunc show_title

} // endclass RSSParser

global $rss_url;

// Set a default feed
if( $rss_url == "" )
	$rss_url = "http://news.google.com/news?ned=us&topic=t&output=rss";

$xml_parser = xml_parser_create();
$rss_parser = new RSSParser();

$rss_parser->show_title( $rss_url );
$rss_parser->parse_results( $xml_parser, &$rss_parser, $rss_url );

?>