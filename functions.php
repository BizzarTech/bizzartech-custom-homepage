<?php

function dbconnect(){
	$dbserver = "localhost";
	$dbuser   = "bizzar_user";
	$dbpass   = "z3bra1980";
	$dbname   = "bizzar_homepage";
	$dbh = mysql_connect($dbserver, $dbuser, $dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
	mysql_select_db($dbname);
}

function process_rss_feed($feed){

        $xml_source = file_get_contents($feed);
        $x = simplexml_load_string($xml_source);

        if(count($x) == 0)
            return;

        foreach($x->channel->item as $item)
        {
            $p = array();
            $p["date"] = (string) $item->pubDate;
            $p["ts"] = strtotime($item->pubDate);
            $p["link"] = (string) $item->link;
            $p["title"] = (string) $item->title;
            $p["text"] = (string) $item->description;

            // Create summary as a shortened body and remove images, extraneous line breaks, etc.
            $summary = $post->text;
            $summary = eregi_replace("<img[^>]*>", "", $summary);
            $summary = eregi_replace("^(<br[ ]?/>)*", "", $summary);
            $summary = eregi_replace("(<br[ ]?/>)*$", "", $summary);

            // Truncate summary line to 100 characters
            $max_len = 100;
            if(strlen($summary) > $max_len)
                $summary = substr($summary, 0, $max_len) . '...';

            $post["summary"] = $summary;

            $posts[] = $p;
        }

	return $posts;
}
?>