function incrementValue(ID)
{
    var value = parseInt(document.getElementById(ID).value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById(ID).value = value;
}
function decrement(ID){
    var value = parseInt(document.getElementById(ID).value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>0){
        value--;
    }
    
    document.getElementById(ID).value = value;

}
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }
  
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }