<html>
<head>
<script language=javascript>
function setuid(tpl)
{

partone=document.getElementById('gn').value.toLowerCase();
if(tpl==2) partone=partone.charAt(0);
parttwo=document.getElementById('sn').value.toLowerCase();

document.getElementById('uid').value=partone+'.'+parttwo;

if(tpl==3) document.getElementById('uid').value=partone;
if(tpl==4) document.getElementById('uid').value=parttwo+'.'+partone;
}
</script>
<link rel="stylesheet" type="text/css" href="css/common.css" />
</head>
<body>
New user
<Form action=index.php?module=users&view=added.tpl method=post>
<table>

<tr><td>Prenume</td><td><input class="form-control" type=txt name=givenname id=gn value="" onkeyup="setuid()"> </td></tr>
<tr><td>Nume</td><td><input class="form-control" type=txt name=surname id=sn onkeyup="setuid()"> </td></tr>
<tr><td>mail</td><td><input  type=txt name=uid id=uid > @{$domain}</td></tr>

</td></tr>
<tr><td>parola</td><td><input class="form-control" type=txt name=password value={$pass}> </td></tr>
</table>
<input class="btn btn-outline-success my-2 my-sm-0" type=submit value=add >
</form>

<button  class="btn btn-outline-success my-2 my-sm-0" onclick="setuid(1)"> <i>prenume.nume</i></buton>
<button  class="btn btn-outline-success my-2 my-sm-0" onclick="setuid(2)"> <i>initiala.nume</i></buton>
<button  class="btn btn-outline-success my-2 my-sm-0" onclick="setuid(3)"> <i>prenume</i></buton>
<button  class="btn btn-outline-success my-2 my-sm-0" onclick="setuid(4)"> <i>nume.prenume</i></buton>

</body>
</html>