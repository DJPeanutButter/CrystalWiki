<doctype html>
<?include_once $_SERVER['DOCUMENT_ROOT'] . "/../php/wikiDBConfig.php" ?>
<html>
  <head>
    <title>Search for a crystal!</title>
    <script>
      var crystals = [<?
      $query = wikiSelect("Crystals","Name");
      foreach ($query as $i => $tmp){
        echo "\"".$tmp[0]."\"";
        if ($tmp !== end($query))
          echo ", ";
      }?>];
      
      function autocomplete(inp, arr) {
        var currentFocus;
      
        inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          
          closeAllLists();
          
          if (!val)
            return false;
          
          currentFocus = -1;
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          this.parentNode.appendChild(a);
          for (i = 0; i < arr.length; i++) {
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              b = document.createElement("DIV");
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              b.addEventListener("click", function(e) {
                inp.value = this.getElementsByTagName("input")[0].value;
                closeAllLists();
              });
              a.appendChild(b);
            }
          }
        });
        
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40){
              currentFocus++;
              addActive(x);
            } else if (e.keyCode == 38){
              currentFocus--;
              addActive(x);
            } else if (e.keyCode == 13) {
              e.preventDefault();
              if (currentFocus > -1) {
                if (x) x[currentFocus].click();
              }
            }
        });
        
        function addActive(x) {
          if (!x)
            return false;
          removeActive(x);
          if (currentFocus >= x.length)
            currentFocus = 0;
          if (currentFocus < 0)
            currentFocus = (x.length - 1);
          x[currentFocus].classList.add("autocomplete-active");
        }
        
        function removeActive(x) {
          for (var i = 0; i < x.length; i++)
            x[i].classList.remove("autocomplete-active");
        }
        
        function closeAllLists(elmnt) {
          var x = document.getElementsByClassName("autocomplete-items");
          for (var i = 0; i < x.length; i++)
            if (elmnt != x[i] && elmnt != inp)
              x[i].parentNode.removeChild(x[i]);
        }
        
        document.addEventListener("click", function (e) {
          closeAllLists(e.target);
        });
      }
    </script>
    <style>
      .autocomplete{
        position: relative;
      }
      .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
      }
      .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
      }
      .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
      }
      .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
      }
    </style>
  </head>
  <body>
    <form action="<?echo $_SERVER['REQUEST_URI'];?>">
      <div class="autocomplete">
        <input id="searchBar" type="text" name="crystal" placeholder="Crystal Name">
      </div>
      <input type="submit">
    </form>
    <script>
      autocomplete(document.getElementById("searchBar"), crystals);
    </script>
  </body>
</html>