# CrystalWiki
This is the code for the crystal healing wiki currently on [LawlessSolutions.us](https://lawlesssolutions.us/wiki/wiki.php)

The database is accessible by including `$_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php"` once in the document. This sets up a PDO class and configures it to our database. You can use a PDO query to access the database, though it is advised to use the built-in functions `wikiQuery($query)` and `wikiInsert($table, $arrCols, $arrVals)` to access the database for security purposes.

## Current Projects
These are the pages that need attention, not listed in any particular order
- wikiStyles.css
  - Need styles for tables, divs, links, buttons, [you name it!](https://youtu.be/oB9FrK2jMs4)
- crystalSort.php
  - Implement autocomplete in a search bar
  - Query based on selected chakras, zodiacs, etc...
- menu.php
  - Yet to be created at all. Thought needs to go into this so that it can be called from another php page without messing up formatting (on the page & in the source)
- wikiCreate.php
  - String generation for chakras, planets, etc... need to be wrapped in a function and that function needs moved to wikiFunctions.php
- wiki.js
  - Currently only has a redirect function, which does not work.
- wikiFunctions.php
  - rename wikiReadFromDB
  - create inverse of wikiReadFromDB (with name analagous to the new name for wikiReadFromDB)

## Functions and Includes
Reference for functions and such, organized by include file
### wikiFunctions.php

#### wikiReadFromDB ($strInp)
`$strInp` is a string starting with a `{` and ending with a `}` with comma (and space) delimited binary values ie `{1, 1, 1, 0, 0, 1}`

The spaces are actually necessary as of right now.

Returns an array of binary values corresponding to the string provided. There is no limit on the size of the input as long as the format is adhered to.

### wikiDBConfig.php (in PHP folder)
This file is in the PHP folder on the server, and can be accessed by including `$_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php"`

#### wikiQuery($query)
`$query` is the actual query you want to send to the database. While this function does prepare the query, it is advised to use a more specific function where applicable for security purposes.

Returns an array of rows returned by the query if successful and an error message if unsuccessful.

#### wikiInsert($table, $arrCols, $arrVals)
`$table` is a string containing the name of the table you wish to insert into.

`$arrCols` is an array of strings of the names of the columns you wish to insert data into.

`$arrVals` is an array of the values you wish to insert into the named columns.

Returns a boolean true if successful and an error message if unsucessful.