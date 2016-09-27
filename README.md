# Great2
Web-service database of web sites storing basic data about sites of interest:

------------------
URL, 
title, 
author, 
date published, 
publisher 
+
Sources listed by the article

------------------



The initial version has manual data entry (copy and paste from an open browser), but later versions would automate much of the data entry (user pastes in URL, software searches that location and extracts the relevant data)

The state of the software 27 Sept 2016:

Running on a local server.
Can enter an url.
Database searches and if already in system it displays the metadata (the actual article is not part of the Db)

If not in Database the systems asks the user if it should be inserted.

SOURCES & CITATIONS

If the user copies and pastes the orginal articles sources (the other works quoted or refered to in a bibliography or sources list) the system offeres to check each of these - searching if in the system and offering to insert each source if not already in. 

Example: An original article 'OA' has as a quoted source article 'SA'.

Anyone who looks at 'OA' will see 'SA' listed as a source.

Anyone who looks at 'SA' will see "Is Cited" as a link, which leads to a page listing any article which has cited 'SA' as a source. Therefore looking at 'OA' leads to 'SA' and looking at 'SA' leads to 'OA'.

In this way it is possible not just to go from an article to its sources (which are invariably older), but also to go from sources to their more recent publications. (Google doesn't do this, nor do many libraries)


CONNECTIONS & RECOMMENDATIONS

A user who sees two articles on the same subject or two opposing views, or articles that should be brought to attention, can select the two and click the 'Connect' link. This will place a marker on each of the two articles to bring the other article to the attention of other users. (It works like the Source Citation system)


Users can look at the database, but to edit it in any way requires permission and persons who have this permission are called 'Curators'.

Curators have several links:

What I Curate
This displays all the articles you have entered into the database

What I have seen
This is a history of the articles you have looked at

What I remember
This displays all the articles you are currently telling the system to remember for you. (This is useful for creating source lists for your own projects or for quickly going between articles)

What I Connected
Lists all those articles (in pairs) that you have said are related one to the other.


A user who later searches for any article that a curator has 'connected' will be able to see a list of related articles and who recommended them.

A user also sees if the article has been cited by any other article and what an articles sources are.


HELP

Every link has an associated help file which is also stored within the database as an article which can be searched, cited or connected.

Help articles are unusual in that they have actual content not just meta content and so they differ in how they display.


Curators generally only enter metadata - the url, title, author, publisher and date of publication, plus the article's quoted sources. The words or video or audio of the article are not held in the database.

If the Curator also has text entry permission it is possible to enter text. This is how the help pages are created.

Help pages can be seen by anyone, but other text entry is only seen by permission. (The database isn't a blog or a publisher of news or commentary)


All of the above exists (27/09/2016) and is running on a local host server without internet connection.

Future - 

Needs to be on a shared server for others to show the broken bits that I am blind to.

Security

Better visual design (currently pure html)

Needs live links (currently just text http://fakedata.com/dont/connect/to/anything.test )

Need design decisions on how to handle text entry and what purpose this serves.

Better search algorithm (Currently using %LIKE% )

Lots of data entered to check utility

Rewrite to newer standards (original in old php and mysql versions)

Embedding of video or other sources rather than just links

Scraping of data from original article to replace manual copy/paste entry of metadata

Feedback from users to judge utility and re-design

and All the other things I haven't thought of



This is a branch based on a larger project which can be read at 
https://greathallproject.wordpress.com/
