function set () 
{
    var element = document.querySelector('input[type=checkbox]');    

    if (element.checked) {
        k = 1;
    }
    else { k = 0;}

    document.getElementById('dozvil').value = k; }







  /*  var k=0;
    if(document.getElementsByName('checkbox').checked) 
{
    k = 1;
    
 }
 else { k = 0;}
 document.getElementById('dozvil').innerHTML = ' Всього обрано ' + k; }*/