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