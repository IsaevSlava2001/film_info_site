$(document).ready(function()
{
    document.addEventListener("click", function (e)
    {
        var id=e.target.id;
        var class_=e.target.classList[0];
        if(class_=="green")
        {
            console.log("checked");
            e.target.classList.add("grey");
        }
        else if(class_=="red")
        {
            alert("Данное место уже занято");
        }
    });
    $('#submit').click(function()
    {
        var some='';
        var selected=document.querySelectorAll('.grey');
        selected.forEach(element => 
        {
            some=some+element.id+".";
        });
        window.location="upload_bilets.php?bilets="+some+"";
    });
})