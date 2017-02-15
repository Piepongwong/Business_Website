$(document).ready(function(){
    setContainerWidth();
});


function setContainerWidth() {
    var windowWidth = $(document).width();
    var blockWidth = 180 + 6; //2 is margin 1 is border times both sides

    containerWidth = 0.8 * windowWidth;

    totalboxes = 9; //set the number of total boxes here

    var maxBoxPerRow = Math.floor(containerWidth / blockWidth);

    takenblockspace = maxBoxPerRow * blockWidth; //onrow

    marginleftover = containerWidth - takenblockspace;

    marginleftoverinpercentage = (marginleftover / containerWidth) * 50;
    marginleftoverinpercentage = marginleftoverinpercentage + "%";

    console.log(marginleftoverinpercentage);

    console.log("marginleftover: " + marginleftover + "\ncontainerWidth: " + containerWidth + "\nblockWidth " + blockWidth + 
     "\nmaxBoxPerRow " + maxBoxPerRow + "\nwindowWidth: " + windowWidth);

    numRows = Math.ceil(totalboxes / maxBoxPerRow);

    margintoppie = numRows * 204;

    margintoppie = margintoppie + 50;

    margintoppie = margintoppie + "px";

    $('.container2').css('margin-left', marginleftoverinpercentage);

    $('hr').css('margin-top', margintoppie);

}