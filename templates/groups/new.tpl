<html>
<head>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>

<body>
{$LANG["New group"]}
{$smarty.get.user}

<Form action=index.php?module=groups&view=added.tpl method=post>
<table>
<tr><td>
{$LANG["Group name"]}</td><td><input type=txt name= givenname>
</td> </tr>
<tr><td>

{$LANG["Member"]}</td><td><input type=txt id=newmember  name= surname>
</td></tr>
<div id=newform>
</div>
</table>

<input type=hidden name=userdn value="{$smarty.get.user}">

  <script type="text/javascript"  src="js/jquery.min.js">

</script>
    <script type="text/javascript" language="javascript">
    
    function DoPost($dn){
          $.post("index.php", { op: "disable", dn: $dn } );  //Your values here..
             }
var counter=0;

    function addItem()
    {

var selectBox = document.getElementById("users");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;

var newFields = document.getElementById('newmember').cloneNode(true);

newFields.id = '';
newFields.style.display = 'block';
var newField = newFields.childNodes;
//    for (var i=0;i<newField.lenght;i++) {
//          var theName = newField[i].name;
//                  if (theName)

                                newFields.name = "member["+counter+"]";
counter++;

//                                  }
        newFields.value=selectedValue;

var insertHere = document.getElementById('newmember');

insertHere.parentNode.insertBefore(newFields,insertHere);


      };
    $(document).ready(function() {
    $("#driver").click(function(event){

    $('#stage').load('list.php?dom={$domain}')
    });
    });

  </script>


<input type="button" id="driver" value="browse users" />

<div id="stage" >
 </div>




<input type=submit value=add >
</form>

</body>
</html>